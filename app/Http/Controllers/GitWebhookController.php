<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendTestEmail;
use Illuminate\Support\Facades\Mail;

class GitWebhookController extends Controller
{
    public function handleGitWebhook(Request $request)
    {
        //test123
        // Verify webhook authenticity (Optional)
        // You may want to check headers or secret tokens to confirm the request is from Git

        $gitEvent = $request->header('X-GitHub-Event'); // Get the event type (e.g., push)
        
        // You can check the type of event (e.g., push, pull_request, etc.)
        if ($gitEvent == 'push') {
            $commitData = $request->json(); // Get the push event data

            // Prepare the email data (for example, commit info)
            $emailData = [
                'subject' => 'Git Push Event Triggered',
                'message' => 'A new commit was pushed to the repository.',
                'commit_data' => $commitData
            ];

            // Send the email
            Mail::to('rohitgundabala@gmail.com')->send(new SendTestEmail($emailData));

            return response()->json(['status' => 'Email Sent']);
        }

        return response()->json(['status' => 'Event type not handled']);
    }
}
