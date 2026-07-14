<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\MessageTemplate;
use App\Services\WhatsAppService;

class MessageController extends Controller
{
    public function send (Request $request, WhatsAppService $whatsapp) {
        
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'template_key' => 'required|exists:message_templates,key',
        ]);

        $customer = Customer::findOrFail($request->customer_id);
        $template = Messagetemplate::where('key', $request->template_key)->firstOrFail();

        $message = $template->render([
            'name' => $customer->name,
            'car' => $customer->car,
        ]);

        try {
            //cap at 5 message daily
            $whatsapp->send($customer->phone, $message);

            // For now, just log the message instead of sending it
            // \Log::info('Would send WhatsApp message', [
            //     'to' => $customer->phone,
            //     'message' => $message,
            // ]);


            return response()->json([
                'success' => true,
                'message' => "Message sent to {$customer->name}",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to send: ' . $e->getMessage(),
            ], 422);
        }




    }
}
