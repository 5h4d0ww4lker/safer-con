<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DeletedBy;
use App\Models\Tax;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class TaxesController extends Controller
{

    /**
     * Display a listing of the pay rates.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $taxes = Tax::with('creator', 'updater')->paginate(1000);

        return view('taxes.index', compact('taxes'));
    }

    /**
     * Show the form for creating a new pay rate.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $tax = null;
        $creators = User::pluck('name', 'id')->all();
        $updaters = User::pluck('name', 'id')->all();


        return view('taxes.create', compact('creators', 'updaters','tax'));
    }

    /**
     * Store a new pay rate in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);
            $data['created_by'] = Auth::user()->id;

            Tax::create($data);

            return redirect()->route('taxes.tax.index')
                ->with('message', 'Tax was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['exception' => $exception->getMessage()]);
        }
    }

    /**
     * Display the specified pay rate.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $tax = Tax::with('creator', 'updater', 'deletedby')->findOrFail($id);

        return view('taxes.show', compact('tax'));
    }

    /**
     * Show the form for editing the specified pay rate.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $tax = Tax::findOrFail($id);
        $creators = User::pluck('name', 'id')->all();
        $updaters = User::pluck('name', 'id')->all();

        return view('taxes.edit', compact('tax', 'creators', 'updaters', 'deletedBies'));
    }

    /**
     * Update the specified pay rate in the storage.
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
            $data['updated_by'] = Auth::user()->id;
            $tax = Tax::findOrFail($id);
            $tax->update($data);

            return redirect()->route('taxes.tax.index')
                ->with('message', 'Tax was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified pay rate from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $tax = Tax::findOrFail($id);
            $tax->delete();

            return redirect()->route('taxes.tax.index')
                ->with('message', 'Tax was successfully deleted.');
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
            'name' => 'required|string|min:1|max:100',
            'rate' => 'required|numeric|min:-2147483648|max:2147483647',

        ];


        $data = $request->validate($rules);




        return $data;
    }
}
