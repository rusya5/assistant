<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use App\Models\EquipmentsService;
use App\Models\EventType;
use App\Telegram\Handler;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use OpenAI\Laravel\Facades\OpenAI;

class AdminController extends Controller
{
    public function index()
    {
        file_put_contents(storage_path('logs/laravel.log'), '');
        ChatMessage::truncate();
        dd('asdasd');
        return Handler::getOpenAiResponse(1, 'Привет');
        return view('admin.index');
    }
}
