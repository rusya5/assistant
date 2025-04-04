<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PromptController extends Controller
{
    public const PROMPT_TXT = 'prompt.txt';
    /**
     * Получить содержимое файла
     */
    public function index()
    {
        if (!Storage::exists(self::PROMPT_TXT)) {
            return response()->json(['message' => 'Файл не найден'], 404);
        }

        $prompt = Storage::get(self::PROMPT_TXT);
        return view('admin.prompt.index', compact('prompt'));
    }

    /**
     * Обновить содержимое файла
     */
    public function update(Request $request)
    {
        $request->validate([
            'prompt' => 'required|string',
        ]);

        Storage::put(self::PROMPT_TXT, $request->input('prompt'));

        return response()->json(['message' => 'Файл обновлен']);
    }
}
