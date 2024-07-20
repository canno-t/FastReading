<?php

namespace App\Http\Controllers;

use App\GameText\TextEditingService;
use App\GameText\TextScraperService;
use Illuminate\Http\Request;

class GameController extends Controller
{

    public function __construct(
        private TextScraperService $textScraperService,
        private TextEditingService $textEditingService
    )
    {
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $url = $this->textScraperService->getRandomArticleUrl();
        $text = $this->textScraperService->getArticleText($url);
        $wordlimit = $this->textEditingService->wordLimit($text, 200);
        $plaintext = $this->textEditingService->plainText($wordlimit);
        return view('game')->with(['text'=>$plaintext, 'url'=>$url]);
    }
}
