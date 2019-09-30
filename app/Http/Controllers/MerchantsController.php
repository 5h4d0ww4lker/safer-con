<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Merchant;
use Illuminate\Http\Request;
use Exception;

class MerchantsController extends Controller
{

    /**
     * Display a listing of the merchants.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $merchants = Merchant::paginate(25);

        return view('merchants.index', compact('merchants'));
    }

    /**
     * Show the form for creating a new merchant.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('merchants.create');
    }

    /**
     * Store a new merchant in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Merchant::create($data);

            return redirect()->route('merchants.merchant.index')
                ->with('success_message', 'Merchant was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified merchant.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $merchant = Merchant::findOrFail($id);

        return view('merchants.show', compact('merchant'));
    }

    /**
     * Show the form for editing the specified merchant.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $merchant = Merchant::findOrFail($id);


        return view('merchants.edit', compact('merchant'));
    }

    /**
     * Update the specified merchant in the storage.
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

            $merchant = Merchant::findOrFail($id);
            $merchant->update($data);

            return redirect()->route('merchants.merchant.index')
                ->with('success_message', 'Merchant was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified merchant from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $merchant = Merchant::findOrFail($id);
            $merchant->delete();

            return redirect()->route('merchants.merchant.index')
                ->with('success_message', 'Merchant was successfully deleted.');
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
            'name' => 'required|string|min:1|max:255',
            'address' => 'required|string|min:1|max:100',
            'profile_picture' => 'nullable|numeric|min:-2147483648|max:2147483647',
            'tin' => 'nullable|string|min:0|max:50',
            'user_id' => 'required|numeric|min:-2147483648|max:2147483647',
            'activation_status' => 'required|string|min:1|max:10',
            'deletion_status' => 'nullable|string|min:0|max:10',
        ];


        $data = $request->validate($rules);




        return $data;
    }
}
