<?php

namespace App\Telegram;

use App\Http\Controllers\Admin\PromptController;
use App\Models\ChatMessage;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Stringable;
use OpenAI\Laravel\Facades\OpenAI;

class Handler extends WebhookHandler
{
    protected function handleChatMessage(Stringable $text): void
    {
        $chatId = $this->chat->id;

        $reply = $this->getOpenAiResponse($chatId, $text);

        $this->reply($reply);
    }
    private function getOpenAiResponse(int $userId, string $userMessage): string
    {
        ChatMessage::store($userId, 'user', $userMessage);

        $prompt = Storage::get(PromptController::PROMPT_TXT);
        $history = ChatMessage::getHistory($userId);

        $response = OpenAI::chat()->create([
            'model' => 'gpt-4o-mini',
            'messages' => [
                ['role' => 'user', 'content' => $prompt . json_encode($history, JSON_UNESCAPED_UNICODE) ?? '']
            ],
        ]);

        $assistantMessage = $response['choices'][0]['message']['content'];

        ChatMessage::store($userId, 'assistant', $assistantMessage); // Сохраняем ответ

        return $assistantMessage;
    }
}
