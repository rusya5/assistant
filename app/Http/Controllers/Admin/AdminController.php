<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use App\Models\EquipmentsService;
use App\Models\EventType;
use App\Telegram\Handler;
use DefStudio\Telegraph\Models\TelegraphBot;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use OpenAI\Laravel\Facades\OpenAI;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function createBot()
    {
        $bot = TelegraphBot::create([
            'token' => env('TELEGRAPH_BOT_TOKEN'),
            'name' => 'streamlabAssistant',
        ]);
        dd($bot);
    }
    public function clear(){
        file_put_contents(storage_path('logs/laravel.log'), '');
        ChatMessage::truncate();
        return response()->json(['success' => true], 200);
    }
}
