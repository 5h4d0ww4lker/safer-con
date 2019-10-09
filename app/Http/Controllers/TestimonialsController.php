<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DeletedBy;
use App\Models\Testimonial;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class TestimonialsController extends Controller
{

    /**
     * Display a listing of the testimonials.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $testimonials = Testimonial::paginate(25);

        return view('testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new testimonial.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $creators = User::pluck('name','id')->all();
$updaters = User::pluck('name','id')->all();
$deletedBies = DeletedBy::pluck('id','id')->all();
        
        return view('testimonials.create', compact('creators','updaters','deletedBies'));
    }

    /**
     * Store a new testimonial in the storage.
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
            Testimonial::create($data);

            return redirect()->route('testimonials.testimonial.index')
                ->with('success_message', 'Testimonial was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified testimonial.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $testimonial = Testimonial::with('creator','updater','deletedby')->findOrFail($id);

        return view('testimonials.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified testimonial.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $creators = User::pluck('name','id')->all();
$updaters = User::pluck('name','id')->all();
$deletedBies = DeletedBy::pluck('id','id')->all();

        return view('testimonials.edit', compact('testimonial','creators','updaters','deletedBies'));
    }

    /**
     * Update the specified testimonial in the storage.
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
            $testimonial = Testimonial::findOrFail($id);
            $testimonial->update($data);

            return redirect()->route('testimonials.testimonial.index')
                ->with('success_message', 'Testimonial was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified testimonial from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $testimonial = Testimonial::findOrFail($id);
            $testimonial->delete();

            return redirect()->route('testimonials.testimonial.index')
                ->with('success_message', 'Testimonial was successfully deleted.');
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
