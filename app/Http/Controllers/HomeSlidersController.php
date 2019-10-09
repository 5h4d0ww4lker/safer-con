<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DeletedBy;
use App\Models\HomeSlider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class HomeSlidersController extends Controller
{

    /**
     * Display a listing of the home sliders.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $homeSliders = HomeSlider::paginate(25);

        return view('home_sliders.index', compact('homeSliders'));
    }

    /**
     * Show the form for creating a new home slider.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $creators = User::pluck('name','id')->all();
$updaters = User::pluck('name','id')->all();
$deletedBies = DeletedBy::pluck('id','id')->all();
        
        return view('home_sliders.create', compact('creators','updaters','deletedBies'));
    }

    /**
     * Store a new home slider in the storage.
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
            HomeSlider::create($data);

            return redirect()->route('home_sliders.home_slider.index')
                ->with('success_message', 'Home Slider was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified home slider.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $homeSlider = HomeSlider::with('creator','updater','deletedby')->findOrFail($id);

        return view('home_sliders.show', compact('homeSlider'));
    }

    /**
     * Show the form for editing the specified home slider.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $homeSlider = HomeSlider::findOrFail($id);
        $creators = User::pluck('name','id')->all();
$updaters = User::pluck('name','id')->all();
$deletedBies = DeletedBy::pluck('id','id')->all();

        return view('home_sliders.edit', compact('homeSlider','creators','updaters','deletedBies'));
    }

    /**
     * Update the specified home slider in the storage.
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
            $homeSlider = HomeSlider::findOrFail($id);
            $homeSlider->update($data);

            return redirect()->route('home_sliders.home_slider.index')
                ->with('success_message', 'Home Slider was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified home slider from the storage.
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

            return redirect()->route('home_sliders.home_slider.index')
                ->with('success_message', 'Home Slider was successfully deleted.');
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
                'label' => 'required|numeric|min:-2147483648|max:2147483647',
            'header' => 'required|string|min:1|max:100',
            'description' => 'required|string|min:1|max:1000',
            'file_path' => 'required|string|min:1|max:255',
            'status' => 'required|string|min:1|max:10',
            'created_by' => 'required',
            'updated_by' => 'nullable',
            'deleted_by' => 'nullable', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
