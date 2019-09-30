<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Exception;

class ContactsController extends Controller
{

    /**
     * Display a listing of the contacts.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'DESC')->paginate(25);

        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new contact.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('contacts.create');
    }

    /**
     * Store a new contact in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Contact::create($data);

            toast()->success('Your feedbacl has been recieved successfully. Thanks!');

            return redirect('/contact');
        } catch (Exception $exception) {

            toast()->error('Sorry, we can not recieve your messeage right now.');

            return redirect('/contact');
        }
    }

    /**
     * Display the specified contact.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $contact = Contact::findOrFail($id);

        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified contact.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);


        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified contact in the storage.
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

            $contact = Contact::findOrFail($id);
            $contact->update($data);

            return redirect()->route('contacts.contact.index')
                ->with('success_message', 'Contact was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified contact from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $contact = Contact::findOrFail($id);
            $contact->delete();

            return redirect()->route('contacts.contact.index')
                ->with('success_message', 'Contact was successfully deleted.');
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
            'name' => 'required|string|min:1|max:100',
            'email' => 'required|string|min:1|max:100',
            'website' => 'nullable|string|min:0|max:100',
            'content' => 'required|string|min:1|max:10000',
        ];


        $data = $request->validate($rules);




        return $data;
    }
}
