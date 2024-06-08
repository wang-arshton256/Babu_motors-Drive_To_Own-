<?php
namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Beneficiary;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BeneficiaryController extends Controller
{
  public function ManageBeneficiaries()
  {

    $FetchBeneficiaries = Beneficiary::all();

    $data = [

      'Page'              => 'sys.beneficiaries.ManageBeneficiaries',
      'Title'             => 'Beneficiary Management Console',
      'ruturnBeneficiary' => $FetchBeneficiaries

    ];

    return view('sys.index', $data);
  }

  /**
   * @param request $request
   */
  public function CreateBeneficiary(request $request)
  {

    $request->validate([

      'name'     => 'required',
      'email'    => 'required|unique:beneficiaries',
      'phone'    => 'required|unique:beneficiaries',
      'phone2'   => 'unique:beneficiaries',
      'address'  => 'required',
      'id_photo' => 'required|mimes:png,jpg,jpeg|max:3048'

    ]);

    if ($request->filled('phone2'))
    {
      if ($request->input('phone2') == $request->input('phone'))
      {
        return redirect()->route('ManageBeneficiaries')->with('error_a', 'Phone 1 cannot be the same as phone 2');
      }
    }

    /***start the upload***/

    $fileName = time().'.'.$request->id_photo->extension();

    $request->id_photo->move(public_path('uploads/beneficiaries'), $fileName);

    $unique_id = Hash::make(date('Y-m-d H:i:s').'_'.time());

    $Beneficiary = new Beneficiary();

    $Beneficiary->name = $request->input('name');
    $Beneficiary->email = $request->input('email');
    $Beneficiary->phone = $request->input('phone');
    $Beneficiary->phone2 = $request->input('phone2');
    $Beneficiary->address = $request->input('address');
    $Beneficiary->unique_id = $unique_id;
    $Beneficiary->id_url = 'uploads/beneficiaries/'.$fileName;

    $Beneficiary->save();

    return redirect()->route('ManageBeneficiaries')->with('status', 'Beneficiary created successfully');
  }

  /**
   * @param $id
   */
  public function DeleteBeneficiary($id)
  {

    $del = Beneficiary::find($id);

    $count_app = Application::where('unique_id', $del->unique_id)->count();

    if ($count_app > 0)
    {
      Application::where('unique_id', $del->unique_id)->delete();
    }

    $count_pay = Payment::where('unique_id', $del->unique_id)->count();

    if ($count_pay > 0)
    {
      Payment::where('unique_id', $del->unique_id)->delete();
    }

    $count_user = User::where('unique_id', $del->unique_id)
      ->count();

    if ($count_user > 0)
    {
      User::where('unique_id', $del->unique_id)
        ->delete();
    }

    $del->delete();

    return redirect()->route('ManageBeneficiaries')->with('status', 'Beneficiary deleted successfully');
  }

  /**
   * @param request $request
   */
  public function UpdateBeneficiary(request $request)
  {
    $request->validate([

      'id'      => 'required',
      'name'    => 'required',
      'email'   => 'required',
      'phone'   => 'required',
      'address' => 'required'

    ]);

    $id = $request->input('id');

    $Beneficiary = Beneficiary::find($id);

    if ($request->hasFile('id_photo'))
    {
      unlink(public_path($Beneficiary->id_url));

      $fileName = time().'.'.$request->id_photo->extension();

      $request->id_photo->move(public_path('uploads/beneficiaries'), $fileName);

      $Beneficiary->id_url = 'uploads/beneficiaries/'.$fileName;
    }

    $Beneficiary->name = $request->input('name');
    $Beneficiary->email = $request->input('email');
    $Beneficiary->phone = $request->input('phone');
    $Beneficiary->address = $request->input('address');
    $Beneficiary->save();

    return redirect()->route('ManageBeneficiaries')->with('status', 'Beneficiary data updated successfully');
  }
}
