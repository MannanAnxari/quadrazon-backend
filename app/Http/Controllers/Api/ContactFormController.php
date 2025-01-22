<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use App\Http\Resources\ContactFormResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function index()
    {
        $contactForms = ContactForm::latest()->paginate(10);
        return ContactFormResource::collection($contactForms);
    }

    public function show(ContactForm $contactForm)
    {
        return new ContactFormResource($contactForm);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
            'source' => 'required|in:contact,consultation',
            'website' => 'nullable|url',
        ]);

        $contactForm = ContactForm::create($validatedData);

        Mail::to(['sales@quadrazon.com'])
            ->send(new \App\Mail\ContactFormCreated($validatedData));

        return new ContactFormResource($contactForm);
    }

    public function destroy(ContactForm $contactForm)
    {
        $contactForm->delete();
        return response()->json(null, 204);
    }
}
