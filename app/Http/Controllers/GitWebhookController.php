<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CodePushMail;
use Illuminate\Support\Facades\Log;

class GitWebhookController extends Controller
{
    public function handlePush(Request $request)
    {
        //test
        // Validate GitHub webhook signature (optional but recommended for security)
        $this->validateGitHubSignature($request);

        // Handle the push event
        $payload = $request->all();
        
        // You can log the payload for debugging
        Log::info('GitHub Webhook Payload:', $payload);

        // Send the email after a push event
        $commitMessage = $payload['head_commit']['message'];
        $authorName = $payload['pusher']['name'];
        $emailContent = "New code pushed by {$authorName}. Commit Message: {$commitMessage}";

        // Send the email (assuming you have configured your mail settings)
        Mail::to('rohitgundabala@gmail.com')->send(new CodePushMail($emailContent));

        return response()->json(['message' => 'Webhook handled successfully']);
    }

    // Optionally validate GitHub signature for security
    private function validateGitHubSignature(Request $request)
    {
        $signature = $request->header('X-Hub-Signature');
        // Compare the signature with the expected signature (ensure secure webhook validation)
        // If it doesn't match, throw an exception or return a 403 response
    }
}
