<?php
namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Car;
use App\Models\Payment;
use App\Models\User;
use Auth;

//use Illuminate\Http\Request;

class MainController extends Controller
{
  public function Dashboard()
  {

    if (Auth::user()->role == 'client')
    {
      return redirect()->route('BeneficiarySelectedMyProfile');
    }

    $Cars = Application::where('status', '!=', 'pending')->count();
    $Rev = Application::where('status', '!=', 'pending')->sum('amount');
    $ActualCarSales = Payment::sum('amount');
    $Df = Application::where('status', 'defaulter')->count();
    $Admin = User::where('role', 'admin')->count();
    $Client = User::where('role', 'client')->count();
    $Staff = User::where('role', 'staff')->count();
    $Cars_sum = Car::count();

    $Closed = Application::where('status', '=', 'closed sale')->count();
    $Readt2Close = Application::where('status', '=', 'close sale')->count();
    $P = Payment::sum('amount');

    $data = [

      'Page'           => 'sys.stats.stats',
      'Title'          => 'Admin Statistics Console',
      'Cars'           => $Cars,
      'Rev'            => $Rev + $P,
      'Admin'          => $Admin,
      'Client'         => $Client,
      'Staff'          => $Staff,
      'Cars_sum'       => $Cars_sum,
      'Readt2Close'    => $Readt2Close,
      'Closed'         => $Closed,
      'ActualCarSales' => $ActualCarSales,
      'Df'             => $Df

    ];

    return view('sys.index', $data);
  }
}
