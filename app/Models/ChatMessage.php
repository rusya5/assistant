<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    protected $fillable = ['chat_id', 'role', 'message'];

    public static function store(int $chatId, string $role, string $message): void
    {
        self::create([
            'chat_id' => $chatId,
            'role' => $role,
            'message' => $message,
        ]);
    }

    public static function getHistory(int $chatId, int $limit = 20): array
    {
        $history = self::where('chat_id', $chatId)
            ->orderBy('created_at')
            ->limit($limit)
            ->get(['role', 'message'])
            ->toArray();
        return array_reduce($history, function ($carry, $item) {
            $carry[] = [$item['role'] => $item['message']];
            return $carry;
        }, []);
    }
}
