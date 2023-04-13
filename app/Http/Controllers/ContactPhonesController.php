<?php

namespace App\Http\Controllers;

use App\Models\ContactPhone;
use Illuminate\Http\Request;

class ContactPhonesController extends Controller
{
    protected $contactPhone;

    public function __construct()
    {
        $this->contactPhone = app(ContactPhone::class);
    }

    public function contactPhoneRemove($contact_id, $id)
    {
        $this->contactPhone->contactPhoneRemove($id);
        return redirect('admin/contact/to/see/' . $contact_id);
    }

    public function addPhoneForContact(Request $request)
    {
        $this->contactPhone->addPhoneForContact($request);
        return redirect('admin/contact/to/see/' . $request->contact_id);
    }
}
