<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChatRequest;
use App\Services\Chat\ChatApiService;
use App\Services\Chat\ChatResponseService;
use Illuminate\Http\Request;

class ChatController extends Controller
{

    public function __construct(
        private ChatApiService $chatApiService,
        private ChatResponseService $chatResponseService
    )
    {
    }

    public function __invoke(ChatRequest $request)
    {
        $valid = $request->validated();
        $response = $this->chatApiService->send(['user'=>$valid['user'], 'text'=>$valid['text']]);
        return $this->chatResponseService->toHtml($response);
    }
}
