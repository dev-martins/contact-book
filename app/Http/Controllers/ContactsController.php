<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactsController extends Controller
{
    protected $contacts;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->contacts = app(Contact::class);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $contacts = $this->contacts->contactsByUser();
        return view('dashboard.contacts', compact('contacts'));
    }

    public function contactsToSee($id)
    {
        $contact = $this->contacts->contactsToSee($id);
        if ($contact->count() == 0)
            return redirect('admin/contacts');
        return view('dashboard.contact', compact('contact'));
    }

    public function contactsAdd(Request $request)
    {
        $this->contacts->contactsAdd($request);
        return redirect('admin/contacts');
    }

    public function contactsEdit(Request $request)
    {
        $this->contacts->contactsEdit($request);
        return redirect('admin/contact/to/see/' . $request->contact_id);
    }

    public function contactsRemove($id)
    {
        $this->contacts->contactsRemove($id);
        return redirect('admin/contacts');
    }
}
