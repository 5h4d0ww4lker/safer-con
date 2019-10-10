<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\HomeSlider;
use App\Models\DeletedBy;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class HomeSlidersController extends Controller
{

    /**
     * Display a listing of the homeSliders.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $homeSliders = HomeSlider::paginate(25);

        return view('home_sliders.index', compact('homeSliders'));
    }

    /**
     * Show the form for creating a new homeSlider.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $creators = User::pluck('name', 'id')->all();
        $updaters = User::pluck('name', 'id')->all();
        return view('home_sliders.create', compact('creators', 'updaters'));
    }

    /**
     * Store a new homeSlider in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data['label'] = $request->label;
            $data['header'] = $request->header;
            $data['description'] = $request->description;
            $data['status'] = $request->status;
            $data['created_by'] = Auth::user()->id;
            if (!empty($request->image)) {
                $image = time().'.'. request()->image->getClientOriginalExtension();
                request()->image->move(public_path('public/images'), $image);
                $path = 'public/images/';
                $data['image'] = $path . $image;
            }
            HomeSlider::create($data);
            return redirect()->route('home_sliders.home_slider.index')
                ->with('message', 'HomeSlider was successfully added.');
        } catch (Exception $exception) {

dd($exception->getMessage());
            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified homeSlider.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $homeSlider = HomeSlider::with('creator', 'updater', 'deletedby')->findOrFail($id);

        return view('homeSliders.show', compact('homeSlider'));
    }

    /**
     * Show the form for editing the specified homeSlider.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $homeSlider = HomeSlider::findOrFail($id);

        return view('home_sliders.edit', compact('homeSlider'));
    }

    /**
     * Update the specified homeSlider in the storage.
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

            $homeSlider = HomeSlider::findOrFail($id);
            $data['status'] = $request->status;
            $data['label'] = $request->label;
            $data['header'] = $request->header;

            if (!empty($request->image)) {
                $image = time() . '.' . request()->image->getClientOriginalExtension();

                request()->image->move(public_path('public/images'), $image);
                $path = 'public/images/';
                $data['image'] = $path . $image;
            }
            $homeSlider->update($data);

            return redirect()->route('home_sliders.home_slider.index')
                ->with('message', 'HomeSlider was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified homeSlider from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $homeSlider = HomeSlider::findOrFail($id);
            $homeSlider->delete();

            return redirect()->route('homeSliders.homeSlider.index')
                ->with('success_message', 'HomeSlider was successfully deleted.');
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
