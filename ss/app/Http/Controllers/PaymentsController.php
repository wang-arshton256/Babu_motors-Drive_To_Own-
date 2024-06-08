<?php
namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Beneficiary;
use App\Models\Payment;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
  public function __construct()
  {

    $count2 = Application::where('amount', '<', 1)
      ->where('status', '!=', 'closed sale')
      ->count();

    if ($count2 > 0)
    {
      $MarkFullSale = Application::where('amount', '<', 1)
        ->where('status', '!=', 'closed sale')->get();

      foreach ($MarkFullSale as $data)
      {
        $a = Application::where('unique_id', '=', $data->unique_id)->first();

        $CloseSale2 = Application::find($a->id);

        $CloseSale2->status = 'closed sale';

        $CloseSale2->save();
      }
    }

    $count = Application::whereColumn('amount', '<', 'weekly_payment')
      ->where('status', '!=', 'closed sale')
      ->count();

    if ($count > 0)
    {
      $EffectCloseSale = Application::whereColumn('amount', '<', 'weekly_payment')
        ->where('status', '!=', 'closed sale')
        ->get();

      foreach ($EffectCloseSale as $data)
      {
        $CloseSale = Application::where('unique_id', '=', $data->unique_id)->first();

        $CloseSale->status = 'close sale';

        $CloseSale->save();
      }
    }
  }

  /**
   * @param $PARAMETERS
   */
  public function CloseSale($id)
  {

    $Beneficiary = Beneficiary::find($id);

    $Payment = new Payment();

    $Application = Application::where('unique_id', '=', $Beneficiary->unique_id)->first();

    if ($Application->status == 'closed sale')
    {
      return redirect()->route('GotoRecordPayment', ['id' => $id])->with('error_a', 'Sale already closed');
    }
    else
    {
      $paydate = date('d/m/Y');

      $date = Carbon::createFromFormat('d/m/Y', $paydate)->format('Y-m-d');

      $Payment->payement_date = $date;
      $Payment->amount = $Application->amount;
      $Payment->payment_mode = 'closed sale';
      $Payment->unique_id = $Beneficiary->unique_id;
      $Payment->payement_for = 'closed sale';
      $Payment->save();

      $Application->amount = 00;
      //$Application->initial_payment = $initialPay_amount;
      $Application->status = "closed sale";
      $Application->save();

      return redirect()->route('GotoRecordPayment', ['id' => $id])->with('status', 'Sale Closed Successfully');
    }
  }

//

  /**
   * @param $PARAMETERS
   */
  public function SelectBeneficiary()
  {

    $FetchBeneficiaries = DB::table('applications AS A')
      ->join('beneficiaries AS B', 'A.unique_id', '=', 'B.unique_id')
      ->where('A.status', '!=', 'pending')
      ->select('B.*')
      ->get();

    $data = [

      'Page'              => 'sys.payments.SelectBeneficiary',
      'Title'             => 'Record Beneficiary Payments',
      'ruturnBeneficiary' => $FetchBeneficiaries

    ];

    return view('sys.index', $data);
  }

  /**
   * @param request $request
   */
  public function BeneficiarySelected(request $request)
  {

    $request->validate([

      'id' => 'required'

    ]);

    $id = $request->input('id');

    $Beneficiary = Beneficiary::where('id', $id)->first();
    $Payments = Payment::where('unique_id', $Beneficiary->unique_id)->get();
    $Paid = Payment::where('unique_id', $Beneficiary->unique_id)->sum('amount');
    $Application = Application::where('unique_id', $Beneficiary->unique_id)->first();

    $Paid_Final = $Paid;

    $data = [

      'Page'            => 'sys.payments.RecordPayment',
      'Title'           => 'Record Beneficiary Payment Interface',
      'Payments'        => $Payments,
      'Beneficiary'     => $Beneficiary->name,
      'id'              => $Beneficiary->id,
      'status'          => $Application->status,
      'Debt'            => $Application->amount,
      'Paid'            => $Paid,
      'Due'             => $Application->amount,
      'initial_payment' => $Application->initial_payment,
      'unique_id'       => $Beneficiary->unique_id

    ];

    return view('sys.index', $data);
  }

  /**
   * @param request $request
   */
  public function BeneficiarySelectedMyProfile()
  {
    $User_unique_id = Auth::user()->unique_id;

    $Beneficiary = Beneficiary::where('unique_id', $User_unique_id)->first();
    $Payments = Payment::where('unique_id', $Beneficiary->unique_id)->get();
    $Paid = Payment::where('unique_id', $Beneficiary->unique_id)->sum('amount');
    $Application = Application::where('unique_id', $Beneficiary->unique_id)->first();

    $Paid_Final = $Paid;

    $data = [

      'Page'            => 'sys.payments.RecordPayment',
      'Title'           => 'View Beneficiary Payment History ',
      'Payments'        => $Payments,
      'Beneficiary'     => $Beneficiary->name,
      'id'              => $Beneficiary->id,
      'status'          => $Application->status,
      'Debt'            => $Application->amount,
      'Paid'            => $Paid,
      'Due'             => $Application->amount,
      'initial_payment' => $Application->initial_payment,
      'unique_id'       => $Beneficiary->unique_id

    ];

    return view('sys.index', $data);
  }

  /**
   * @param $id
   */
  public function GotoRecordPayment($id)
  {

    $Beneficiary = Beneficiary::where('id', $id)->first();
    $Payments = Payment::where('unique_id', $Beneficiary->unique_id)->get();
    $Paid = Payment::where('unique_id', $Beneficiary->unique_id)->sum('amount');
    $Application = Application::where('unique_id', $Beneficiary->unique_id)->first();

    $Paid_Final = $Paid;

    $data = [

      'Page'            => 'sys.payments.RecordPayment',
      'Title'           => 'Record Beneficiary Payment Interface',
      'Payments'        => $Payments,
      'Beneficiary'     => $Beneficiary->name,
      'id'              => $Beneficiary->id,
      'status'          => $Application->status,
      'Debt'            => $Application->amount,
      'Paid'            => $Paid_Final,
      'Due'             => $Application->amount,
      'initial_payment' => $Application->initial_payment,
      'unique_id'       => $Beneficiary->unique_id

    ];

    return view('sys.index', $data);
  }

  /**
   * @param $id
   */
  public function AddToDefaulters($id)
  {

    $Payment = Beneficiary::find($id);

    $id = $Payment->id;

    $Application = Application::where('unique_id', $Payment->unique_id)->first();

    $Application->status = "defaulter";

    $Application->save();

    return redirect()->route('GotoRecordPayment', ['id' => $id])->with('status', 'Beneficiary  successfully added to defaulter\'s list, Check the defaulters list for more information');
  }

  /**
   * @param $id
   */
  public function RemoveFromDefaulters($id)
  {

    $Payment = Beneficiary::find($id);

    $id = $Payment->id;

    $Application = Application::where('unique_id', $Payment->unique_id)->first();

    $Application->status = "paid";

    $Application->save();

    return redirect()->route('GotoRecordPayment', ['id' => $id])->with('status', 'Beneficiary  successfully removed from defaulter\'s list');
  }

  /**
   * @param request $request
   */
  public function notworkingFunction(request $request)
  {
    $Payment = new Payment();

    $a = Beneficiary::where('unique_id', $request->input('unique_id'))->first();
    $id = $a->id;
    $date = $request->input('payment_date');

    $Application = Application::where('unique_id', $request->input('unique_id'))->first();

    $payment_date = Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');

    $Payment->payement_date = $payment_date;
    $Payment->payment_mode = $request->input('payment_mode');
    $Payment->unique_id = $request->input('unique_id');
    $Payment->amount = $request->input('amount');
    $Payment->payement_for = $request->input('payement_for');

    $Application->amount = $Application->amount - $request->input('amount');
    $Application->save();
    $Payment->save();

    return redirect()->route('GotoRecordPayment', ['id' => $id])->with('status', 'Beneficiary  successfully recorded');
  }

  /**
   * @param request $request
   */
  public function RecordPayment(request $request)
  {

    $Payment = new Payment();

    $a = Beneficiary::where('unique_id', $request->input('unique_id'))->first();
    $id = $a->id;
    $date = $request->input('payment_date');

    $Application = Application::where('unique_id', $request->input('unique_id'))->first();

    $payment_date = Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
    $initialPay_amount = $Application->initial_payment;

    $weekly_payment_amount = $Application->weekly_payment;

    $Paid_Amount = $request->input('amount');

    if ($Paid_Amount == $Application->amount)
    {
      $Application->amount = 00;
      $Application->initial_payment = $initialPay_amount;
      $Application->status = "closed sale";
      $Application->save();

      $Payment->payement_date = $payment_date;
      $Payment->amount = $Paid_Amount;
      $Payment->payment_mode = $request->input('payment_mode');
      $Payment->unique_id = $request->input('unique_id');
      $Payment->payement_for = $request->input('payement_for');
      $Payment->save();

      return redirect()->route('GotoRecordPayment', ['id' => $id])->with('status', 'Beneficiary  payment successfully recorded, Congratulation , this beneficairy has completed the car payment, sale for this beneficiary is now closed !!!!');
    }
    elseif ($Paid_Amount > $Application->amount)
    {

      $balance = $Paid_Amount - $Application->amount;

      $Application->initial_payment = $initialPay_amount + $balance;
      $Application->status = "closed sale";

      $Payment->payement_date = $payment_date;
      $Payment->amount = $Application->amount;
      $Payment->payment_mode = $request->input('payment_mode');
      $Payment->unique_id = $request->input('unique_id');
      $Payment->payement_for = $request->input('payement_for');
      $Application->amount = 00;
/****save****/
      $Application->save();
      $Payment->save();
/****save****/
      return redirect()->route('GotoRecordPayment', ['id' => $id])->with('status', 'Beneficiary  payment successfully recorded, Congratulation , this beneficairy has completed the car payment and paid more than he owed. OVERCHARGE HAS BEEN ADDED TO THE BACKUP AMOUNT, sale for this Beneficiary is now closed');
    }

    if ($Paid_Amount < $weekly_payment_amount)
    {
      if ($initialPay_amount >= $weekly_payment_amount)
      {
        $dif = $weekly_payment_amount - $Paid_Amount;
        $initialPay_amount = $initialPay_amount - $dif;
        $Paid_Amount = $Paid_Amount + $dif;

        $Application->amount = $Application->amount - $Paid_Amount;
        $Application->initial_payment = $initialPay_amount;

        $Application->status = "Installment paid ";
        $Application->save();

        $Payment->payement_date = $payment_date;
        $Payment->amount = $Paid_Amount;
        $Payment->undercharge = $dif;
        $Payment->payment_mode = $request->input('payment_mode');
        $Payment->unique_id = $request->input('unique_id');
        $Payment->payement_for = $request->input('payement_for');
        $Payment->save();

        return redirect()->route('GotoRecordPayment', ['id' => $id])->with('status', 'Beneficiary  payment successfully recorded, (Initial Payment Deduction Effected)');
      }
      else
      {

        $Application->amount = $Application->amount - $Paid_Amount;
        $Application->initial_payment = $initialPay_amount;
        $Application->status = "defaulter";
        $Application->save();

        $Payment->payement_date = $payment_date;
        $Payment->amount = $Paid_Amount;
        $Payment->payment_mode = $request->input('payment_mode');
        $Payment->unique_id = $request->input('unique_id');
        $Payment->payement_for = $request->input('payement_for');
        $Payment->save();

        return redirect()->route('GotoRecordPayment', ['id' => $id])->with('status', 'Beneficiary  payment successfully recorded, (Beneficiary is a defaulter)');
      }
    }
    elseif ($Paid_Amount > $weekly_payment_amount)
    {

      $dif = $Paid_Amount - $weekly_payment_amount;
      $initialPay_amount = $initialPay_amount + $dif;
      $Paid_Amount = $Paid_Amount - $dif;

      $Application->amount = $Application->amount - $Paid_Amount;
      $Application->initial_payment = $initialPay_amount;

      $Application->status = "Installment paid ";
      $Application->save();

      $Payment->payement_date = $payment_date;
      $Payment->amount = $Paid_Amount;
      $Payment->overcharge = $dif;
      $Payment->payment_mode = $request->input('payment_mode');
      $Payment->unique_id = $request->input('unique_id');
      $Payment->payement_for = $request->input('payement_for');
      $Payment->save();

      return redirect()->route('GotoRecordPayment', ['id' => $id])->with('status', 'Beneficiary  payment successfully recorded (Over-Pay added to backup/Security Fund)');
    }
    elseif ($Paid_Amount == $weekly_payment_amount)
    {

      /***$dif = $Paid_Amount - $weekly_payment_amount;
      $initialPay_amount = $initialPay_amount + $dif;
      $Paid_Amount = $Paid_Amount - dif;*****/

      $Application->amount = $Application->amount - $Paid_Amount;
      $Application->initial_payment = $initialPay_amount;
      $Application->status = "Installment paid ";
      $Application->save();

      $Payment->payement_date = $payment_date;
      $Payment->amount = $Paid_Amount;
      $Payment->payment_mode = $request->input('payment_mode');
      $Payment->unique_id = $request->input('unique_id');
      $Payment->payement_for = $request->input('payement_for');
      $Payment->save();

      return redirect()->route('GotoRecordPayment', ['id' => $id])->with('status', 'Beneficiary  payment successfully recorded (Paid the exact weekly deposit)');
    }
  }

  /**
   * @param $id
   */
  public function DeletePayment($id)
  {
    $Payment = Payment::find($id);

    $a = Beneficiary::where('unique_id', $Payment->unique_id)->first();
    $id = $a->id;

    $Application = Application::where('unique_id', $Payment->unique_id)->first();

    $Application->amount = $Application->amount + $Payment->amount;
    $Application->initial_payment = $Application->initial_payment - $Payment->overcharge;
    $Application->initial_payment = $Application->initial_payment + $Payment->undercharge;
    $Application->status = 'transaction reversed';

    $Application->save();

    $Payment->delete();

    return redirect()->route('GotoRecordPayment', ['id' => $id])->with('status', 'Beneficiary  successfully deleted');
  }

  /**
   * @param $PARAMETERS
   */
  public function MyProfileNOTUSED()
  {

    $Beneficiary = Beneficiary::where('unique_id', Auth::user()->unique_id)->first();

    $Payments = Payment::where('unique_id', Auth::user()->unique_id)->get();
    $Paid = Payment::where('unique_id', Auth::user()->unique_id)->sum('amount');
    $Application = Application::where('unique_id', Auth::user()->unique_id)->first();

    $Paid_Final = $Application->initial_payment + $Paid;

    $data = [

      'Page'            => 'sys.payments.Profile',
      'Title'           => 'Beneficiary Payment Dashboard',
      'Payments'        => $Payments,
      'Beneficiary'     => $Beneficiary->name,
      'id'              => $Beneficiary->id,
      'status'          => $Application->status,
      'Debt'            => $Application->amount,
      'Paid'            => $Paid_Final,
      'Due'             => $Application->amount - $Paid_Final,
      'initial_payment' => $Application->initial_payment,
      'unique_id'       => $Beneficiary->unique_id

    ];

    return view('sys.index', $data);
  }
}
