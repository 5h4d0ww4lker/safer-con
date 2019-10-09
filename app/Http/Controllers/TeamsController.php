<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DeletedBy;
use App\Models\Team;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class TeamsController extends Controller
{

    /**
     * Display a listing of the teams.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $teams = Team::paginate(25);

        return view('teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new team.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $creators = User::pluck('name','id')->all();
$updaters = User::pluck('name','id')->all();
$deletedBies = DeletedBy::pluck('id','id')->all();
        
        return view('teams.create', compact('creators','updaters','deletedBies'));
    }

    /**
     * Store a new team in the storage.
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
            Team::create($data);

            return redirect()->route('teams.team.index')
                ->with('success_message', 'Team was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified team.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $team = Team::with('creator','updater','deletedby')->findOrFail($id);

        return view('teams.show', compact('team'));
    }

    /**
     * Show the form for editing the specified team.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $team = Team::findOrFail($id);
        $creators = User::pluck('name','id')->all();
$updaters = User::pluck('name','id')->all();
$deletedBies = DeletedBy::pluck('id','id')->all();

        return view('teams.edit', compact('team','creators','updaters','deletedBies'));
    }

    /**
     * Update the specified team in the storage.
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
            $team = Team::findOrFail($id);
            $team->update($data);

            return redirect()->route('teams.team.index')
                ->with('success_message', 'Team was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified team from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $team = Team::findOrFail($id);
            $team->delete();

            return redirect()->route('teams.team.index')
                ->with('success_message', 'Team was successfully deleted.');
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
