<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\DeletedBy;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class GalleriesController extends Controller
{

    /**
     * Display a listing of the galleries.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $galleries = Gallery::paginate(25);

        return view('galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new gallery.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $creators = User::pluck('name', 'id')->all();
        $updaters = User::pluck('name', 'id')->all();
        return view('galleries.create', compact('creators', 'updaters'));
    }

    /**
     * Store a new gallery in the storage.
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
            Gallery::create($data);
            return redirect()->route('galleries.gallery.index')
                ->with('message', 'Gallery was successfully added.');
        } catch (Exception $exception) {


            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified gallery.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $gallery = Gallery::with('creator', 'updater', 'deletedby')->findOrFail($id);

        return view('galleries.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified gallery.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);

        return view('galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified gallery in the storage.
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

            $gallery = Gallery::findOrFail($id);
            $data['status'] = $request->status;
            $data['label'] = $request->label;

            if (!empty($request->image)) {
                $image = time() . '.' . request()->image->getClientOriginalExtension();

                request()->image->move(public_path('public/images'), $image);
                $path = 'public/images/';
                $data['image'] = $path . $image;
            }
            $gallery->update($data);

            return redirect()->route('galleries.gallery.index')
                ->with('message', 'Gallery was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified gallery from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $gallery = Gallery::findOrFail($id);
            $gallery->delete();

            return redirect()->route('galleries.gallery.index')
                ->with('success_message', 'Gallery was successfully deleted.');
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
