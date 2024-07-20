<?php

namespace App\GameText;

class TextEditingService
{

    public function wordLimit(array $text, int $words){
        $wordCount = 0;
        foreach ($text as $key=>$paragraph){
            if($wordCount>$words){
                unset($text[$key]);
            }
            $wordCount += count(explode(' ', $paragraph));
        }
        return $text;
    }
    public function plainText(array $text){
        return implode("\n",$text);
    }
}
