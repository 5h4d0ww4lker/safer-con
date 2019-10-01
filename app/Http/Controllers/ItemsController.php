<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Merchant;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\Brand;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Credit;
use App\Models\ItemDetail;
use App\Models\PayRate;
use Session;

class ItemsController extends Controller
{

    /**
     * Display a listing of the items.
     *
     * @return Illuminate\View\View
     */
    public function index(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->get();

        $access_label = $user['0']['role'];

        $request->session()->forget('start_date');
        $request->session()->forget('end_date');

        if (!empty($request->start_date) && !empty($request->end_date)) {
            $start_date = $request->start_date;
            $end_date = $request->end_date;

            Session::put('start_date', $start_date);
            Session::put('end_date', $end_date);

            if ($access_label == 1) {
                $items = Item::with('merchant', 'creator', 'updater')->whereBetween('created_at', [$start_date, $end_date])->orderBy('created_at', 'DESC')->paginate(1000);
            } else {
                $items = Item::with('merchant', 'creator', 'updater')->where('created_by', $user_id)->whereBetween('created_at', [$start_date, $end_date])->orderBy('created_at', 'DESC')->paginate(1000);
            }
        } else {
            if ($access_label == 1) {
                $items = Item::with('merchant', 'creator', 'updater')->orderBy('created_at', 'DESC')->paginate(1000);
            } else {
                $items = Item::with('merchant', 'creator', 'updater')->where('created_by', $user_id)->orderBy('created_at', 'DESC')->paginate(1000);
            }
        }

        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new item.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();
        $sub_categories = SubCategory::pluck('name', 'id')->all();
        $brands = Brand::pluck('name', 'id')->all();

        return view('items.create', compact('categories', 'sub_categories', 'brands'));
    }

    /**
     * Store a new item in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {


            $data = $this->getData($request);
            $item = new Item();
            $item->created_by = Auth::user()->id;
            $item->name = request()->name;
            $item->item_price = request()->item_price;
            $item->category_id = request()->category_id;
            $item->sub_category_id = request()->sub_category_id;
            $item->brand_id = request()->brand_id;
            $item->status = 'INACTIVE';



            $user_id =  Auth::user()->id;
            $credit = Credit::where('user_id', $user_id)->first();
            $available_credit = $credit->amount;

            $category = Category::find(request()->category_id);
            $pay_rate_id = $category->pay_rate;
            $pay_rate = PayRate::find($pay_rate_id);
            $percentage = $pay_rate->percentage_from_merchant;
            $price = request()->item_price;
            $commission = $price * $percentage;

            if ($commission > $available_credit) {

                return back()->withInput()
                    ->withErrors(['exception' => 'You can not add this item because youre credit is lower than '.$percentage.' percent of the item price.']);
            }

            if (!empty($data['file_1'])) {
                $file_1 = time() . '.' . request()->file_1->getClientOriginalExtension();

                request()->file_1->move(public_path('public/items'), $file_1);
                $path = 'public/items/';
                $data['file_1'] = $path . $file_1;
                $item->file_1 = $path . $file_1;
            }

            if (!empty($data['file_2'])) {
                $file_2 = time() . '.' . request()->file_2->getClientOriginalExtension();

                request()->file_2->move(public_path('public/items'), $file_2);
                $path = 'public/items/';
                $data['file_2'] = $path . $file_2;
                $item->file_2 = $path . $file_2;
            }

            if (!empty($data['file_3'])) {
                $file_3 = time() . '.' . request()->file_3->getClientOriginalExtension();

                request()->file_3->move(public_path('public/items'), $file_3);
                $path = 'public/items/';
                $data['file_3'] = $path . $file_3;
                $item->file_3 = $path . $file_3;
            }

            if (!empty($data['file_4'])) {
                $file_4 = time() . '.' . request()->file_4->getClientOriginalExtension();

                request()->file_4->move(public_path('public/items'), $file_4);
                $path = 'public/items/';
                $data['file_4'] = $path . $file_4;
                $item->file_4 = $path . $file_4;
            }
            if (!empty($data['file_5'])) {
                $file_5 = time() . '.' . request()->file_5->getClientOriginalExtension();

                request()->file_5->move(public_path('public/items'), $file_5);
                $path = 'public/items/';
                $data['file_5'] = $path . $file_5;
                $item->file_5 = $path . $file_5;
            }
            if (!empty($data['file_6'])) {
                $file_6 = time() . '.' . request()->file_6->getClientOriginalExtension();

                request()->file_6->move(public_path('public/items'), $file_6);
                $path = 'public/items/';
                $data['file_6'] = $path . $file_6;
                $item->file_6 = $path . $file_6;
            }
            //   die(print_r($data));
            //Item::create($data);
            $item->save();
            Session::put('item_id', $item->id);



            return redirect()->route('item_details.item_detail.create')
                ->with('message', 'Item was successfully added. Please details for the Item.');
        } catch (Exception $exception) {
            return $exception;
            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified item.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $item = Item::with('creator', 'updater')->findOrFail($id);

        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified item.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $categories = Category::pluck('name', 'id')->all();
        $sub_categories = SubCategory::pluck('name', 'id')->all();
        $brands = Brand::pluck('name', 'id')->all();

        return view('items.edit', compact('item', 'categories', 'sub_categories', 'brands'));
    }

    /**
     * Update the specified item in the storage.
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
            $data['updated_by'] = Auth::Id();
            $item = Item::findOrFail($id);
            //$data = $this->getData($request);

            $item->created_by = Auth::user()->id;
            $item->name = request()->name;
            $item->item_price = request()->item_price;
            $item->category_id = request()->category_id;
            $item->sub_category_id = request()->sub_category_id;
            $item->brand_id = request()->brand_id;

            $item_detail = ItemDetail::where('item_id', $id)->first();
            if ($request->status == 'ACTIVE' && !$item_detail) {
                Session::put('item_id', $id);
                return redirect()->route('item_details.item_detail.create')
                    ->with('exception', 'You need to add item details to make an item active.');
            }
            $item->status = request()->status;
            if (!empty($data['file_1'])) {
                $file_1 = time() . '.' . request()->file_1->getClientOriginalExtension();

                request()->file_1->move(public_path('public/items'), $file_1);
                $path = 'public/items/';
                $data['file_1'] = $path . $file_1;
                $item->file_1 = $path . $file_1;
            }

            if (!empty($data['file_2'])) {
                $file_2 = time() . '.' . request()->file_2->getClientOriginalExtension();

                request()->file_2->move(public_path('public/items'), $file_2);
                $path = 'public/items/';
                $data['file_2'] = $path . $file_2;
                $item->file_2 = $path . $file_2;
            }

            if (!empty($data['file_3'])) {
                $file_3 = time() . '.' . request()->file_3->getClientOriginalExtension();

                request()->file_3->move(public_path('public/items'), $file_3);
                $path = 'public/items/';
                $data['file_3'] = $path . $file_3;
                $item->file_3 = $path . $file_3;
            }

            if (!empty($data['file_4'])) {
                $file_4 = time() . '.' . request()->file_4->getClientOriginalExtension();

                request()->file_4->move(public_path('public/items'), $file_4);
                $path = 'public/items/';
                $data['file_4'] = $path . $file_4;
                $item->file_4 = $path . $file_4;
            }
            if (!empty($data['file_5'])) {
                $file_5 = time() . '.' . request()->file_5->getClientOriginalExtension();

                request()->file_5->move(public_path('public/items'), $file_5);
                $path = 'public/items/';
                $data['file_5'] = $path . $file_5;
                $item->file_5 = $path . $file_5;
            }
            if (!empty($data['file_6'])) {
                $file_6 = time() . '.' . request()->file_6->getClientOriginalExtension();

                request()->file_6->move(public_path('public/items'), $file_6);
                $path = 'public/items/';
                $data['file_6'] = $path . $file_6;
                $item->file_6 = $path . $file_6;
            }
            //   die(print_r($data));
            //Item::create($data);
            $item->save();


            return redirect()->route('items.item.index')
                ->with('message', 'Item was successfully updated.');
        } catch (Exception $exception) {
            return $exception;
            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified item from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $item = Item::findOrFail($id);
            $item->delete();

            return redirect()->route('items.item.index')
                ->with('message', 'Item was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    public function searchItems(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->get();
        $term = $request->searchTerm;

        $access_label = $user['0']['access_label'];
        if ($access_label == 1) {
            $items = Item::where('name', 'LIKE', "%$term%")->orWhere('created_at', 'LIKE', "%$term%")->paginate(10);
        } else {
            $items = Item::where('name', 'LIKE', "%$term%")->where('created_by',  $user_id)->orWhere('created_at', 'LIKE', "%$term%")->paginate(10);
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

            'name' => 'nullable|string|min:1|max:200',
            'item_price' => 'nullable|string|min:0|max:20',


            'file_1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file_3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file_4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file_5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file_6' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ];


        $data = $request->validate($rules);




        return $data;
    }
}
