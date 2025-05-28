<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function sendMessage(Request $request) {

        $request->validate([
            'receiver_id' => 'required',
            'content' => 'required|string',
        ]);

        if(auth()->id()) {
            $sender_id = auth()->id();
        }
        else $sender_id = 1;

        $message = Message::create([
            'sender_id' => $sender_id,
            'receiver_id' => $request->input('receiver_id'),
            'content' => $request->input('content'),
            'is_reply' => false,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => $message,
            'sent_at' => $message->created_at->format('d/m/Y H:i'),
        ]);

        /*broadcast(new MessageSent($message))->toOthers();*/

    }

    public function getConversation($userId)
    {
        $currentUserId = auth()->id();

        $messages = Message::where(function ($query) use ($currentUserId, $userId) {
            $query->where('sender_id', $currentUserId)->where('receiver_id', $userId);
        })->orWhere(function ($query) use ($currentUserId, $userId) {
            $query->where('sender_id', $userId)->where('receiver_id', $currentUserId);
        })->orderBy('created_at')->get();

        return response()->json($messages);
    }

    public function index()
    {
        $messages = Message::whereNull('receiver_id')
                    ->orderByDesc('created_at')
                    ->with('sender')
                    ->get();

        return view('admin.messages.index', compact('messages'));
    }

    public function inboxJson()
    {
        return response()->json(Message::where('receiver_id', auth()->id())
            ->with('sender')
            ->orderBy('created_at', 'desc')
            ->get());
    }

    public function inbox()
    {
        $userId = auth()->id();

        $messages = Message::where('receiver_id', $userId)
            ->orderBy('created_at', 'desc')
            ->with('sender') // si tu veux le nom de l'expéditeur
            ->get();

        return view('messages.inbox', compact('messages'));
    }

    public function sent()
    {
        $userId = auth()->id();

        $messages = Message::where('sender_id', $userId)
            ->orderBy('created_at', 'desc')
            ->with('receiver')
            ->get();

        return view('messages.sent', compact('messages'));
    }

    public function reply(Request $request, Message $message)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        Message::create([
            'sender_id' => auth()->id(), // admin
            'receiver_id' => $message->sender_id,
            'content' => $request->input('content'),
            'is_reply' => true,
        ]);

        return back()->with('success', 'Réponse envoyée');
    }
}
