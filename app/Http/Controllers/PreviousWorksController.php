<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PreviousWork;
use App\Models\DeletedBy;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class PreviousWorksController extends Controller
{

    /**
     * Display a listing of the previous_works.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $previousWorks = PreviousWork::paginate(1000);

        return view('previous_works.index', compact('previousWorks'));
    }

    /**
     * Show the form for creating a new previous_work.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $creators = User::pluck('name', 'id')->all();
        $updaters = User::pluck('name', 'id')->all();
        return view('previous_works.create', compact('creators', 'updaters'));
    }

    /**
     * Store a new previousWork in the storage.
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
            PreviousWork::create($data);
            return redirect()->route('previous_works.previous_work.index')
                ->with('message', 'PreviousWork was successfully added.');
        } catch (Exception $exception) {


            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified previous_work.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $previousWork = PreviousWork::with('creator', 'updater', 'deletedby')->findOrFail($id);

        return view('previous_works.show', compact('previousWork'));
    }

    /**
     * Show the form for editing the specified previous_work.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $previousWork = PreviousWork::findOrFail($id);

        return view('previous_works.edit', compact('previousWork'));
    }

    /**
     * Update the specified previousWork in the storage.
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

            $previousWork = PreviousWork::findOrFail($id);
            $data['status'] = $request->status;
            $data['label'] = $request->label;

            if (!empty($request->image)) {
                $image = time() . '.' . request()->image->getClientOriginalExtension();

                request()->image->move(public_path('public/images'), $image);
                $path = 'public/images/';
                $data['image'] = $path . $image;
            }
            $previousWork->update($data);

            return redirect()->route('previous_works.previous_work.index')
                ->with('message', 'PreviousWork was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified previousWork from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $previousWork = PreviousWork::findOrFail($id);
            $previousWork->delete();

            return redirect()->route('previous_works.previous_work.index')
                ->with('success_message', 'PreviousWork was successfully deleted.');
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
