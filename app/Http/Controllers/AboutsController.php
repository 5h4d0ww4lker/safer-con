<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\DeletedBy;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class AboutsController extends Controller
{

    /**
     * Display a listing of the abouts.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $abouts = About::paginate(25);

        return view('abouts.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new about.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $creators = User::pluck('name', 'id')->all();
        $updaters = User::pluck('name', 'id')->all();
        return view('abouts.create', compact('creators', 'updaters'));
    }

    /**
     * Store a new about in the storage.
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
            About::create($data);
            return redirect()->route('abouts.about.index')
                ->with('message', 'About was successfully added.');
        } catch (Exception $exception) {


            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified about.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $about = About::with('creator', 'updater', 'deletedby')->findOrFail($id);

        return view('abouts.show', compact('about'));
    }

    /**
     * Show the form for editing the specified about.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $about = About::findOrFail($id);

        return view('abouts.edit', compact('about'));
    }

    /**
     * Update the specified about in the storage.
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

            $about = About::findOrFail($id);
            $data['status'] = $request->status;
            $data['label'] = $request->label;

            if (!empty($request->image)) {
                $image = time() . '.' . request()->image->getClientOriginalExtension();

                request()->image->move(public_path('public/images'), $image);
                $path = 'public/images/';
                $data['image'] = $path . $image;
            }
            $about->update($data);

            return redirect()->route('abouts.about.index')
                ->with('message', 'About was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified about from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $about = About::findOrFail($id);
            $about->delete();

            return redirect()->route('abouts.about.index')
                ->with('success_message', 'About was successfully deleted.');
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
