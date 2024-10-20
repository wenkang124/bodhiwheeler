<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OnsendService
{
    protected $apiToken;
    protected $apiBaseUrl;

    public function __construct()
    {
        $this->apiToken = env('ONSEND_API_TOKEN');
        $this->apiBaseUrl = env('ONSEND_API_BASE_URL');
    }

    public function sendWhatsAppMessage($phoneNumber, $messageContent, $bookingDetails = [])
    {
        $url = "{$this->apiBaseUrl}/api/v1/send";

        try {
            $data = [
                'phone_number' => $phoneNumber,
                'message' => $messageContent,
                'booking_details' => $bookingDetails,
            ];

            $response = Http::accept('application/json')
                ->withToken($this->apiToken)
                ->post($url, $data);

            if ($response->failed()) {
                \Log::error('Onsend API Error', [
                    'url' => $url,
                    'status' => $response->status(),
                    'response' => $response->body(),
                ]);
                return ['error' => 'Failed to send message.'];
            }

            return $response->json();
        } catch (\Exception $e) {
            \Log::error('Onsend API Exception', [
                'url' => $url,
                'message' => $e->getMessage(),
            ]);

            return ['error' => 'An error occurred while sending the message.'];
        }
    }
}
