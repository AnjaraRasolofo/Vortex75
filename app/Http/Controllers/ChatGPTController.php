<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatGPTController extends Controller
{
    public function index()
    {
        return view('chat');
    }

    public function ask(Request $request)
    {
        $question = $request->input('message');

        

        $response = Http::withToken(env('OPENAI_API_KEY'))->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-4o',
            'messages' => [
                ['role' => 'system', 'content' => $question],
            ],
        ]);

        //dd($response->json());

        $answer = $response->json()['choices'][0]['message']['content'] ?? "Erreur de réponse.";

        return view('chat', ['response' => $answer]);
    }
}
