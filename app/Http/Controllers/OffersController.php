<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\DeletedBy;
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
        $offers = Offer::paginate(1000);

        return view('offers.index', compact('offers'));
    }

    /**
     * Show the form for creating a new offer.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $creators = User::pluck('name', 'id')->all();
        $updaters = User::pluck('name', 'id')->all();
        return view('offers.create', compact('creators', 'updaters'));
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

            $data['label'] = $request->label;
            $data['description'] = $request->description;
            $data['status'] = $request->status;
            $data['created_by'] = Auth::user()->id;
            if (!empty($request->image)) {
                $image = time().'.'. request()->image->getClientOriginalExtension();
                request()->image->move(public_path('public/images'), $image);
                $path = 'public/images/';
                $data['image'] = $path . $image;
            }
            Offer::create($data);
            return redirect()->route('offers.offer.index')
                ->with('message', 'Offer was successfully added.');
        } catch (Exception $exception) {


            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
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
        $offer = Offer::with('creator', 'updater', 'deletedby')->findOrFail($id);

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

        return view('offers.edit', compact('offer'));
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

         
            $data['updated_by'] = Auth::user()->id;

            $offer = Offer::findOrFail($id);
            $data['status'] = $request->status;
            $data['label'] = $request->label;
            $data['description'] = $request->description;

            if (!empty($request->image)) {
                $image = time() . '.' . request()->image->getClientOriginalExtension();

                request()->image->move(public_path('public/images'), $image);
                $path = 'public/images/';
                $data['image'] = $path . $image;
            }
            $offer->update($data);

            return redirect()->route('offers.offer.index')
                ->with('message', 'Offer was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
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
            'label' => 'required|string|min:1|max:100',
            'description' => 'required|string|min:1|max:1000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ];


        $data = $request->validate($rules);




        return $data;
    }
}
