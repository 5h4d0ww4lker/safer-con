<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;

class RatingsController extends Controller
{

    /**
     * Display a listing of the ratings.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $ratings = Rating::with('user','item')->paginate(25);

        return view('ratings.index', compact('ratings'));
    }

    /**
     * Show the form for creating a new rating.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $users = User::pluck('id','id')->all();
$items = Item::pluck('name','id')->all();
        
        return view('ratings.create', compact('users','items'));
    }

    /**
     * Store a new rating in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Rating::create($data);

            return redirect()->route('ratings.rating.index')
                ->with('success_message', 'Rating was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified rating.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $rating = Rating::with('user','item')->findOrFail($id);

        return view('ratings.show', compact('rating'));
    }

    /**
     * Show the form for editing the specified rating.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $rating = Rating::findOrFail($id);
        $users = User::pluck('id','id')->all();
$items = Item::pluck('name','id')->all();

        return view('ratings.edit', compact('rating','users','items'));
    }

    /**
     * Update the specified rating in the storage.
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
            
            $rating = Rating::findOrFail($id);
            $rating->update($data);

            return redirect()->route('ratings.rating.index')
                ->with('success_message', 'Rating was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified rating from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $rating = Rating::findOrFail($id);
            $rating->delete();

            return redirect()->route('ratings.rating.index')
                ->with('success_message', 'Rating was successfully deleted.');
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
            'item_id' => 'required',
            'rate' => 'required|numeric|min:-2147483648|max:2147483647', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
