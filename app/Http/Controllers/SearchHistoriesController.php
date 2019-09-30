<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SearchHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;

class SearchHistoriesController extends Controller
{

    /**
     * Display a listing of the search histories.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $searchHistories = SearchHistory::with('user')->paginate(25);

        return view('search_histories.index', compact('searchHistories'));
    }

    /**
     * Show the form for creating a new search history.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $users = User::pluck('id','id')->all();
        
        return view('search_histories.create', compact('users'));
    }

    /**
     * Store a new search history in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            SearchHistory::create($data);

            return redirect()->route('search_histories.search_history.index')
                ->with('success_message', 'Search History was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified search history.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $searchHistory = SearchHistory::with('user')->findOrFail($id);

        return view('search_histories.show', compact('searchHistory'));
    }

    /**
     * Show the form for editing the specified search history.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $searchHistory = SearchHistory::findOrFail($id);
        $users = User::pluck('id','id')->all();

        return view('search_histories.edit', compact('searchHistory','users'));
    }

    /**
     * Update the specified search history in the storage.
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
            
            $searchHistory = SearchHistory::findOrFail($id);
            $searchHistory->update($data);

            return redirect()->route('search_histories.search_history.index')
                ->with('success_message', 'Search History was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified search history from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $searchHistory = SearchHistory::findOrFail($id);
            $searchHistory->delete();

            return redirect()->route('search_histories.search_history.index')
                ->with('success_message', 'Search History was successfully deleted.');
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
            'search_string' => 'required|numeric|min:-2147483648|max:2147483647', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
