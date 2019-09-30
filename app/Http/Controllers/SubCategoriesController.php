<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class SubCategoriesController extends Controller
{

    /**
     * Display a listing of the sub categories.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $subCategories = SubCategory::with('category')->paginate(1000);

        return view('sub_categories.index', compact('subCategories'));
    }

    /**
     * Show the form for creating a new sub category.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::pluck('name','id')->all();
$creators = User::pluck('name','id')->all();
$updaters = User::pluck('name','id')->all();
        
        return view('sub_categories.create', compact('categories','creators','updaters'));
    }

    /**
     * Store a new sub category in the storage.
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
            
            SubCategory::create($data);

            return redirect()->route('sub_categories.sub_category.index')
                ->with('message', 'Sub Category was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified sub category.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $subCategory = SubCategory::with('category','creator','updater')->findOrFail($id);

        return view('sub_categories.show', compact('subCategory'));
    }

    /**
     * Show the form for editing the specified sub category.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $categories = Category::pluck('name','id')->all();
$creators = User::pluck('name','id')->all();
$updaters = User::pluck('name','id')->all();

        return view('sub_categories.edit', compact('subCategory','categories','creators','updaters'));
    }

    /**
     * Update the specified sub category in the storage.
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
            $subCategory = SubCategory::findOrFail($id);
            $subCategory->update($data);

            return redirect()->route('sub_categories.sub_category.index')
                ->with('message', 'Sub Category was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified sub category from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $subCategory = SubCategory::findOrFail($id);
            $subCategory->delete();

            return redirect()->route('sub_categories.sub_category.index')
                ->with('message', 'Sub Category was successfully deleted.');
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
                'category_id' => 'required',
            'name' => 'required|string|min:1|max:200',
            'default_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
