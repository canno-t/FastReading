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
        $text = $this->textScraperService->getArticleText();
        $wordlimit = $this->textEditingService->wordLimit($text, 200);
        $plaintext = $this->textEditingService->plainText($wordlimit);
        return view('game')->with(['text'=>$plaintext]);
    }
}
