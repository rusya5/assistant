<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use OpenAI\Laravel\Facades\OpenAI;

class AdminController extends Controller
{
    public function index()
    {

//        ChatMessage::store(1, 'user', 'asasjgas'); // Сохраняем сообщение пользователя
        $prompt = Storage::get(PromptController::PROMPT_TXT);
        $history = ChatMessage::getHistory(1); // Берем историю
        return $prompt . json_encode($history, JSON_UNESCAPED_UNICODE);
        Log::info(json_encode($history));
        $response = OpenAI::chat()->create([
            'model' => 'gpt-4o-mini',
            'messages' => [
                ['role' => 'user', 'content' => json_encode($history) ?? '']
            ],
        ]);

        $assistantMessage = $response['choices'][0]['message']['content'];

        ChatMessage::store($userId, 'assistant', $assistantMessage); // Сохраняем ответ

        return $assistantMessage;
        return view('admin.index');
    }
}
