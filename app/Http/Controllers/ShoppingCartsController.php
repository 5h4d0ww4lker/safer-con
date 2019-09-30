<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Merchant;
use App\Models\ShoppingCart;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;

class ShoppingCartsController extends Controller
{

    /**
     * Display a listing of the shopping carts.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->get();
       
        $access_label = $user['0']['access_label'];
        
        if($access_label == 1){

        $shoppingCarts = ShoppingCart::with('merchant','user','item')->orderBy('created_at', 'DESC')->paginate(10);
        }
        else{
            $shoppingCarts = ShoppingCart::with('merchant','user','item')->where('merchant_id', $user_id)->orderBy('created_at', 'DESC')->paginate(10);
        }

        return view('shopping_carts.index', compact('shoppingCarts'));
    }

    /**
     * Show the form for creating a new shopping cart.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $merchants = Merchant::pluck('name','id')->all();
$users = User::pluck('id','id')->all();
$items = Item::pluck('name','id')->all();
        
        return view('shopping_carts.create', compact('merchants','users','items'));
    }

    /**
     * Store a new shopping cart in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            ShoppingCart::create($data);

            return redirect()->route('shopping_carts.shopping_cart.index')
                ->with('success_message', 'Shopping Cart was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified shopping cart.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $shoppingCart = ShoppingCart::with('merchant','user','item')->findOrFail($id);

        return view('shopping_carts.show', compact('shoppingCart'));
    }

    /**
     * Show the form for editing the specified shopping cart.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $shoppingCart = ShoppingCart::findOrFail($id);
        $merchants = Merchant::pluck('name','id')->all();
$users = User::pluck('id','id')->all();
$items = Item::pluck('name','id')->all();

        return view('shopping_carts.edit', compact('shoppingCart','merchants','users','items'));
    }

    /**
     * Update the specified shopping cart in the storage.
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
            
            $shoppingCart = ShoppingCart::findOrFail($id);
            $shoppingCart->update($data);

            return redirect()->route('shopping_carts.shopping_cart.index')
                ->with('success_message', 'Shopping Cart was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified shopping cart from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $shoppingCart = ShoppingCart::findOrFail($id);
            $shoppingCart->delete();

            return redirect()->route('shopping_carts.shopping_cart.index')
                ->with('success_message', 'Shopping Cart was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
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
                'merchant_id' => 'required',
            'user_id' => 'required',
            'item_id' => 'required',
            'price' => 'required|string|min:1|max:10',
            'status' => 'required|string|min:1|max:10', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
