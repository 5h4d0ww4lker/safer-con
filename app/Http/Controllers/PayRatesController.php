<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DeletedBy;
use App\Models\PayRate;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class PayRatesController extends Controller
{

    /**
     * Display a listing of the pay rates.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $payRates = PayRate::with('creator','updater')->paginate(1000);

        return view('pay_rates.index', compact('payRates'));
    }

    /**
     * Show the form for creating a new pay rate.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $creators = User::pluck('name','id')->all();
$updaters = User::pluck('name','id')->all();

        
        return view('pay_rates.create', compact('creators','updaters'));
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
         
            PayRate::create($data);

            return redirect()->route('pay_rates.pay_rate.index')
                ->with('message', 'Pay Rate was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
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
        $payRate = PayRate::with('creator','updater','deletedby')->findOrFail($id);

        return view('pay_rates.show', compact('payRate'));
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
        $payRate = PayRate::findOrFail($id);
        $creators = User::pluck('name','id')->all();
$updaters = User::pluck('name','id')->all();

        return view('pay_rates.edit', compact('payRate','creators','updaters','deletedBies'));
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
            $payRate = PayRate::findOrFail($id);
            $payRate->update($data);

            return redirect()->route('pay_rates.pay_rate.index')
                ->with('message', 'Pay Rate was successfully updated.');
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
            $payRate = PayRate::findOrFail($id);
            $payRate->delete();

            return redirect()->route('pay_rates.pay_rate.index')
                ->with('message', 'Pay Rate was successfully deleted.');
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
            'percentage_from_merchant' => 'required|numeric|min:-2147483648|max:2147483647',
            'percentage_from_customer' => 'required|numeric|min:-2147483648|max:2147483647',
           
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
