<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Credit;
//use App\Models\User;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Session;
class CreditsController extends Controller
{

    /**
     * Display a listing of the credits.
     *
     * @return Illuminate\View\View
     */
    public function index(Request $request)
    {

        $request->session()->forget('start_date');
        $request->session()->forget('end_date');
        if (!empty($request->start_date) && !empty($request->end_date)) {
            $start_date = $request->start_date;
            $end_date = $request->end_date;

            Session::put('start_date', $start_date);
            Session::put('end_date', $end_date);

            $credits = Credit::orderBy('created_at' ,'DESC' )->with('user', 'creator', 'updater')->paginate(1000);
        } else {
            $credits = Credit::orderBy('created_at' ,'DESC' )->with('user', 'creator', 'updater')->paginate(1000);
        }

        return view('credits.index', compact('credits'));
    }

    /**
     * Show the form for creating a new credit.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $users = User::pluck('name', 'id')->all();
        $creators = User::pluck('name', 'id')->all();
        $updaters = User::pluck('name', 'id')->all();

        return view('credits.create', compact('users', 'creators', 'updaters'));
    }

    /**
     * Store a new credit in the storage.
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
            Credit::create($data);

            return redirect()->route('credits.credit.index')
                ->with('message', 'Credit was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified credit.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $credit = Credit::with('user', 'creator', 'updater')->findOrFail($id);

        return view('credits.show', compact('credit'));
    }

    /**
     * Show the form for editing the specified credit.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $credit = Credit::findOrFail($id);
        $users = User::pluck('name', 'id')->all();
        $creators = User::pluck('name', 'id')->all();
        $updaters = User::pluck('name', 'id')->all();

        return view('credits.edit', compact('credit', 'users', 'creators', 'updaters'));
    }

    /**
     * Update the specified credit in the storage.
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
            $credit = Credit::findOrFail($id);
            $credit->update($data);

            return redirect()->route('credits.credit.index')
                ->with('message', 'Credit was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified credit from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $credit = Credit::findOrFail($id);
            $credit->delete();

            return redirect()->route('credits.credit.index')
                ->with('message', 'Credit was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    public  function my_credit_info(Request $request)
    {
        if (empty(Auth::user()->id)) {
            toast()->error('Please login or sign up to continue.', 'Error!');

            return redirect('/account');
        }
        $user_id = Auth::user()->id;

        $credit_info = Credit::where('user_id', $user_id)->first();
        $active = "profile";
        return view('credits.single', compact('credit_info'));
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
            'amount' => 'required|numeric|min:-2147483648|max:2147483647',
            'user_id' => 'nullable'

        ];


        $data = $request->validate($rules);




        return $data;
    }
}
