<?php

namespace App\Services\Chat;

class ChatResponseService
{

    public function getPercentage(string $text){
        $words = explode(' ', $text);
        return $words[count($words)-1];
    }

    public function getExplanation(string $text){
        $words = explode(' ', $text);
        unset($words[count($words)-1]);
        return implode(' ', $words);
    }

    public function toHtml(string $chatResponse){
        return <<<HTML
    <p>{$this->getExplanation($chatResponse)}</p>
    <p id="resoult">{$this->getPercentage($chatResponse)}</p>
HTML;

    }
}
