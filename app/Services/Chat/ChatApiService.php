<?php

namespace App\Services\Chat;

use http\Env;
use Illuminate\Support\Facades\Http;

class ChatApiService
{
    public function send(array $data):string
    {
        try {
            $response =  json_decode(Http::withoutVerifying()
                ->withHeaders([
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . env('CHAT_API_KEY')
                ])->post('https://api.openai.com/v1/chat/completions', [
                    "model" => "gpt-3.5-turbo",
                    "messages" => [
                        [
                            'role' => 'system',
                            'content' => "to jest artykuł '" . $data['text'] . "'"
                        ],
                        [
                            'role' => 'user',
                            'content' => "Ten tekst '" . $data['user'] . "' jest strzeszczeniem artukułu,
                        napisz jakie ważne wątki nie zostały poruszone.
                        Ostatnie zdanie ma zawierać jedynie procent poruszonych wątków, jedynie liczba bez podpisu"
                        ]
                    ]
                ]), true, 512, JSON_THROW_ON_ERROR)['choices'][0]['message']['content'];
        }catch (\Exception $e){
            $response = $e->getMessage();
        }
        return $response;
    }
}
