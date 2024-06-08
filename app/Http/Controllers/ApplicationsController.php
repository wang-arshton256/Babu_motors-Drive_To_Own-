<?php
namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Beneficiary;
use App\Models\Car;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicationsController extends Controller
{
  public function ManageApps()
  {
    $FetchApplication = DB::table('applications AS A')
      ->join('beneficiaries AS B', 'A.unique_id', '=', 'B.unique_id')
      ->join('cars AS C', 'A.car_unique_id', '=', 'C.car_unique_id')
      ->select('C.model', 'B.*', 'A.*', 'A.id AS uni')
      ->get();

    $FetchBeneficiary = Beneficiary::all();

    $FetchCars = Car::all();

    $data = [

      'Page'               => 'sys.applications.ManageApps',
      'Title'              => 'Application Management Console (Pending/Approved)',
      'ruturnBeneficiary'  => $FetchBeneficiary,
      'ruturnApplications' => $FetchApplication,
      'ReturnCars'         => $FetchCars

    ];

    return view('sys.index', $data);
  }

  public function Defaulters()
  {
    $FetchApplication = DB::table('applications AS A')
      ->join('beneficiaries AS B', 'A.unique_id', '=', 'B.unique_id')
      ->join('cars AS C', 'A.car_unique_id', '=', 'C.car_unique_id')
      ->where('A.status', 'defaulter')
      ->select('C.model', 'B.*', 'A.*', 'A.id AS uni')
      ->get();

    $FetchBeneficiary = Beneficiary::all();

    $FetchCars = Car::all();

    $data = [

      'Page'               => 'sys.applications.Defaulters',
      'Title'              => 'Beneficiaries who have defaulted on payments',
      'ruturnBeneficiary'  => $FetchBeneficiary,
      'ruturnApplications' => $FetchApplication,
      'ReturnCars'         => $FetchCars

    ];

    return view('sys.index', $data);
  }

  public function ClosedSales()
  {
    $FetchApplication = DB::table('applications AS A')
      ->join('beneficiaries AS B', 'A.unique_id', '=', 'B.unique_id')
      ->join('cars AS C', 'A.car_unique_id', '=', 'C.car_unique_id')
      ->where('A.status', 'closed sale')
      ->select('C.model', 'B.*', 'A.*', 'A.id AS uni')
      ->get();

    $FetchBeneficiary = Beneficiary::all();

    $FetchCars = Car::all();

    $data = [

      'Page'               => 'sys.applications.ClosedSales',
      'Title'              => 'Beneficiaries who have completed  payments',
      'ruturnBeneficiary'  => $FetchBeneficiary,
      'ruturnApplications' => $FetchApplication,
      'ReturnCars'         => $FetchCars

    ];

    return view('sys.index', $data);
  }

  /**
   * @param request $request
   */
  public function CreateApps(request $request)
  {

    $date = $request->input('final_payment_date');

    $GetCarPrice = Car::where('car_unique_id', '=', $request->input('car_unique_id'))->first();

    if ($request->input('initial_payment') > $GetCarPrice->price)
    {
      return redirect()->route('ManageApps')->with('error_a', 'Backup/Security fund cannot be greater than the price of the car');
    }
    else
    {

      $final_payment_date = Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');

      $Application = new Application();

      $Application->amount = $GetCarPrice->price;
      $Application->car_unique_id = $request->input('car_unique_id');
      $Application->unique_id = $request->input('unique_id');
      $Application->initial_payment = $request->input('initial_payment');
      $Application->final_payment_date = $final_payment_date;
      $Application->weekly_payment = $request->input('weekly_payment');
      $Application->submited_by = Auth::user()->name;
      $Application->submited_by = "Paid Initial Payment";

      $Application->save();

      return redirect()->route('ManageApps')->with('status', 'New Application created successfully');
    }
  }

  /**
   * @param $id
   */
  public function DeleteApps($id)
  {

    $DeleteApplication = Application::find($id);
    $DeleteApplication->delete();

    return redirect()->route('ManageApps')->with('status', ' Application deleted successfully');
  }

  /**
   * @param $id
   */
  public function ApproveApplication($id)
  {
    $a = Application::find($id);

/*$Payment = new Payment();*/

/*$Payment->payement_date = date('Y-m-d');
$Payment->amount = $a->initial_payment;
$Payment->unique_id = $a->unique_id;
$Payment->payment_mode = 'Electronic OR Cash';
$Payment->payement_for = 'Initial Payment';*/

    //$Payment->save();
    $a->status = 'Approved';
    /****not required causes errors $a->amount = $a->amount - $a->initial_payment;***/
    $a->save();

    return redirect()->route('ManageApps')->with('status', ' Application Approved successfully');
  }
}
