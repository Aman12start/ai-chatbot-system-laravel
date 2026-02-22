<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    /**
     * Show chat page
     */
    public function index()
    {
        return view('chat.index');
    }

    /**
     * Handle chat message and send to Gemini
     */
   public function send(Request $request)
{
    try {

        $request->validate([
            'message' => 'required|string'
        ]);

        $apiKey = env('GEMINI_API_KEY');

        if (!$apiKey) {
            return response()->json([
                'reply' => 'Error: Gemini API key not found'
            ]);
        }

        $userName = auth()->user()->name ?? 'User';

        // 🔥 SYSTEM RULES
        $systemPrompt = "
                You are InfiCode AI assistant.

                Rules:
                1. Always greet user politely.
                2. If user says 'hi' or 'hello', respond:
                'Namaste {$userName}, Welcome to InfiCode 🙏'
                3. If someone asks who made you, say:
                'Please contact Aman for more information.'
                4. Never mention Google, Gemini, API, backend, or data sources.
                5. If someone asks about internal system, say:
                'I cannot disclose that information.'
                6. If someone asks to generate image, say:
                'I currently cannot generate images.'
                7. Format answers neatly.
                8. If using bullet points, use:
                - Point one
                - Point two
                9. Be professional and clean in formatting.
                10. Can generate images also when someone ask for but limit is 3 images.
                11. Handle rude or over-smart users calmly and politely.
                ";

        $finalPrompt = $systemPrompt . "\nUser: " . $request->message;

        $url = "https://generativelanguage.googleapis.com/v1/models/gemini-2.5-flash:generateContent?key=".$apiKey;

        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post($url, [
            "contents" => [
                [
                    "parts" => [
                        [
                            "text" => $finalPrompt
                        ]
                    ]
                ]
            ]
        ]);

        if (!$response->successful()) {
            return response()->json([
                'reply' => 'Error: API request failed'
            ]);
        }

        $result = $response->json();

        $reply = $result['candidates'][0]['content']['parts'][0]['text']
            ?? "No response received";

        return response()->json([
            'reply' => nl2br($reply) 
        ]);

    } catch (\Exception $e) {

        return response()->json([
            'reply' => 'Server error: '.$e->getMessage()
        ]);
    }
}
}