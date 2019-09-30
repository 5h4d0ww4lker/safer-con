<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\Merchant;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class ComplaintsController extends Controller
{

    /**
     * Display a listing of the complaints.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {  $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->get();
       
        $access_label = $user['0']['access_label'];
        
        if($access_label == 1){
        $complaints = Complaint::with('user','merchant')->paginate(1000);
        }
        else{
            $complaints = Complaint::with('user','merchant')->where('merchant_id', $user_id)->paginate(25);
        }

        return view('complaints.index', compact('complaints'));
    }

    /**
     * Show the form for creating a new complaint.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $users = User::pluck('id','id')->all();
$merchants = Merchant::pluck('name','id')->all();
$updaters = User::pluck('name','id')->all();
        
        return view('complaints.create', compact('users','merchants','updaters'));
    }

    /**
     * Store a new complaint in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Complaint::create($data);

            return redirect()->route('complaints.complaint.index')
                ->with('success_message', 'Complaint was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified complaint.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $complaint = Complaint::with('user','merchant','updater')->findOrFail($id);

        return view('complaints.show', compact('complaint'));
    }

    /**
     * Show the form for editing the specified complaint.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $complaint = Complaint::findOrFail($id);
        $users = User::pluck('id','id')->all();
$merchants = Merchant::pluck('name','id')->all();
$updaters = User::pluck('name','id')->all();

        return view('complaints.edit', compact('complaint','users','merchants','updaters'));
    }

    /**
     * Update the specified complaint in the storage.
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
            $complaint = Complaint::findOrFail($id);
            $complaint->update($data);

            return redirect()->route('complaints.complaint.index')
                ->with('success_message', 'Complaint was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified complaint from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $complaint = Complaint::findOrFail($id);
            $complaint->delete();

            return redirect()->route('complaints.complaint.index')
                ->with('success_message', 'Complaint was successfully deleted.');
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
                'user_id' => 'required',
            'merchant_id' => 'required',
            'title' => 'required|string|min:1|max:100',
            'description' => 'required|string|min:1|max:1000',
            'status' => 'required|string|min:1|max:20',
            'updated_by' => 'nullable', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
