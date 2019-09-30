<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\ItemDetail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class ItemDetailsController extends Controller
{

    /**
     * Display a listing of the item details.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->get();

        $access_label = $user['0']['access_label'];

        if ($access_label == 1) {
            $itemDetails = ItemDetail::with('item')->orderBy('created_at', 'DESC')->paginate(1000);
        } {
            $itemDetails = ItemDetail::with('item')->where('created_by', $user_id)->orderBy('created_at', 'DESC')->paginate(1000);
        }

        return view('item_details.index', compact('itemDetails'));
    }

    /**
     * Show the form for creating a new item detail.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $user_id = Auth::user()->id;
       // $items = Item::pluck('name', 'id')->where('created_by', $user_id)->get();
     //  dd($user_id);
        $items = Item::where('created_by', $user_id)->pluck('name', 'id');
        $creators = User::pluck('name', 'id')->all();
        $updaters = User::pluck('name', 'id')->all();

        return view('item_details.create', compact('items', 'creators', 'updaters'));
    }

    /**
     * Store a new item detail in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);
            $data['created_by'] = Auth::Id();
            ItemDetail::create($data);

            return redirect()->route('item_details.item_detail.index')
                ->with('message', 'Item Detail was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified item detail.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $itemDetail = ItemDetail::with('item', 'creator', 'updater')->findOrFail($id);

        return view('item_details.show', compact('itemDetail'));
    }

    /**
     * Show the form for editing the specified item detail.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $itemDetail = ItemDetail::findOrFail($id);
        $user_id = Auth::user()->id;
        $items = Item::pluck('name', 'id')->where('created_by', $user_id)->get();
        $creators = User::pluck('name', 'id')->all();
        $updaters = User::pluck('name', 'id')->all();

        return view('item_details.edit', compact('itemDetail', 'items', 'creators', 'updaters'));
    }

    /**
     * Update the specified item detail in the storage.
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
            $itemDetail = ItemDetail::findOrFail($id);
            $itemDetail->update($data);

            return redirect()->route('item_details.item_detail.index')
                ->with('message', 'Item Detail was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified item detail from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $itemDetail = ItemDetail::findOrFail($id);
            $itemDetail->delete();

            return redirect()->route('item_details.item_detail.index')
                ->with('message', 'Item Detail was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
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
            'item_id' => 'required',
            'description' => 'nullable|string|min:0|max:1000',
            'stock' => 'nullable|string|min:0|max:20',
            'size' => 'nullable|string|min:0|max:20',
            'color' => 'nullable|string|min:0|max:100',
            'additional_info' => 'nullable|string|min:0|max:1000',

        ];


        $data = $request->validate($rules);




        return $data;
    }
}
