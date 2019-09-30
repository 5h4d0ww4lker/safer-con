<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;

class ReviewsController extends Controller
{

    /**
     * Display a listing of the reviews.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->get();
       
        $access_label = $user['0']['access_label'];
        
        if($access_label == 1){
        $reviews = Review::with('user','item')->paginate(25);
        }
       else {
            $reviews = Review::with('user','item')->where('merchant_id', $user_id)->paginate(25);
        }

        return view('reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new review.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $users = User::pluck('id','id')->all();
$items = Item::pluck('name','id')->all();
        
        return view('reviews.create', compact('users','items'));
    }

    /**
     * Store a new review in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Review::create($data);

            return redirect()->route('reviews.review.index')
                ->with('success_message', 'Review was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified review.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $review = Review::with('user','item')->findOrFail($id);

        return view('reviews.show', compact('review'));
    }

    /**
     * Show the form for editing the specified review.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $review = Review::findOrFail($id);
        $users = User::pluck('id','id')->all();
$items = Item::pluck('name','id')->all();

        return view('reviews.edit', compact('review','users','items'));
    }

    /**
     * Update the specified review in the storage.
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
            
            $review = Review::findOrFail($id);
            $review->update($data);

            return redirect()->route('reviews.review.index')
                ->with('success_message', 'Review was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified review from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $review = Review::findOrFail($id);
            $review->delete();

            return redirect()->route('reviews.review.index')
                ->with('success_message', 'Review was successfully deleted.');
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
            'description' => 'required|string|min:1|max:1000', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
