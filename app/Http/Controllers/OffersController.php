<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DeletedBy;
use App\Models\Offer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class OffersController extends Controller
{

    /**
     * Display a listing of the offers.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $offers = Offer::paginate(25);

        return view('offers.index', compact('offers'));
    }

    /**
     * Show the form for creating a new offer.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $creators = User::pluck('name','id')->all();
$updaters = User::pluck('name','id')->all();
$deletedBies = DeletedBy::pluck('id','id')->all();
        
        return view('offers.create', compact('creators','updaters','deletedBies'));
    }

    /**
     * Store a new offer in the storage.
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
            Offer::create($data);

            return redirect()->route('offers.offer.index')
                ->with('success_message', 'Offer was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified offer.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $offer = Offer::with('creator','updater','deletedby')->findOrFail($id);

        return view('offers.show', compact('offer'));
    }

    /**
     * Show the form for editing the specified offer.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $offer = Offer::findOrFail($id);
        $creators = User::pluck('name','id')->all();
$updaters = User::pluck('name','id')->all();
$deletedBies = DeletedBy::pluck('id','id')->all();

        return view('offers.edit', compact('offer','creators','updaters','deletedBies'));
    }

    /**
     * Update the specified offer in the storage.
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
            $offer = Offer::findOrFail($id);
            $offer->update($data);

            return redirect()->route('offers.offer.index')
                ->with('success_message', 'Offer was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified offer from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $offer = Offer::findOrFail($id);
            $offer->delete();

            return redirect()->route('offers.offer.index')
                ->with('success_message', 'Offer was successfully deleted.');
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
                'label' => 'required|string|min:1|max:1000',
            'description' => 'required|string|min:1|max:1000',
            'image' => 'required|numeric|string|min:1|max:1000',
            'status' => 'required|string|min:1|max:10',
            'created_by' => 'required',
            'updated_by' => 'nullable',
            'deleted_by' => 'nullable', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
