<?php

namespace App\Telegram;

use App\Http\Controllers\Admin\PromptController;
use App\Models\ChatMessage;
use App\Models\EquipmentsService;
use App\Models\EventType;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use Illuminate\Support\Facades\Log;
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
    public static function getOpenAiResponse(int $chatId, string $userMessage): string
    {
        ChatMessage::store($chatId, 'user', $userMessage);

        $prompt = Storage::get(PromptController::PROMPT_TXT);
        $messages = ChatMessage::getHistory($chatId);
        $equipmentServices = EquipmentsService::getFormattedData();
        $eventTypes = EventType::get()->toArray();
        $content = $prompt
            . "\n eventTypes:". json_encode($eventTypes, JSON_UNESCAPED_UNICODE)
            . "\n equipmentServices:" . json_encode($equipmentServices, JSON_UNESCAPED_UNICODE)
            . "\n messages:". json_encode($messages, JSON_UNESCAPED_UNICODE);

        $response = OpenAI::chat()->create([
            'model' => 'gpt-4o-mini',
            'messages' => [
                ['role' => 'user', 'content' => $content]
            ],
        ]);

        $assistantMessage = json_decode(preg_replace('/^```json\s*|\s*```$/', '', $response['choices'][0]['message']['content']), true);
        Log::info($assistantMessage);
        ChatMessage::store($chatId, 'assistant', $assistantMessage['message']);

        return $assistantMessage['message'];
    }
}
