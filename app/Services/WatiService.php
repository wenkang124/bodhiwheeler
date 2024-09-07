<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WatiService
{
    protected $apiToken;
    protected $apiBaseUrl;

    public function __construct()
    {
        $this->apiToken = env('WATI_API_TOKEN');
        $this->apiBaseUrl = env('WATI_API_BASE_URL');
    }

    public function sendTemplateMessage($phoneNumber, $templateName, $parameters = [])
    {
        $url = "{$this->apiBaseUrl}/api/v1/sendTemplateMessage?whatsappNumber={$phoneNumber}";

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiToken,
            ])->post($url, [
                'template_name' => $templateName,
                'broadcast_name' => 'Booking Confirmation',
                'parameters' => $parameters,
            ]);

            if ($response->failed()) {
                \Log::error('WATI API Error', [
                    'url' => $url,
                    'status' => $response->status(),
                    'response' => $response->body(),
                ]);
                return ['error' => 'Failed to send message.'];
            }

            return $response->json();
        } catch (\Exception $e) {
            \Log::error('WATI API Exception', [
                'url' => $url,
                'message' => $e->getMessage(),
            ]);

            return ['error' => 'An error occurred while sending the message.'];
        }
    }
}
