<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\DeletedBy;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class BanksController extends Controller
{

    /**
     * Display a listing of the banks.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $banks = Bank::with('creator','updater')->paginate(1000);

        return view('banks.index', compact('banks'));
    }

    /**
     * Show the form for creating a new bank.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $creators = User::pluck('name','id')->all();
$updaters = User::pluck('name','id')->all();

        
        return view('banks.create', compact('creators','updaters','deletedBies'));
    }

    /**
     * Store a new bank in the storage.
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
            Bank::create($data);

            return redirect()->route('banks.bank.index')
                ->with('message', 'Bank was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified bank.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $bank = Bank::with('creator','updater','deletedby')->findOrFail($id);

        return view('banks.show', compact('bank'));
    }

    /**
     * Show the form for editing the specified bank.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $bank = Bank::findOrFail($id);
        $creators = User::pluck('name','id')->all();
$updaters = User::pluck('name','id')->all();


        return view('banks.edit', compact('bank','creators','updaters','deletedBies'));
    }

    /**
     * Update the specified bank in the storage.
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
            $bank = Bank::findOrFail($id);
            $bank->update($data);

            return redirect()->route('banks.bank.index')
                ->with('message', 'Bank was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified bank from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $bank = Bank::findOrFail($id);
            $bank->delete();

            return redirect()->route('banks.bank.index')
                ->with('message', 'Bank was successfully deleted.');
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
                'name' => 'required',
            'account_no' => 'required',
           
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
