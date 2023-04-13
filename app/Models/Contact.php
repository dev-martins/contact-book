<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'cpf', 'user_id'];

    public function contactsByUser()
    {
        return $this->select('id', 'name', 'cpf')
            ->where('user_id', Auth::user()->id)
            ->get();
    }

    public function contactsToSee($id)
    {
        return $this->select('contacts.id', 'cp.id as phone_id', 'name', 'cpf', 'phone')
            ->leftJoin('contact_phones as cp', 'cp.contact_id', '=', 'contacts.id')
            ->where('contact_id', $id)
            ->get();
    }

    public function contactsEdit($request)
    {
        $data = $request->only('name', 'cpf');
        $this->where('id', $request->contact_id)->update($data);

        foreach ($request->phone as $value) {
            ContactPhone::where('contact_id', $request->contact_id)->update(
                ['phone' => $value]
            );
        }
    }

    public function contactsRemove($id)
    {
        return $this
            ->where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->delete();
    }

    public function contactsAdd($request)
    {
        if (isset($request->contact_id)) {
            foreach ($request->phone as $value) {
                ContactPhone::create(['contact_id' => $request->contact_id, 'phone' => $value]);
            }
        } else {
            $data = $request->only('name', 'cpf');
            $data['user_id'] = Auth::user()->id;
            $contact =  $this->insertGetId($data);
            foreach ($request->phone as $value) {
                ContactPhone::create(['contact_id' => $contact, 'phone' => $value]);
            }
        }
    }
}
