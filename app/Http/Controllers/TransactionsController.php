<?php

namespace App\Http\Controllers;
use Session;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class TransactionsController extends Controller
{

    /**
     * Display a listing of the transactions.
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
        if($access_label == 1){
        $transactions = Transaction::with('creator','updater')->whereBetween('created_at', [$start_date, $end_date])->orderBy('created_at', 'DESC')->paginate(1000);
    }
        else{
            $transactions = Transaction::with('creator','updater')->whereBetween('created_at', [$start_date, $end_date])->where('to', $user_id)->orderBy('created_at', 'DESC')->paginate(1000);
        }
    }
    else{
        if($access_label == 1){
            $transactions = Transaction::with('creator','updater')->orderBy('created_at', 'DESC')->paginate(1000);
        }
            else{
                $transactions = Transaction::with('creator','updater')->where('to', $user_id)->orderBy('created_at', 'DESC')->paginate(1000);
            }
    }


        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new transaction.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $creators = User::pluck('name','id')->all();
$updaters = User::pluck('name','id')->all();
        
        return view('transactions.create', compact('creators','updaters'));
    }

    /**
     * Store a new transaction in the storage.
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
            Transaction::create($data);

            return redirect()->route('transactions.transaction.index')
                ->with('message', 'Transaction was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified transaction.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $transaction = Transaction::with('creator','updater')->findOrFail($id);

        return view('transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified transaction.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        $creators = User::pluck('name','id')->all();
$updaters = User::pluck('name','id')->all();

        return view('transactions.edit', compact('transaction','creators','updaters'));
    }

    /**
     * Update the specified transaction in the storage.
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
            $transaction = Transaction::findOrFail($id);
            $transaction->update($data);

            return redirect()->route('transactions.transaction.index')
                ->with('message', 'Transaction was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified transaction from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $transaction = Transaction::findOrFail($id);
            $transaction->delete();

            return redirect()->route('transactions.transaction.index')
                ->with('message', 'Transaction was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['error' => 'Unexpected error occurred while trying to process your request.']);
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
                'from' => 'required|numeric|min:-2147483648|max:2147483647',
            'to' => 'required|numeric|min:-2147483648|max:2147483647',
            'amount' => 'required|string|min:1|max:20',
            'status' => 'required|string|min:1|max:25',
            'created_by' => 'required',
            'updated_by' => 'nullable', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
