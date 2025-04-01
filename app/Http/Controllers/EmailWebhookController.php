<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailLog;
use Illuminate\Support\Facades\Log;

class EmailWebhookController extends Controller {
    public function handleWebhook(Request $request) {
        Log::info('Email Webhook Received:', $request->all());

        $event = $request->input('event');
        $recipient = $request->input('recipient'); // Email address

        if (!$recipient) {
            return response()->json(['error' => 'Invalid request'], 400);
        }

        // Update email status based on the event type
        $statusMap = [
            'delivered' => 'delivered',
            'opened' => 'opened',
            'bounced' => 'bounced',
        ];

        if (isset($statusMap[$event])) {
            EmailLog::updateOrCreate(
                ['email' => $recipient],
                ['status' => $statusMap[$event]]
            );
        }

        return response()->json(['status' => 'success']);
    }
}
