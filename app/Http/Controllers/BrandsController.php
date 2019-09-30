<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class BrandsController extends Controller
{

    /**
     * Display a listing of the brands.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $brands = Brand::paginate(1000);

        return view('brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new brand.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $creators = User::pluck('name','id')->all();
$updaters = User::pluck('name','id')->all();
        
        return view('brands.create', compact('creators','updaters'));
    }

    /**
     * Store a new brand in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            $data['created_by'] = Auth::user()->id;
            $default_image = time() . '.' . request()->default_image->getClientOriginalExtension();
          
            request()->default_image->move(public_path('public/default_image'), $default_image);
           $path = 'public/default_image/';
            $data['default_image'] = $path.$default_image;
            // die(print_r($data));
            Brand::create($data);

            return redirect()->route('brands.brand.index')
                ->with('message', 'Brand was successfully added.');
        } catch (Exception $exception) {
return $exception->getMessage();
            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified brand.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $brand = Brand::with('creator','updater')->findOrFail($id);

        return view('brands.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified brand.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        $creators = User::pluck('name','id')->all();
$updaters = User::pluck('name','id')->all();

        return view('brands.edit', compact('brand','creators','updaters'));
    }

    /**
     * Update the specified brand in the storage.
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
            $data['updated_by'] = Auth::user()->id;
            $default_image = time() . '.' . request()->default_image->getClientOriginalExtension();
          
            request()->default_image->move(public_path('public/default_image'), $default_image);
           $path = 'public/default_image/';
            $data['default_image'] = $path.$default_image;
         
            $brand = Brand::findOrFail($id);
            $brand->update($data);

            return redirect()->route('brands.brand.index')
                ->with('message', 'Brand was successfully updated.');
        } catch (Exception $exception) {
return $exception;
            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified brand from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $brand = Brand::findOrFail($id);
            $brand->delete();

            return redirect()->route('brands.brand.index')
                ->with('message', 'Brand was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
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
                'name' => 'required|string|min:1|max:100',
            'description' => 'required|string|min:1|max:1000',
            'default_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
