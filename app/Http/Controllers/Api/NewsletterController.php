<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use App\Http\Resources\NewsletterResource;
use Illuminate\Http\Request;
use App\Mail\UserThankYouEmail;
use App\Mail\AdminNotificationEmail;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function index()
    {
        $newsletters = Newsletter::latest()->paginate(10);
        return NewsletterResource::collection($newsletters);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|unique:newsletters,email'
        ]);

        $newsletter = Newsletter::create($validatedData);

        Mail::to($newsletter->email)->send(new UserThankYouEmail($newsletter));

        $adminEmail = env('ADMIN_EMAIL');
        if ($adminEmail) {
            Mail::to($adminEmail)->send(new AdminNotificationEmail($newsletter));
        }

        return new NewsletterResource($newsletter);
    }

    public function destroy(Newsletter $newsletter)
    {
        $newsletter->delete();
        return response()->json(null, 204);
    }
}
