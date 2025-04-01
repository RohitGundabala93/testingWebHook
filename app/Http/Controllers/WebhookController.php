<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendTestEmail;
use Illuminate\Support\Facades\Mail;

class WebhookController extends Controller
{
    public function handleEmailWebhook(Request $request)
    {
        // Example webhook data processing
        $data = $request->all();

        // You can filter or process the webhook data as needed
        $emailData = [
            'subject' => 'Webhook Triggered Email',
            'message' => 'This is an email triggered by a webhook event.',
            'webhook_data' => $data
        ];

        // Send the email using the SendTestEmail mailable
        Mail::to('recipient@example.com')->send(new SendTestEmail($emailData));

        // Return a success response
        return response()->json(['status' => 'Email Sent']);
    }
}
