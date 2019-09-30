<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LandingPage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;


class LandingPagesController extends Controller
{

    /**
     * Display a listing of the landing pages.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $landingPages = LandingPage::paginate(25);

        return view('landing_pages.index', compact('landingPages'));
    }

    /**
     * Show the form for creating a new landing page.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('landing_pages.create', compact('creators', 'updaters', 'deletedBies'));
    }

    /**
     * Store a new landing page in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);
            $data['created_by'] =  Auth::user()->id;

            if (!empty($data['file'])) {
                $file = time() . '.' . request()->file->getClientOriginalExtension();

                request()->file->move(public_path('public/landing_pages'), $file);
                $path = 'public/landing_pages/';
                $data['file'] = $path . $file;
            }
            LandingPage::create($data);

            return redirect()->route('landing_pages.landing_page.index')
                ->with('success_message', 'Landing Page was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified landing page.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $landingPage = LandingPage::with('creator', 'updater', 'deletedby')->findOrFail($id);

        return view('landing_pages.show', compact('landingPage'));
    }

    /**
     * Show the form for editing the specified landing page.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $landingPage = LandingPage::findOrFail($id);
        return view('landing_pages.edit', compact('landingPage', 'creators', 'updaters', 'deletedBies'));
    }

    /**
     * Update the specified landing page in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {

            $data['title'] = $request->title;
            $data['content'] = $request->content;
            $data['heading'] = $request->heading;
            $data['updated_by'] = Auth::user()->id;
            if (!empty($request->file)) {
                $file = time() . '.' . request()->file->getClientOriginalExtension();

                request()->file->move(public_path('public/landing_pages'), $file);
                $path = 'public/landing_pages/';
                $data['file'] = $path . $file;
            }
            $landingPage = LandingPage::findOrFail($id);
            $landingPage->update($data);

            return redirect()->route('landing_pages.landing_page.index')
                ->with('success_message', 'Landing Page was successfully updated.');
        } catch (Exception $exception) {

            dd($exception->getMessage());
            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified landing page from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $landingPage = LandingPage::findOrFail($id);
            $landingPage->delete();

            return redirect()->route('landing_pages.landing_page.index')
                ->with('success_message', 'Landing Page was successfully deleted.');
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
            'title' => 'nullable|string|min:1|max:100',
            'heading' => 'nullable|string|min:1|max:1000',
            'content' => 'nullable|string|min:1|max:10000',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ];


        $data = $request->validate($rules);




        return $data;
    }
}
