<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{

    public function index()
    {
        $chats = TelegraphChat::select(
            'telegraph_chats.id',
            'telegraph_chats.name',
            DB::raw('MAX(chat_messages.created_at) AS last_message_at')
        )
            ->leftJoin('chat_messages', 'telegraph_chats.id', '=', 'chat_messages.chat_id')
            ->groupBy('telegraph_chats.id')
            ->orderByDesc('last_message_at')
            ->paginate(15);
        return view('admin.chat.index', compact('chats'));
    }

    public function messages($chat_id)
    {
        $chat = TelegraphChat::findOrFail($chat_id);
        $messages = ChatMessage::where('chat_id', $chat_id)->get()->toArray();
        return view('admin.chat.messages', compact('chat', 'messages'));
    }
}
