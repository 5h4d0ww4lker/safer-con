<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{

    /**
     * Display a listing of the notifications.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $notifications = Notification::where('notify_to', $user_id)->orderBy('created_at', 'DESC')->paginate(25);
        foreach ($notifications as $notification) {
            $notification = Notification::find($notification->id);
            $data['status'] = "Seen";
            $notification->update($data);
        }

        return view('notifications.index', compact('notifications'));
    }

    /**
     * Show the form for creating a new notification.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('notifications.create');
    }

    /**
     * Store a new notification in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Notification::create($data);

            return redirect()->route('notifications.notification.index')
                ->with('success_message', 'Notification was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified notification.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $notification = Notification::findOrFail($id);

        return view('notifications.show', compact('notification'));
    }

    /**
     * Show the form for editing the specified notification.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $notification = Notification::findOrFail($id);


        return view('notifications.edit', compact('notification'));
    }

    /**
     * Update the specified notification in the storage.
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

            $notification = Notification::findOrFail($id);
            $notification->update($data);

            return redirect()->route('notifications.notification.index')
                ->with('success_message', 'Notification was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified notification from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $notification = Notification::findOrFail($id);
            $notification->delete();

            return redirect()->route('notifications.notification.index')
                ->with('success_message', 'Notification was successfully deleted.');
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
            'notify_to' => 'required|numeric|min:-2147483648|max:2147483647',
            'content' => 'required|string|min:1|max:1000',
            'status' => 'required|string|min:1|max:10',
        ];


        $data = $request->validate($rules);




        return $data;
    }
}
