<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    public function index()
    {
        $contactForms = ContactForm::latest()->paginate(10);
        return view('admin.contact-forms.index', compact('contactForms'));
    }

    public function show(ContactForm $contactForm)
    {
        return view('admin.contact-forms.show', compact('contactForm'));
    }

    public function destroy(ContactForm $contactForm)
    {
        $contactForm->delete();
        return redirect()->route('admin.contact-forms.index')
            ->with('success', 'Contact form entry deleted successfully.');
    }
}