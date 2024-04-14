<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    // store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'message' => 'nullable|string',
        ]);

        $contact = Contact::create($request->all());

        return response()->json(['status' => 'success', 'message' => 'تم ارسال الرسالة بنجاح', 'data' => $contact], 200);
    }
}
