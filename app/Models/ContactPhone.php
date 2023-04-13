<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPhone extends Model
{
    use HasFactory;

    protected $fillable = ['contact_id', 'phone'];

    public function contactPhoneRemove($id)
    {
        return $this
            ->where('id', $id)
            ->delete();
    }

    public function addPhoneForContact($request)
    {
        foreach ($request->phone as $value) {
            $this->create(['contact_id' => $request->contact_id, 'phone' => $value]);
        }
    }
}
