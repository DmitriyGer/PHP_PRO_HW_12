<?php

use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;

Route::get('/test-telegram', function () {
    try {
        $response = Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_CHANNEL_ID'),
            'text' => 'Тестовое сообщение из Laravel!',
            'parse_mode' => 'HTML'
        ]);
        
        return response()->json([
            'status' => 'success',
            'response' => $response
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage()
        ], 500);
    }
});