<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Credit;
use App\Models\CreditTransfer;
use App\Models\Notification;
use App\Models\DeletedBy;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class CreditTransfersController extends Controller
{

    /**
     * Display a listing of the credit transfers.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $creditTransfers = CreditTransfer::with('creator', 'updater')->paginate(1000);

        return view('credit_transfers.index', compact('creditTransfers'));
    }

    /**
     * Show the form for creating a new credit transfer.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $users = User::all();
        return view('credit_transfers.create', compact('users'));
    }

    /**
     * Store a new credit transfer in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {


            $from_credit = Credit::where('user_id', $request->from)->first();
            $to_credit = Credit::where('user_id', $request->to)->first();
            $from_amount = $from_credit->amount;
            $to_amount = $to_credit->amount;

            if ($request->amount > $from_amount) {
                return redirect()->route('credit_transfers.credit_transfer.create')->withInput()
                ->with('exception', 'Insufficent balance to transfer the given amount.');
              
            }

            $data['created_by'] = Auth::user()->id;
            $data['from'] = $request->from;
            $data['to'] = $request->to;
            $data['amount'] = $request->amount;
            $transaction_id = rand(1000000, 9000000);
            $data['transaction_id'] = $transaction_id;
            CreditTransfer::create($data);

            $from_balance['amount'] =   $from_amount - $request->amount;
            $from_credit->update($from_balance);


            $to_balance['amount'] =   $to_amount + $request->amount;
            $to_credit->update($to_balance);
            $sender = User::find($request->from);
            $reciever = User::find($request->to);
            $transfer_amount = $request->amount;
            $to_balance_final =  $to_amount + $request->amount;
            $from_balance_final =  $from_amount - $request->amount;

            $message = 'Dear ' . $sender->name . ' , you transfered ' . $transfer_amount. ' ETB to ' . $reciever->name . ' ' . $reciever->father_name . ' with transaction id ' . $transaction_id . '. Your current balance is ' . $from_balance_final.' ETB' ;
            $notification = new Notification();
            $notification->notify_to = $sender->id;
            $notification->content = $message;
            $notification->status = "Pending";
            $notification->save();
         
            $message2 = 'Dear ' . $reciever->name . ' , you recieved a transfer of ' . $transfer_amount . ' ETB from ' . $sender->name . ' ' . $sender->father_name . ' with transaction id ' . $transaction_id . '. Your current balance is ' . $to_balance_final.' ETB';
            $notification2 = new Notification();
            $notification2->notify_to = $reciever->id;
            $notification2->content = $message2;
            $notification2->status = "Pending";
            $notification2->save();

            return redirect()->route('credit_transfers.credit_transfer.index')
                ->with('message', 'Credit Transfer was successfully added.');
        } catch (Exception $exception) {
            dd($exception->getMessage());
            return back()->withInput()
                ->withErrors(['exception' => $exception->getMessage()]);
        }
    }

    /**
     * Display the specified credit transfer.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $creditTransfer = CreditTransfer::with('creator', 'updater')->findOrFail($id);

        return view('credit_transfers.show', compact('creditTransfer'));
    }

    /**
     * Show the form for editing the specified credit transfer.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $creditTransfer = CreditTransfer::findOrFail($id);
        $users = User::all();
        return view('credit_transfers.edit', compact('creditTransfer', 'users'));
    }

    /**
     * Update the specified credit transfer in the storage.
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
            $creditTransfer = CreditTransfer::findOrFail($id);
            $creditTransfer->update($data);

            return redirect()->route('credit_transfers.credit_transfer.index')
                ->with('success_message', 'Credit Transfer was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified credit transfer from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $creditTransfer = CreditTransfer::findOrFail($id);
            $creditTransfer->delete();

            return redirect()->route('credit_transfers.credit_transfer.index')
                ->with('success_message', 'Credit Transfer was successfully deleted.');
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
            'from' => 'required|numeric|min:-2147483648|max:2147483647',
            'to' => 'required|numeric|min:-2147483648|max:2147483647',
            'amount' => 'required|string|min:1|max:10'

        ];


        $data = $request->validate($rules);




        return $data;
    }
}
