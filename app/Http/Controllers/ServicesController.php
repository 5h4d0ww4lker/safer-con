<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\DeletedBy;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class ServicesController extends Controller
{

    /**
     * Display a listing of the services.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $services = Service::paginate(1000);

        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new service.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $creators = User::pluck('name', 'id')->all();
        $updaters = User::pluck('name', 'id')->all();
        return view('services.create', compact('creators', 'updaters'));
    }

    /**
     * Store a new service in the storage.
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
            Service::create($data);
            return redirect()->route('services.service.index')
                ->with('message', 'Service was successfully added.');
        } catch (Exception $exception) {


            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified service.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $service = Service::with('creator', 'updater', 'deletedby')->findOrFail($id);

        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified service.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);

        return view('services.edit', compact('service'));
    }

    /**
     * Update the specified service in the storage.
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

            $service = Service::findOrFail($id);
            $data['status'] = $request->status;
            $data['label'] = $request->label;

            if (!empty($request->image)) {
                $image = time() . '.' . request()->image->getClientOriginalExtension();

                request()->image->move(public_path('public/images'), $image);
                $path = 'public/images/';
                $data['image'] = $path . $image;
            }
            $service->update($data);

            return redirect()->route('services.service.index')
                ->with('message', 'Service was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified service from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $service = Service::findOrFail($id);
            $service->delete();

            return redirect()->route('services.service.index')
                ->with('success_message', 'Service was successfully deleted.');
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
