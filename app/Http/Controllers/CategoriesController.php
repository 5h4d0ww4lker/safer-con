<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PayRate;
use App\Models\Tax;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class CategoriesController extends Controller
{

    /**
     * Display a listing of the categories.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::paginate(1000);
       // die(print_r($categories));
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $creators = User::pluck('name', 'id')->all();
        $updaters = User::pluck('name', 'id')->all();
        $pay_rates = PayRate::pluck('name', 'id')->all();
        $taxes = Tax::pluck('name', 'id')->all();

        return view('categories.create', compact('creators', 'updaters', 'pay_rates', 'taxes'));
    }

    /**
     * Store a new category in the storage.
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
            $data['pay_rate'] = request()->pay_rate;
            $default_image = time() . '.' . request()->default_image->getClientOriginalExtension();

            request()->default_image->move(public_path('public/default_image'), $default_image);
            $path = 'public/default_image/';
            $data['default_image'] = $path . $default_image;

            Category::create($data);

            return redirect()->route('categories.category.index')
                ->with('message', 'Category was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified category.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $category = Category::with('creator', 'updater')->findOrFail($id);

        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $creators = User::pluck('name', 'id')->all();
        $updaters = User::pluck('name', 'id')->all();
        $pay_rates = PayRate::pluck('name', 'id')->all();
        $taxes = Tax::pluck('name', 'id')->all();
        return view('categories.edit', compact('category', 'creators', 'updaters', 'pay_rates', 'taxes'));
    }

    /**
     * Update the specified category in the storage.
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
            $data['pay_rate'] = request()->pay_rate;
            $default_image = time() . '.' . request()->default_image->getClientOriginalExtension();

            request()->default_image->move(public_path('public/default_image'), $default_image);
            $path = 'public/default_image/';
            $data['default_image'] = $path . $default_image;
            $category = Category::findOrFail($id);
            $category->update($data);

            return redirect()->route('categories.category.index')
                ->with('message', 'Category was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['exception' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified category from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();

            return redirect()->route('categories.category.index')
                ->with('message', 'Category was successfully deleted.');
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
            'name' => 'required|string|min:1|max:50',

            'default_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',


        ];


        $data = $request->validate($rules);



        return $data;
    }
}
