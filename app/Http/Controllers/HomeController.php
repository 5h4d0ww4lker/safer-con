<?php

namespace App\Http\Controllers;

use App\File;
use App\PersonalEvent;
use App\User;
use App\Department;
use App\Designation;
use App\Branch;
use App\LeaveApplication;
use App\Loan;
use App\Holiday;
use App\Property;
use App\EmployeeAward;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Credit;
use App\Models\CreditRequest;
use App\Models\Item;
use App\Models\Order;
use App\Models\Transaction;
use App\Notice;
use App\SubCategory;
use Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Cookie;
use Charts;
use Calendar;
use DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */


	public function index()
	{
		$user_id = Auth::user()->id;
			$user = User::where('id', $user_id)->get();
		$access_label = $user['0']['access_label'];
		$role = $user['0']['role'];
		if($role == 100){
			Auth::logout();
			return redirect('/admin')->with('exception', 'This is not a merchant account. Pleace create a new one by clicking the Register as merchant link.');
		}
		$status = $user['0']['activation_status'];
		if($status != 1){
			Auth::logout();
			return redirect('/admin')->with('exception', 'Your account is not active yet or been deactivated because of violations.');
		}

		if ($access_label == 1) {
			return $this->admin_dashboard();
		} else {
			return $this->merchant_dashbaord();
		}
	}
	public function merchant_dashbaord()
	{
		$user_id = Auth::user()->id;
		$today = Carbon\Carbon::now();
		$date_today = $today->toDateString();
		$items = Item::where('created_by', $user_id)->get();
		$orders = Order::where('merchant_id', $user_id)->get();
		$transactions = Transaction::where('to', $user_id)->get();


		$pending = Transaction::where('status', 'Pending')->where('to', $user_id)->count();
		$canceled = Transaction::where('status', 'Cancelled')->where('to', $user_id)->count();
		$completed = Transaction::where('status', 'Completed')->where('to', $user_id)->count();
		
		$charts  =	 Charts::create('pie', 'highcharts')
			->title('Transactions By Status')
			->labels(['Pending', 'Cancelled', 'Completed'])
			->values([$pending, $canceled, $completed])
			->dimensions(1000, 500)
			->responsive(true);
			$pending = Order::where('status', 'Pending')->where('merchant_id', $user_id)->count();
			$canceled = Order::where('status', 'Canceled')->where('merchant_id', $user_id)->count();
			$completed = Order::where('status', 'Confirmed')->where('merchant_id', $user_id)->count();
			
			$charts4  =	 Charts::create('pie', 'highcharts')
			->title('Orders By Status')
			->labels(['Pending', 'Cancelled', 'Confirmed'])
			->values([$pending, $canceled, $completed])
			->dimensions(1000, 500)
			->responsive(true);

		$orders_db = DB::table('orders')->where('merchant_id', $user_id)->get();
		$transaction_db = DB::table('transactions')->where('to', $user_id)->get();


		//die(print_r(count($users)));

		$charts2 = Charts::database($orders_db, 'bar', 'highcharts')
			->title("Orders by Month")
			->elementLabel("Month")
			->dimensions(1000, 500)
			->responsive(true)
			->groupByMonth(date('Y'), true);

		$charts3  =	Charts::database($transaction_db, 'bar', 'highcharts')
		->title("Transactions by Month")
		->elementLabel("Month")
		->dimensions(1000, 500)
		->responsive(true)
		->groupByMonth(date('Y'), true);



		return view('administrator.dashboard.dashboard2', compact('users', 'items',  'orders', 'transactions', 'brands', 'charts', 'charts2', 'charts3', 'charts4'));
	}

	public function admin_dashboard()
	{



		$today = Carbon\Carbon::now();
		$date_today = $today->toDateString();
		$users = User::all();
		$items = Item::all();
		$orders = Order::all();
		$categories = Category::all();
		$sub_categories = SubCategory::all();
		$credit_requests = CreditRequest::all();
		$credits = Credit::all();
		$transactions = Transaction::all();
		$brands = Brand::all();


		$pending = Transaction::where('status', 'Pending')->count();
		$canceled = Transaction::where('status', 'Cancelled')->count();
		$completed = Transaction::where('status', 'Completed')->count();


		$charts  =	 Charts::create('pie', 'highcharts')
			->title('Transactions By Status')
			->labels(['Pending', 'Cancelled', 'Completed'])
			->values([$pending, $canceled, $completed])
			->dimensions(1000, 500)
			->responsive(true);

		$pending = Order::where('status', 'Pending')->count();
		$canceled = Order::where('status', 'Canceled')->count();
		$completed = Order::where('status', 'Confirmed')->count();


		$charts5  =	 Charts::create('pie', 'highcharts')
			->title('Orders By Status')
			->labels(['Pending', 'Cancelled', 'Confirmed'])
			->values([$pending, $canceled, $completed])
			->dimensions(1000, 500)
			->responsive(true);
		$active = User::where('activation_status', 1)->count();
		$inactive = User::where('activation_status', 0)->count();
		$charts6 =	 Charts::create('pie', 'highcharts')
			->title('Users By Status')
			->labels(['Active', 'Inactive'])
			->values([$active, $inactive])
			->dimensions(1000, 500)
			->responsive(true);

		$orders_db = DB::table('orders')->get();
		$transaction_db = DB::table('transactions')->get();
		$users_db = DB::table('users')->get();


		//die(print_r(count($users)));

		$charts2 = Charts::database($orders_db, 'bar', 'highcharts')
			->title("Orders by Month")
			->elementLabel("Month")
			->dimensions(1000, 500)
			->responsive(true)
			->groupByMonth(date('Y'), true);
		$charts4 = Charts::database($users_db, 'bar', 'highcharts')
			->title("Users by Month")
			->elementLabel("Month")
			->dimensions(1000, 500)
			->responsive(true)
			->groupByMonth(date('Y'), true);

		$charts3  =	Charts::database($transaction_db, 'bar', 'highcharts')
			->title("Transactions by Month")
			->elementLabel("Month")
			->dimensions(1000, 500)
			->responsive(true)
			->groupByMonth(date('Y'), true);




		return view('administrator.dashboard.dashboard', compact('users', 'categories', 'sub_categories', 'credits', 'credit_requests', 'items', 'orders', 'transactions', 'brands', 'charts', 'charts2', 'charts3', 'charts4', 'charts5', 'charts6'));
	}
}
