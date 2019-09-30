<?php



namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Exports\ItemsExport;
use App\Exports\ItemsDateExport;
use App\Exports\CreditsExport;
use App\Exports\CreditsDateExport;

use App\Exports\OrdersExport;
use App\Exports\OrdersDateExport;

use App\Exports\TransactionsExport;
use App\Exports\TransactionsDateExport;

use App\Exports\PayRatesExport;
use App\Exports\PayRatesDateExport;

use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
use App\Models\Item;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\PayRate;
use App\Models\Credit;
use DB;
use PDF;
use Session;


class ReportsController extends Controller

{
  public function __construct(Request $request)
  {

    // $this->itemsDateExport = new \App\Exports\ItemsDateExport;
  }


  public function itemsPDF(Request $request)
  {
    $user_id = Auth::user()->id;
    $user = User::find($user_id);
    $access_label = $user->access_label;


    if (Session::has('start_date') && Session::has('end_date')) {
      $start_date = Session::get('start_date');
      $end_date = Session::get('end_date');
      if ($access_label == 1) {
        $items = Item::whereBetween('created_at', [$start_date, $end_date])
          ->get();
      } else {
        $items = Item::where('created_by', $user_id)->whereBetween('created_at', [$start_date, $end_date])->get();
      }
    } else {
      if ($access_label == 1) {
        $items = Item::all();
      } else {
        $items = Item::where('created_by', $user_id)
          ->get();
      }
    }

    $pdf = PDF::loadView('reports.items', ['items' => $items]);
    $file_name = 'items.pdf';
    return $pdf->download($file_name);
  }



  public function itemsExcel(Request $request)

  {

    $user_id = Auth::user()->id;
    if (Session::has('start_date') && Session::has('end_date')) {
      $start_date = Session::get('start_date');
      $end_date = Session::get('end_date');

      return (new ItemsDateExport($start_date, $end_date, $user_id))->download('items.xlsx');
    } else {
      return Excel::download(new ItemsExport($user_id), 'items.xlsx');
    }
  }

  public function ordersPDF(Request $request)
  {
    $user_id = Auth::user()->id;
    $user = User::find($user_id);
    $access_label = $user->access_label;


    if (Session::has('start_date') && Session::has('end_date')) {
      $start_date = Session::get('start_date');
      $end_date = Session::get('end_date');
      if ($access_label == 1) {
        $orders = Order::whereBetween('created_at', [$start_date, $end_date])
          ->get();
      } else {
        $orders = Order::where('created_by', $user_id)->whereBetween('created_at', [$start_date, $end_date])->get();
      }
    } else {
      if ($access_label == 1) {
        $orders = Order::all();
      } else {
        $orders = Order::where('created_by', $user_id)
          ->get();
      }
    }

    $pdf = PDF::loadView('reports.orders', ['orders' => $orders]);
    $file_name = 'orders.pdf';
    return $pdf->download($file_name);
  }



  public function ordersExcel(Request $request)

  {

    $user_id = Auth::user()->id;
    if (Session::has('start_date') && Session::has('end_date')) {
      $start_date = Session::get('start_date');
      $end_date = Session::get('end_date');

      return (new OrdersDateExport($start_date, $end_date, $user_id))->download('orders.xlsx');
    } else {
      return Excel::download(new OrdersExport($user_id), 'orders.xlsx');
    }
  }

  public function transactionsPDF(Request $request)
  {
    $user_id = Auth::user()->id;
    $user = User::find($user_id);
    $access_label = $user->access_label;


    if (Session::has('start_date') && Session::has('end_date')) {
      $start_date = Session::get('start_date');
      $end_date = Session::get('end_date');
      if ($access_label == 1) {
        $transactions = Transaction::whereBetween('created_at', [$start_date, $end_date])
          ->get();
      } else {
        $transactions = Transaction::where('created_by', $user_id)->whereBetween('created_at', [$start_date, $end_date])->get();
      }
    } else {
      if ($access_label == 1) {
        $transactions = Transaction::all();
      } else {
        $transactions = Transaction::where('created_by', $user_id)
          ->get();
      }
    }

    $pdf = PDF::loadView('reports.transactions', ['transactions' => $transactions]);
    $file_name = 'transactions.pdf';
    return $pdf->download($file_name);
  }



  public function transactionsExcel(Request $request)

  {

    $user_id = Auth::user()->id;
    if (Session::has('start_date') && Session::has('end_date')) {
      $start_date = Session::get('start_date');
      $end_date = Session::get('end_date');

      return (new TransactionsDateExport($start_date, $end_date, $user_id))->download('transactions.xlsx');
    } else {
      return Excel::download(new TransactionsExport($user_id), 'transactions.xlsx');
    }
  }

  public function creditsPDF(Request $request)
  {
    $user_id = Auth::user()->id;
    $user = User::find($user_id);
    $access_label = $user->access_label;


    if (Session::has('start_date') && Session::has('end_date')) {
      $start_date = Session::get('start_date');
      $end_date = Session::get('end_date');
      if ($access_label == 1) {
        $credits = Credit::whereBetween('created_at', [$start_date, $end_date])
          ->get();
      } else {
        $credits = Credit::where('created_by', $user_id)->whereBetween('created_at', [$start_date, $end_date])->get();
      }
    } else {
      if ($access_label == 1) {
        $credits = Credit::all();
      } else {
        $credits = Credit::where('created_by', $user_id)
          ->get();
      }
    }

    $pdf = PDF::loadView('reports.credits', ['credits' => $credits]);
    $file_name = 'credits.pdf';
    return $pdf->download($file_name);
  }



  public function creditsExcel(Request $request)

  {

    $user_id = Auth::user()->id;
    if (Session::has('start_date') && Session::has('end_date')) {
      $start_date = Session::get('start_date');
      $end_date = Session::get('end_date');

      return (new CreditsDateExport($start_date, $end_date, $user_id))->download('credits.xlsx');
    } else {
      return Excel::download(new CreditsExport($user_id), 'credits.xlsx');
    }
  }


  public function payRatesPDF(Request $request)
  {
    $user_id = Auth::user()->id;
    $user = User::find($user_id);
    $access_label = $user->access_label;


    if (Session::has('start_date') && Session::has('end_date')) {
      $start_date = Session::get('start_date');
      $end_date = Session::get('end_date');
      if ($access_label == 1) {
        $payRates = PayRate::whereBetween('created_at', [$start_date, $end_date])
          ->get();
      } else {
        $payRates = PayRate::where('created_by', $user_id)->whereBetween('created_at', [$start_date, $end_date])->get();
      }
    } else {
      if ($access_label == 1) {
        $payRates = PayRate::all();
      } else {
        $payRates = PayRate::where('created_by', $user_id)
          ->get();
      }
    }

    $pdf = PDF::loadView('reports.payRates', ['payRates' => $payRates]);
    $file_name = 'payRates.pdf';
    return $pdf->download($file_name);
  }



  public function payRatesExcel(Request $request)

  {

    $user_id = Auth::user()->id;
    if (Session::has('start_date') && Session::has('end_date')) {
      $start_date = Session::get('start_date');
      $end_date = Session::get('end_date');

      return (new PayRatesDateExport($start_date, $end_date, $user_id))->download('payRates.xlsx');
    } else {
      return Excel::download(new PayRatesExport($user_id), 'payRates.xlsx');
    }
  }
}
