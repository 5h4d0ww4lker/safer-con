<?php

namespace App\Http\Controllers;

use App\Address;
use App\Models\Bank;
use Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Cookie;
use Charts;
use Calendar;
use DB;
use App\User;
use App\Models\Category;
use App\Models\Credit;
use App\Models\CreditRequest;
use App\Models\SubCategory;
use App\Models\Item;
use App\Models\ItemDetail;
use App\Models\LandingPage;
use App\Models\Notification;
use App\Models\Order;
use App\Models\PayRate;
use App\Models\ShoppingCart;
use App\Models\Transaction;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Grimthorr\LaravelToast\Toast;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function check_status(Request $request)
	{
		$user_id = Auth::user()->id;
		$user = User::where('id', $user_id)->get();
		$role = $user['0']['role'];
		if ($role != 100) {
			Auth::logout();
			toast()->error('Error. This is not a customer account. Please create a new account.');
			return redirect('/account');
		}
		$status = $user['0']['activation_status'];
		if ($status != 1) {
			Auth::logout();
			toast()->error('Error. Your account is not active yet or been deactivated because of violations.');
			return redirect('/account');
		} else {
			return redirect('/');
		}
	}

	public  function index(Request $request)
	{
		$categories = Category::all()->take(5);
		$secondaries = Category::all()->take(3);
		$featured_products = Item::where('status', 'ACTIVE')->where('category_id', 16)->get();
		$items = Item::where('status', 'ACTIVE')->paginate(8);
		$landing_pages = LandingPage::all();
		$active = "home";
		return view('main.landing.home', compact('categories', 'items', 'secondaries', 'featured_products', 'landing_pages', 'active'));
	}
	public function update_password(Request $request)
	{
		$user_id = Auth::user()->id;
		$user = User::find($user_id);
		$password_from_db = $user->password;

		$current_password = $request->current_password;
		$new_password = $request->new_password;
		$confirmation_password = $request->confirmation_password;


		if (!Hash::check($current_password, $password_from_db)) {
			toast()->error('Your current password is not correct.');

			return redirect('/change_password');
		}
		if ($new_password != $confirmation_password) {
			toast()->error('Your password and password confirmation didnt match.');

			return redirect('/change_password');
		} else {
			$updated_password = bcrypt($new_password);

			$user->password = $updated_password;
			$user->save();
			toast()->success('Your changed your password successfully.');

			return redirect('/change_password');
		}
	}
	public  function products(Request $request)
	{
		$categories = Category::all()->take(8);
		$secondaries = Category::all()->take(3);
		$featured_products = Item::where('category_id', 16)->where('status', 'ACTIVE')->get();
		$items = Item::where('status', 'ACTIVE')->paginate(6);
		$active = "products";
		return view('main.landing.products', compact('categories', 'items', 'secondaries', 'featured_products', 'active'));
	}

	public  function products_by_name(Request $request)
	{
		$categories = Category::all()->take(8);
		$secondaries = Category::all()->take(3);
		$featured_products = Item::where('status', 'ACTIVE')->where('category_id', 16)->get();
		$items = Item::where('status', 'ACTIVE')->orderBy('name', 'ASC')->paginate(6);
		$active = "products";
		return view('main.landing.products', compact('categories', 'items', 'secondaries', 'featured_products', 'active'));
	}

	public  function products_by_date(Request $request)
	{
		$categories = Category::all()->take(8);
		$secondaries = Category::all()->take(3);
		$featured_products = Item::where('status', 'ACTIVE')->where('category_id', 16)->get();
		$items = Item::where('status', 'ACTIVE')->orderBy('created_at', 'DESC')->paginate(6);
		$active = "products";
		return view('main.landing.products', compact('categories', 'items', 'secondaries', 'featured_products', 'active'));
	}

	public  function search_item(Request $request)
	{
		$categories = Category::all()->take(8);
		$secondaries = Category::all()->take(3);
		$featured_products = Item::where('category_id', 16)->get();
		$items = Item::where('status', 'ACTIVE')->paginate(6);
		$active = "search";
		return view('main.landing.search', compact('categories', 'items', 'secondaries', 'featured_products', 'active'));
	}

	public  function byCategory($id)
	{
		$categories = Category::all()->take(8);
		$secondaries = Category::all()->take(3);
		$featured_products = Item::where('category_id', 16)->get();
		$items = Item::where('status', 'ACTIVE')->where('sub_category_id', $id)->paginate(6);
		$brands = Item::where('status', 'ACTIVE')->where('sub_category_id', $id)->select('brand_id')->groupBy('brand_id')->get();
		$active = "products";
		return view('main.landing.by_category', compact('categories', 'items', 'secondaries', 'featured_products', 'brands', 'active'));
	}
	public  function byBrand($id)
	{
		$categories = Category::all()->take(8);
		$secondaries = Category::all()->take(3);
		$featured_products = Item::where('status', 'ACTIVE')->where('category_id', 16)->get();
		$items = Item::where('status', 'ACTIVE')->where('brand_id', $id)->paginate(6);
		$sub_category_id =  Item::where('status', 'ACTIVE')->where('brand_id', $id)->first();

		$brands = Item::where('status', 'ACTIVE')->where('sub_category_id', $sub_category_id['sub_category_id'])->select('brand_id')->groupBy('brand_id')->get();
		$active = "products";
		return view('main.landing.by_category', compact('categories', 'items', 'secondaries', 'featured_products', 'brands'));
	}
	public  function contact(Request $request)
	{
		$active = "contact";
		return view('main.landing.contact', compact('active'));
	}
	public  function cart(Request $request)
	{

		$user_id = Auth::user()->id;
		$cart_items = ShoppingCart::where('user_id', $user_id)->where('status', 'On Cart')->get();
		$active = "cart";
		return view('main.landing.cart', compact('cart_items', 'cart', 'active'));
	}
	public  function account(Request $request)
	{
		$active = "account";
		return view('main.landing.account', compact('active'));
	}
	public  function change_password(Request $request)
	{
		$active = "change_password";
		if (empty(Auth::user()->id)) {

			toast()->error('You must login before changing your password.', 'Error!');

			return redirect('/account');
		}
		$user_id = Auth::user()->id;
		$user_info = User::find($user_id);
		$transaction_infos = Transaction::where('from', $user_id)->get();
		$address_info = Address::where('id', $user_info->address)->first();
		$credit_info = Credit::where('user_id', $user_id)->first();

		return view('main.landing.change_password', compact('user_info', 'transaction_infos', 'address_info', 'credit_info', 'active'));
	}
	public  function reset_password(Request $request)
	{
		$active = "account";
		if (!empty(Auth::user()->id)) {
			Auth::logout();
		}
		return view('main.landing.reset_password', compact('active'));
	}

	public  function finalize_reset(Request $request)
	{
		$active = "account";
		if (!empty(Auth::user()->id)) {
			Auth::logout();
		}
		return view('main.landing.finalize_reset', compact('active'));
	}

	public function complete_reset(Request $request)
	{
		$email = session()->get('pr_email');
		$user = User::where('email', $email)->where('role', 100)->first();
		$activation_key_from_db = $user->activation_key;

		$activation_key = $request->activation_key;
		$new_password = $request->new_password;
		$confirmation_password = $request->confirmation_password;


		if ($activation_key != $activation_key_from_db) {
			toast()->error('Incorrect Activation Key.');

			return redirect('/finalize_reset');
		}
		if ($new_password != $confirmation_password) {
			toast()->error('Your password and password confirmation didnt match.');

			return redirect('/finalize_reset');
		} else {
			$updated_password = bcrypt($new_password);

			$user->password = $updated_password;
			$user->save();
			toast()->success('You resetted your password successfully. Please login and continur with the new password.');

			return redirect('/account');
		}
	}
	public function send_reset_key(Request $request)
	{
		$email = $request->email;
		$user = User::where('email', $email)->where('role', 100)->first();
		if ($user) {
			$email = $request->email;
			$user->activation_key = rand(100000, 900000);
			$user->save();
			Session::put('pr_email', $email);
			$user_info = User::where('email', $email)->where('role', 100)->first();
			toast()->success('We have sent an activation key to ' . $email . 'Please enter the code we sent you so we could verify the request.');
			try {
				Mail::send('emails.password_reset', ['request' => $user_info], function ($m) use ($user) {
					$m->from('no-reply@arganon.com', 'Arganon e-comerce');
					$m->to($user->email)->subject('Password Reset Request.');
				});
			} catch (Exception $exception) {

				return toast()->error('Unable to send email.');;
			}

			return redirect('/finalize_reset');
		}
		if (!$user) {
			toast()->error('We could not find a user account related with the given email. Please try again.');

			return redirect('/reset_password');
		}
	}
	public function add_to_cart(Request $request)
	{
		DB::beginTransaction();
		try {
			$item_id = request()->item_id;



			$item = Item::where('id', $item_id)->first();

			if (empty(Auth::user()->id)) {

				toast()->error('Please login or sign up to add items to cart.', 'Error!');

				return redirect('/account');
			}


			$user_id = Auth::user()->id;
			$cart = ShoppingCart::where('user_id', $user_id)->where('item_id', $item_id)->where('status', 'On Cart')->first();
			if ($cart) {
				toast()->error('Error. Item is already in cart.');

				return redirect('/cart');
			}

			$wishlist = Wishlist::where('user_id', $user_id)->where('item_id', $item_id)->first();
			if ($wishlist) {
				$wishlist->delete();
			}


			$data['user_id'] = Auth::user()->id;
			$data['item_id'] = $item_id;
			$data['price'] = $item->item_price;
			$data['merchant_id'] = $item->created_by;
			$data['status'] = 'On Cart';


			ShoppingCart::create($data);
			DB::commit();
			toast()->success($item->name . ' added to cart.');

			return redirect('/cart');
		} catch (Exception $exception) {
			DB::rollback();

			toast()->error('Unexpected error occured. Please try again later.');

			return redirect('/cart');
		}
	}

	public function search_result(Request $request)
	{

		try {
			$category = request()->category;
			$name = request()->name;

			$categories = Category::all();
			$secondaries = Category::all()->take(3);
			$featured_products = Item::where('category_id', 16)->get();
			$items = Item::where('name', 'LIKE', "%$name%")->where('category_id', $category)->paginate(6);
			$active = "search";
			//	toast()->success('Item added to cart.');
			return view('main.landing.products', compact('categories', 'items', 'secondaries', 'featured_products', 'active'));
		} catch (Exception $exception) {
			toast()->error('Unexpected error occured. Please try again later.');

			return redirect('/search_item');
		}
	}

	public function remove_from_cart($id)
	{
		try {
			$item_id = $id;
			if (empty(Auth::user()->id)) {
				toast()->error('Please login or sign up to add items to cart.', 'Error!');

				return redirect('/account');
			}


			$item = ShoppingCart::findOrFail($item_id);
			$data['status'] = 'Removed';
			$item->update($data);

			$new_item_id = $item->item_id;
			$new_item = Item::find($new_item_id);
			toast()->info($new_item->name . ' removed from cart.');

			return redirect('/cart');
		} catch (Exception $exception) {

			toast()->error('Unexpected error occured. Please try again later.');

			return redirect('/cart');
		}
	}

	public function remove_from_wishlist($id)
	{
		try {
			$item_id = $id;
			if (empty(Auth::user()->id)) {
				toast()->error('Please login or sign up to add items to cart.', 'Error!');

				return redirect('/account');
			}


			$item = Wishlist::findOrFail($item_id);
			$item->delete();
			$new_item_id = $item->item_id;
			$new_item = Item::find($new_item_id);
			toast()->info($new_item->name . ' removed from wishlist.');

			return redirect('/my_wishlists');
		} catch (Exception $exception) {

			toast()->error('Unexpected error occured. Please try again later.');

			return redirect('/my_wishlists');
		}
	}

	public function submit_order(Request $request)
	{
		if (empty(Auth::user()->id)) {
			toast()->error('Please login or sign up to add items to cart.', 'Error!');

			return redirect('/account');
		}

		$count =	count(request()->item_ids);
		$item_ids = request()->item_ids;
		$quantities = request()->quantities;
		$user_id = Auth::user()->id;
		DB::beginTransaction();

		try {

			for ($i = 0; $i < $count; $i++) {

				$item = Item::find($item_ids[$i]);
				$item_price = $item->item_price;
				$item_id = $item->id;
				$stock = ItemDetail::where('item_id', $item_id)->first();
				$in_stock = $stock->stock;
				$quantity = $quantities[$i];


				if ($in_stock < $quantity) {

					throw new \Exception('Not enough items in stock.');
				}
				$item_category = $item->category_id;
				$category = Category::find($item_category);
				$pay_rate_id = $category->pay_rate;
				$purchase_amount = $item_price * $quantity;
				$pay_rate = PayRate::find($pay_rate_id);
				$pay_rate_from_customer = $pay_rate->percentage_from_merchant;
				$comission = $purchase_amount * ($pay_rate_from_customer / 100);



				$user_credit = Credit::where('user_id', $user_id)->first();
				$available_user_credit = $user_credit->amount;

				$update_user_credit = $available_user_credit - $purchase_amount - $comission;

				if ($available_user_credit < 0) {

					throw new \Exception('Insufficent balance to order items on cart.');
				}
				$user_amount['amount'] = $update_user_credit;
				$user_amount['on_hold'] = $purchase_amount;
				$user_credit->update($user_amount);



				$merchant_id = $item->created_by;
				$merchant_credit = Credit::where('user_id', $merchant_id)->first();
				$available_merchant_credit = $merchant_credit->on_hold;

				$update_merchant_credit = $available_merchant_credit + $purchase_amount;
				$merchant_amount['on_hold'] = $update_merchant_credit;
				$merchant_credit->update($merchant_amount);


				$system_credit = Credit::find(1000000);
				$available_system_credit = $system_credit->amount;
				$update_system_credit = $available_system_credit + $comission;
				$system_amount['amount'] = $update_system_credit;
				$system_credit->update($system_amount);





				$order = new Order();
				$order->merchant_id = $merchant_id;
				$order->user_id = $user_id;
				$order->item_id = $item_id;
				$order->quantity = $quantity;
				$order->price = $item_price;
				$order->toatl_amount = $purchase_amount;
				$order->save();



				$transaction = new Transaction();
				$transaction->from = $user_id;
				$transaction->to = $merchant_id;
				$transaction->order_id = $order->id;
				$transaction->status = "Pending";
				$transaction->amount = $purchase_amount;
				$transaction->created_by = $user_id;
				$transaction->save();


				$cart = ShoppingCart::where('user_id', $user_id)->where('item_id', $item_id)->first();
				$cart_status['status'] = 'Ordered';
				$cart->update($cart_status);


				$update_stock['stock'] = $in_stock - $quantity;
				$stock->update($update_stock);

				$merchant = User::find($merchant_id);
				$user = User::find($user_id);
				$message = $merchant->name . ',' . $user->name . ' ' . $user->father_name . '  submitted order for ' . $item->name . '. An amount of ' . $purchase_amount . ' ETB has been added to your on hold credit.';
				$notification = new Notification();
				$notification->notify_to = $merchant_id;
				$notification->content = $message;
				$notification->status = "Pending";
				$notification->save();


				$message2 = $user->name . ', ' . ' you submitted order for ' . $item->name . '. An amount of ' . $purchase_amount . ' ETB has been deduct from on available credit and added to your on hold credit.';
				$notification2 = new Notification();
				$notification2->notify_to = $user->id;
				$notification2->content = $message2;
				$notification2->status = "Pending";
				$notification2->save();
			}
			DB::commit();
			toast()->success('Items ordered successfully.');

			return redirect('/add_shipment/' . $order->id);
			//return redirect('/my_orders');
		} catch (\Exception $e) {
			DB::rollback();
			toast()->error($e->getMessage()());

			return redirect('/cart');
		}
	}

	public  function add_shipment($order_id)
	{
		if (empty(Auth::user()->id)) {
			toast()->error('Please login or sign up to continue.', 'Error!');

			return redirect('/account');
		}

		$user_id = Auth::user()->id;
		$user_info = User::find($user_id);
		$address_info = Address::where('id', $user_info->address)->first();
		$active = "profile";
		return view('main.landing.shipment', compact('user_info', 'order_id', 'address_info', 'active'));
	}


	public  function submit_shipment_info(Request $request)
	{
		if (empty(Auth::user()->id)) {
			toast()->error('Please login or sign up to continue.', 'Error!');

			return redirect('/account');
		}
		$user_id = Auth::user()->id;
		$user_info = User::find($user_id);
		$address = new Address();
		$address->phone_number_1 = $request->phone_number_1;
		$address->region = $request->region;
		$address->city = $request->city;
		$address->sub_city = $request->sub_city;
		$address->location = $request->location;
		$address->building = $request->building;
		$address->created_by = $user_id;
		$address->save();

		$address_id = $address->id;

		$order = Order::find($request->order_id);

		$data['ship_to'] = $address_id;
		$order->update($data);


		$active = "profile";
		toast()->success('Shipment info added successfully.');

		return redirect('/my_orders');
	}

	public function cancel_order($id)
	{
		if (empty(Auth::user()->id)) {
			toast()->error('Please login or sign up to add items to cart.', 'Error!');

			return redirect('/account');
		}


		$user_id = Auth::user()->id;
		$order_id = $id;
		$order = Order::find($order_id);
		DB::beginTransaction();

		try {


			$quantity = $order->quantity;
			$item_detail = ItemDetail::where('item_id', $order->item_id)->first();
			$stock = $item_detail->stock;

			$update_item_detail['stock'] = $stock + $quantity;
			$item_detail->update($update_item_detail);
			$total_amount = $order->toatl_amount;

			$user_credit = Credit::where('user_id', $user_id)->first();
			$available_user_credit = $user_credit->amount;
			$available_user_on_hold = $user_credit->on_hold;

			$update_user_credit = $available_user_credit + $total_amount;
			$update_user_credit_on_hold = $available_user_on_hold - $total_amount;

			$user_amount['amount'] = $update_user_credit;
			$user_amount['on_hold'] = $update_user_credit_on_hold;
			$user_credit->update($user_amount);



			$merchant_id = $order->merchant_id;
			$merchant_credit = Credit::where('user_id', $merchant_id)->first();
			$available_merchant_credit = $merchant_credit->on_hold;

			$update_merchant_credit = $available_merchant_credit - $total_amount;
			$merchant_amount['on_hold'] = $update_merchant_credit;
			$merchant_credit->update($merchant_amount);

			$transaction = Transaction::where('order_id', $order_id)->first();

			$data['status'] =  "Cancelled";
			$transaction->update($data);





			$order_status['status'] = 'Canceled';
			$order->update($order_status);
			$merchant = User::find($merchant_id);
			$user = User::find($user_id);

			$item = Item::find($order->item_id);
			$message = $merchant->name . ',' . $user->name . ' ' . $user->father_name . ' cancelled the order for ' . $item->name . '. An amount of ' . $total_amount . ' ETB has been deduct from on hold credit.';
			$notification = new Notification();
			$notification->notify_to = $merchant_id;
			$notification->content = $message;
			$notification->status = "Pending";
			$notification->save();


			$message2 = $user->name . ', ' . ' you cancelled  the order for ' . $item->name . ' An amount of ' . $total_amount . ' ETB has been deduct from on hold credit and added to your available credit.';
			$notification2 = new Notification();
			$notification2->notify_to = $user->id;
			$notification2->content = $message2;
			$notification2->status = "Pending";
			$notification2->save();



			DB::commit();
			toast()->info('Order canceled successfully');

			return redirect('/my_orders');
		} catch (\Exception $e) {
			DB::rollback();
			toast()->error($e->getMessage());

			return redirect('/my_orders');
		}
	}

	public function confirm_order($id)
	{
		if (empty(Auth::user()->id)) {
			toast()->error('Please login or sign up to add items to cart.', 'Error!');

			return redirect('/account');
		}


		$user_id = Auth::user()->id;

		$order_id = $id;

		$order = Order::find($order_id);
		$total_amount = $order->toatl_amount;
		DB::beginTransaction();

		try {

			$user_credit = Credit::where('user_id', $user_id)->first();
			$available_user_credit = $user_credit->on_hold;

			$update_user_credit = $available_user_credit - $total_amount;
			$user_amount['on_hold'] = $update_user_credit;
			$user_credit->update($user_amount);



			$merchant_id = $order->merchant_id;
			$merchant_credit = Credit::where('user_id', $merchant_id)->first();
			$available_merchant_credit_on_hold = $merchant_credit->on_hold;
			$available_merchant_credit = $merchant_credit->amount;

			$update_merchant_credit_on_hold = $available_merchant_credit_on_hold - $total_amount;
			$merchant_amount['on_hold'] = $update_merchant_credit_on_hold;
			$merchant_amount['amount'] = $available_merchant_credit + $total_amount;

			//dd($merchant_amount);
			$merchant_credit->update($merchant_amount);

			$order_status['status'] = 'Confirmed';
			$order->update($order_status);

			$transaction = Transaction::where('order_id', $order_id)->first();

			$data['status'] =  "Completed";
			$transaction->update($data);
			$merchant = User::find($merchant_id);
			$user = User::find($user_id);


			$item = Item::find($order->item_id);
			$message = $merchant->name . ',' . $user->name . ' ' . $user->father_name . ' confirmed that the order for ' . $item->name . ' is delivered. an amount of ' . $total_amount . ' ETB has been deduct from on hold credit and added to your available credit.';
			$notification = new Notification();
			$notification->notify_to = $merchant_id;
			$notification->content = $message;
			$notification->status = "Pending";
			$notification->save();


			$message2 = $user->name . ', ' . ' you confirmed that the order for ' . $item->name . ' is delivered. an amount of ' . $total_amount . ' ETB has been deduct from on hold credit.';
			$notification2 = new Notification();
			$notification2->notify_to = $user->id;
			$notification2->content = $message2;
			$notification2->status = "Pending";
			$notification2->save();

			DB::commit();
			toast()->success('Order confirmed successfully.');

			return redirect('/my_orders');
		} catch (\Exception $e) {
			DB::rollback();
			toast()->error($e->getMessage());

			return redirect('/my_orders');
		}
	}
	public  function product_details($id)
	{
		$item = Item::where('id', $id)->first();
		$itemDetail = ItemDetail::where('item_id', $id)->first();
		$relatedProducts = Item::where('sub_category_id', $item['sub_category_id'])->get()->take(4);
		$active = "product";
		$merchant = User::find($item->created_by);
		$address = Address::find($merchant->address);
		return view('main.landing.product_details', compact('item', 'itemDetail', 'relatedProducts', 'active','merchant', 'address'));
	}

	public  function order_details($id)
	{
		$order = Order::find($id);
		$item_id = $order->item_id;
		$item = Item::where('id', $item_id)->first();
		$merchant = User::find($item->created_by);
		$address = Address::find($merchant->address);
		$itemDetail = ItemDetail::where('item_id', $id)->first();
		$active = "orders";
		return view('main.landing.order_details', compact('item', 'itemDetail', 'order', 'merchant', 'address', 'active'));
	}

	public  function add_to_wishlist($id)

	{
		try {
			if (empty(Auth::user()->id)) {
				toast()->error('Please login or sign up to continue.', 'Error!');

				return redirect('/account');
			}
			$user_id = Auth::user()->id;
			$wishlist = new Wishlist();
			$wishlist->user_id = $user_id;
			$wishlist->item_id = $id;
			$wishlist->save();
			$item = Item::find($id);
			$item_name = $item->name;
			toast()->success($item_name . ' added to wishlist successfully.');

			return redirect('/my_wishlists');
		} catch (\Exception $e) {

			toast()->error('Something went wrong. Please try again later.');
			return redirect('/products');
		}
	}

	public  function my_orders(Request $request)
	{
		if (empty(Auth::user()->id)) {
			toast()->error('Please login or sign up to continue.', 'Error!');

			return redirect('/account');
		}
		$user_id = Auth::user()->id;
		$cart_items = Order::where('user_id', $user_id)->where('status', 'Pending')->paginate(5);
		$active = "orders";
		return view('main.landing.orders', compact('cart_items', 'active'));
	}
	public  function my_notifications(Request $request)
	{
		if (empty(Auth::user()->id)) {
			toast()->error('Please login or sign up to continue.', 'Error!');

			return redirect('/account');
		}
		$user_id = Auth::user()->id;
		$notifications = Notification::where('notify_to', $user_id)->where('status', 'Pending')->paginate(5);
		$user_id = Auth::user()->id;
		foreach ($notifications as $notification) {
			$notification = Notification::find($notification->id);
			$data['status'] = "Seen";
			$notification->update($data);
		}
		$active = "notification";
		return view('main.landing.notifications', compact('notifications', 'active'));
	}

	public  function my_wishlists(Request $request)
	{
		if (empty(Auth::user()->id)) {
			toast()->error('Please login or sign up to continue.', 'Error!');

			return redirect('/account');
		}
		$user_id = Auth::user()->id;
		$categories = Category::all()->take(8);
		$secondaries = Category::all()->take(3);
		$featured_products = Item::where('category_id', 16)->get();
		$wishlists = Wishlist::where('user_id', $user_id)->paginate(5);
		$active = "wishlist";
		return view('main.landing.wishlists', compact('categories', 'wishlists', 'secondaries', 'featured_products', 'active'));
	}



	public  function profile(Request $request)
	{
		if (empty(Auth::user()->id)) {
			toast()->error('Please login or sign up to continue.', 'Error!');

			return redirect('/account');
		}
		$user_id = Auth::user()->id;
		$user_info = User::find($user_id);
		$transaction_infos = Transaction::where('from', $user_id)->get();
		$address_info = Address::where('id', $user_info->address)->first();
		$credit_info = Credit::where('user_id', $user_id)->first();
		$active = "profile";
		return view('main.landing.profile', compact('user_info', 'transaction_infos', 'address_info', 'credit_info', 'active'));
	}

	public  function my_credit_requests(Request $request)
	{
		if (empty(Auth::user()->id)) {
			toast()->error('Please login or sign up to continue.', 'Error!');

			return redirect('/account');
		}
		$user_id = Auth::user()->id;
		$user_info = User::find($user_id);
		$credit_requests = CreditRequest::where('user_id', $user_id)->paginate(5);
		$active = "credit_requests";
		return view('main.landing.credit_requests', compact('user_info', 'credit_requests', 'active'));
	}

	public  function request_credit(Request $request)
	{
		if (empty(Auth::user()->id)) {
			toast()->error('Please login or sign up to continue.', 'Error!');

			return redirect('/account');
		}
		$user_id = Auth::user()->id;
		$user_info = User::find($user_id);
		$banks = Bank::all();
		$active = "request_credit";
		return view('main.landing.request_credit', compact('user_info', 'banks', 'active'));
	}


	public  function submit_credit_request(Request $request)

	{
		try {
			if (empty(Auth::user()->id)) {
				toast()->error('Please login or sign up to continue.', 'Error!');

				return redirect('/account');
			}
			$user_id = Auth::user()->id;
			$credit_request = new CreditRequest();
			$credit_request->user_id = $user_id;
			$credit_request->bank_id = $request->bank_id;
			$credit_request->amount = $request->amount;
			$credit_request->transaction_id = $request->transaction_id;
			$credit_request->created_by = $user_id;
			$credit_request->status = "Pending";
			$credit_request->save();


			$newAmount = $request->amount;
			$user = User::find($user_id);
			$message2 = $user->name . ', ' . ' your credit request for ' . $newAmount . ' is now recieved. It will be added to your available credit when we confirm the transaction info you provided.';
			$notification2 = new Notification();
			$notification2->notify_to = $user->id;
			$notification2->content = $message2;
			$notification2->status = "Pending";
			$notification2->save();



			toast()->success('Credit request submitted successfully. Your status will be confirmed after a while.');

			return redirect('/my_credit_requests');
		} catch (\Exception $e) {

			toast()->error($e->getMessage());
			return redirect('/request_credit');
		}
	}

	public  function my_transactions(Request $request)
	{
		if (empty(Auth::user()->id)) {
			toast()->error('Please login or sign up to continue.', 'Error!');

			return redirect('/account');
		}
		$user_id = Auth::user()->id;
		$user_info = User::find($user_id);
		$transactions = Transaction::where('from', $user_id)->get();
		$address_info = Address::where('id', $user_info->address)->first();
		$credit_info = Credit::where('user_id', $user_id)->first();
		$active = "search";
		return view('main.landing.transaction', compact('user_info', 'transactions', 'address_info', 'credit_info', 'active'));
	}

	public  function credit_info(Request $request)
	{
		if (empty(Auth::user()->id)) {
			toast()->error('Please login or sign up to continue.', 'Error!');

			return redirect('/account');
		}
		$user_id = Auth::user()->id;
		$user_info = User::find($user_id);
		$transaction_infos = Transaction::where('from', $user_id)->get();
		$address_info = Address::where('id', $user_info->address)->first();
		$credit_info = Credit::where('user_id', $user_id)->first();
		$active = "profile";
		return view('main.landing.credit_info', compact('user_info', 'transaction_infos', 'address_info', 'credit_info', 'active'));
	}

	public  function log_out(Request $request)
	{
		Auth::logout();
		return redirect('/');
	}
	public function con()
	{





		return view('administrator.dashboard.dashboard');
	}
	public function storeCustomer(Request $request)
	{
		try {
			$address = new Address();
			$address->region =  $request->get('region');
			$address->city =  $request->get('city');
			$address->location =  $request->get('location');
			$address->building =  $request->get('building');
			$address->sub_city =  $request->get('sub_city');



			$address->save();
			//die(print_r($address->id));

			$super_admin = new User;
			$super_admin->name = $request->get('name');
			$super_admin->father_name = $request->get('father_name');
			$super_admin->email = $request->get('email');
			$super_admin->phone_no = $request->get('phone_no');
			$super_admin->activation_key = rand(100000, 900000);
			$super_admin->gender = $request->get('gender');

			$super_admin->address = $address->id;
			$super_admin->role = 100;

			if (!empty(request()->profile_picture)) {

				$profile_picture = time() . '.' . request()->profile_picture->getClientOriginalExtension();
				$super_admin->profile_picture = $profile_picture;
				request()->profile_picture->move(public_path('public/profile_picture'), $profile_picture);
			} else {
				$profile_picture = $request->get('profile_picture');
			}


			$super_admin->access_label = 1;
			$super_admin->activation_status = 0;
			$super_admin->password =  bcrypt($request->get('password'));
			//die(print_r($super_admin));
			$result = $super_admin->save();

			$credit = new Credit();
			$credit->user_id = $super_admin->id;
			$credit->on_hold = '0';
			$credit->amount = '0';
			$credit->created_by = $super_admin->id;
			$credit->save();
			Session::put('pr_email', $request->email);

			try {
				Mail::send('emails.welcome', ['request' => $super_admin], function ($m) use ($super_admin) {
					$m->from('no-reply@arganon.com', 'Arganon e-comerce');
					$m->to($super_admin->email)->subject('Registration Request.');
				});
			} catch (Exception $exception) {

				return toast()->error('Unable to send email.');;
			}


			toast()->success('We have sent you an activation code at' . $request->email . '. Please enter the code here and to verify the email is yours.');

			return redirect('/finalize_registration');
		} catch (\Exception $e) {
			DB::rollback();
			toast()->error($e->getMessage());

			return redirect('/account');
		}
	}

	public  function finalize_registration(Request $request)
	{
		$active = "account";
		if (!empty(Auth::user()->id)) {
			Auth::logout();
		}
		return view('main.landing.finalize_registration', compact('active'));
	}
	public function complete_registration(Request $request)
	{
		$email = session()->get('pr_email');
		$user = User::where('email', $email)->where('role', 100)->first();
		$activation_key_from_db = $user->activation_key;

		$activation_key = $request->activation_key;
		

		if ($activation_key != $activation_key_from_db) {
			toast()->error('Incorrect Activation Key.');

			return redirect('/finalize_registration');
		} else {
			$updated_status = 1;

			$user->activation_status = $updated_status;
			$user->save();
			toast()->success('You account is activated. Please login and continur with the new password.');

			return redirect('/account');
		}
	}

	public function file()
	{
		// 	$file_path = 'public/nwi2 cosmos data Ethiopia Somali_wave1.xlsx';
		// return $file_path;
	}
}
