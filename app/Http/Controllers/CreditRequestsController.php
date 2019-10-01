<?php

namespace App\Http\Controllers;

use App\Credit;
use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\CreditRequest;
use App\Models\DeletedBy;
use App\Models\Transaction;
use App\Models\Notification;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class CreditRequestsController extends Controller
{

    /**
     * Display a listing of the credit requests.
     *
     * @return Illuminate\View\View
     */
    public function my_requests()
    { $user_id = Auth::user()->id;
        $creditRequests = CreditRequest::with('user', 'bank', 'transaction', 'creator', 'updater')->where('user_id', $user_id)->paginate(1000);

        return view('credit_requests.my_requests', compact('creditRequests'));
    }
    public function index()
    {
        $creditRequests = CreditRequest::orderBy('created_at', 'DESC')->with('user', 'bank', 'transaction', 'creator', 'updater')->paginate(25);

        return view('credit_requests.index', compact('creditRequests'));
    }

    /**
     * Show the form for creating a new credit request.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $users = User::pluck('id', 'id')->all();
        $banks = Bank::pluck('id', 'id')->all();
        $transactions = Transaction::pluck('from', 'id')->all();
        $creators = User::pluck('name', 'id')->all();
        $updaters = User::pluck('name', 'id')->all();


        return view('credit_requests.create', compact('users', 'banks', 'transactions', 'creators', 'updaters', 'deletedBies'));
    }

    public function request_credit()
    {
        $banks = Bank::pluck('id', 'id')->all();
        


        return view('credit_requests.new_request', compact( 'banks'));
    }

    public function submit_request(Request $request)
    {
        try {

            $data = $this->getData2($request);
            $data['created_by'] =  Auth::user()->id;
            $data['user_id'] =  Auth::user()->id;
            $data['status'] = "Pending";

            CreditRequest::create($data);

            $newAmount = $data['amount'];
            $user_id = Auth::user()->id;
			$user = User::find($user_id);
			$message2 = $user->name . ', ' . ' your credit request for ' . $newAmount . ' is now recieved. It will be added to your available credit when we confirm the transaction info you provided.';
			$notification2 = new Notification();
			$notification2->notify_to = $user->id;
			$notification2->content = $message2;
			$notification2->status = "Pending";
			$notification2->save();
          

            return  redirect('/my_requests');
               
        } catch (Exception $exception) {
dd($exception->getMessage());
            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
        }
    }
    /**
     * Store a new credit request in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);
            $data['created_by'] =  Auth::user()->id;
            CreditRequest::create($data);
          

            return redirect()->route('credit_requests.credit_request.index')
                ->with('message', 'Credit Request was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified credit request.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $creditRequest = CreditRequest::with('user', 'bank', 'transaction', 'creator', 'updater', 'deletedby')->findOrFail($id);

        return view('credit_requests.show', compact('creditRequest'));
    }

    /**
     * Show the form for editing the specified credit request.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $creditRequest = CreditRequest::findOrFail($id);
        $users = User::pluck('id', 'id')->all();
        $banks = Bank::pluck('id', 'id')->all();
        $transactions = Transaction::pluck('from', 'id')->all();
        $creators = User::pluck('name', 'id')->all();
        $updaters = User::pluck('name', 'id')->all();


        return view('credit_requests.edit', compact('creditRequest', 'users', 'banks', 'transactions', 'creators', 'updaters', 'deletedBies'));
    }

    /**
     * Update the specified credit request in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            $user_id = $request->user_id;
            $data = $this->getData($request);
            $data['updated_by'] = Auth::user()->id;
            $creditRequest = CreditRequest::findOrFail($id);
            $old_status = $creditRequest->status;
            $status = $data['status'];
            $newAmount = $data['amount'];

            if ($status == 'Confirmed' && $old_status != 'Confirmed') {
                $credit_info = Credit::where('user_id', $user_id)->first();
                $old_credit = $credit_info->amount;
                $new_credit = $old_credit + $newAmount;
                $credit['amount'] = $new_credit;
                $credit['updated_by'] =  Auth::user()->id;
                $credit_info->update($credit);


                $user = User::find($user_id);
                $message2 = $user->name . ', ' . ' your credit request for ' . $newAmount . ' is now confirmed and added to your available credit.';
                $notification2 = new Notification();
                $notification2->notify_to = $user->id;
                $notification2->content = $message2;
                $notification2->status = "Pending";
                $notification2->save();
            }

            if ($status == 'Declined') {
                $credit_info = Credit::where('user_id', $user_id)->first();
                $old_credit = $credit_info->amount;
                $new_credit = $old_credit + $newAmount;
                $credit['amount'] = $new_credit;
                $credit['updated_by'] =  Auth::user()->id;
                $credit_info->update($credit);

                $user = User::find($user_id);
                $message2 = $user->name . ', ' . ' your credit request for ' . $newAmount . ' is declined. Please send a new request by entering a correct information.';
                $notification2 = new Notification();
                $notification2->notify_to = $user->id;
                $notification2->content = $message2;
                $notification2->status = "Pending";
                $notification2->save();
            }
            $creditRequest->update($data);

            return redirect()->route('credit_requests.credit_request.index')
                ->with('message', 'Credit Request was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified credit request from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $creditRequest = CreditRequest::findOrFail($id);
            $creditRequest->delete();

            return redirect()->route('credit_requests.credit_request.index')
                ->with('message', 'Credit Request was successfully deleted.');
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
            'user_id' => 'required',
            'amount' => 'required|string|min:1|max:20',
            'bank_id' => 'required',
            'transaction_id' => 'required',
            'status' => 'required|string|min:1|max:20',

        ];


        $data = $request->validate($rules);




        return $data;
    }


    protected function getData2(Request $request)
    {
        $rules = [
           
            'amount' => 'required|string|min:1|max:20',
            'bank_id' => 'required',
            'transaction_id' => 'required',
           
        ];


        $data = $request->validate($rules);




        return $data;
    }

}
