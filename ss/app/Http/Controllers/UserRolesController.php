<?php
namespace App\Http\Controllers;

use App\Models\Beneficiary;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class UserRolesController extends Controller
{
  //

  public function ManageUsers()
  {
    $FetchBeneficiaries = User::where('role', 'admin')->orWhere('role', 'staff')->get();

    $data = [

      'Page'  => 'sys.users.ManageUsers',
      'Title' => 'Manage Staff and Admin Roles',
      'Users' => $FetchBeneficiaries

    ];

    return view('sys.index', $data);
  }

  /**
   * @param request $rerquest
   */
  public function CreateUserRole(request $request)
  {
    $request->validate([

      'password' => 'required|confirmed|min:6',
      'email'    => 'required',
      'name'     => 'required',
      'role'     => 'required'

    ]);

    $User = new User();

    $User->name = $request->input('name');
    $User->email = $request->input('email');
    $User->password = Hash::make($request->input('password'));
    $User->role = $request->input('role');

    $User->save();

    return redirect()->back()->with('status', 'New user role created successfully');

  }

  /**
   * @param $id
   */
  public function DeleteUserRole($id)
  {
    $User = User::find($id);

    $User->delete();

    return redirect()->back()->with('status', 'User account deleted successfully');
  }

  public function ManageCleintsUsers()
  {
    $FetchBeneficiaries = User::where('role', 'client')->get();
    $Beneficiary = Beneficiary::all();

    $data = [

      'Page'        => 'sys.users.ClientAccount',
      'Title'       => 'Manage client accounts',
      'Users'       => $FetchBeneficiaries,
      'Beneficiary' => $Beneficiary

    ];

    return view('sys.index', $data);
  }

  /**
   * @param request $request
   */
  public function CreateClientAcc(request $request)
  {
    $request->validate([

      'password'  => 'required|confirmed|min:6',
      'email'     => 'required',
      'unique_id' => 'required'

    ]);

    $a = Beneficiary::where('unique_id', $request->input('unique_id'))->first();

    $User = new User();

    $User->name = $a->name;
    $User->unique_id = $a->unique_id;
    $User->email = $request->input('email');
    $User->password = Hash::make($request->input('password'));
    $User->role = 'client';

    $User->save();

    return redirect()->back()->with('status', 'New client role created successfully');
  }
}
