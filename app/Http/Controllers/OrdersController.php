<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Merchant;
use App\Models\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Exception;

class OrdersController extends Controller
{

    /**
     * Display a listing of the orders.
     *
     * @return Illuminate\View\View
     */
    public function index(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->get();

        $access_label = $user['0']['access_label'];
        $request->session()->forget('start_date');
        $request->session()->forget('end_date');
        if (!empty($request->start_date) && !empty($request->end_date)) {
            $start_date = $request->start_date;
            $end_date = $request->end_date;

            Session::put('start_date', $start_date);
            Session::put('end_date', $end_date);
            if ($access_label == 1) {
                $orders = Order::with('merchant', 'user', 'item')->whereBetween('created_at', [$start_date, $end_date])->orderBy('created_at', 'DESC')->paginate(1000);
            } else {
                $orders = Order::with('merchant', 'user', 'item')->whereBetween('created_at', [$start_date, $end_date])->where('merchant_id', $user_id)->orderBy('created_at', 'DESC')->paginate(1000);
            }
        } else { 

            if ($access_label == 1) {
                $orders = Order::with('merchant', 'user', 'item')->orderBy('created_at', 'DESC')->paginate(1000);
            } else {
                $orders = Order::with('merchant', 'user', 'item')->where('merchant_id', $user_id)->orderBy('created_at', 'DESC')->paginate(1000);
            }
        }

        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new order.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $merchants = Merchant::pluck('name', 'id')->all();
        $users = User::pluck('name', 'id')->all();
        $items = Item::pluck('name', 'id')->all();

        return view('orders.create', compact('merchants', 'users', 'items'));
    }

    /**
     * Store a new order in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Order::create($data);

            return redirect()->route('orders.order.index')
                ->with('message', 'Order was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified order.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $order = Order::with('merchant', 'user', 'item')->findOrFail($id);

        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified order.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $merchants = Merchant::pluck('name', 'id')->all();
        $users = User::pluck('name', 'id')->all();
        $items = Item::pluck('name', 'id')->all();

        return view('orders.edit', compact('order', 'merchants', 'users', 'items'));
    }

    /**
     * Update the specified order in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {

            $data = $this->getData($request);

            $order = Order::findOrFail($id);
            $order->update($data);

            return redirect()->route('orders.order.index')
                ->with('message', 'Order was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified order from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->delete();

            return redirect()->route('orders.order.index')
                ->with('message', 'Order was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    public function searchOrders(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->get();
        $term = $request->searchTerm;

        $access_label = $user['0']['access_label'];
        if ($access_label == 1) {
            $orders = Item::where('name', 'LIKE', "%$term%")->orWhere('created_at', 'LIKE', "%$term%")->paginate(10);
        } else {
            $orders = Item::where('name', 'LIKE', "%$term%")->where('created_by',  $user_id)->orWhere('created_at', 'LIKE', "%$term%")->paginate(10);
        }
        return view('items.index', compact('items'));
    }
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [



            'delivery_date' => 'required|string|min:1|max:10',
        ];


        $data = $request->validate($rules);




        return $data;
    }
}
