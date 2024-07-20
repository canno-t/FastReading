<?php

namespace App\GameText;

use Illuminate\Support\Facades\Http;

use Symfony\Component\DomCrawler\Crawler;
class TextScraperService
{

    public function __construct(
        private TextEditingService $editingService
    )
    {
    }

    public function getRandomArticleUrl():string{
        $page = random_int(0, 8000);
        $url = env("SCRAPED_URL").'/news?page='.$page;
        $body = Http::withoutVerifying()->get($url)->body();
        $crawler = new Crawler($body);
        $articles_list = $crawler->filter('li.news > a')->each(function ($selector){
            return $selector->attr('href');
        });
        $rnd = random_int(0, (count($articles_list))-1);
        return env('SCRAPED_URL').$articles_list[$rnd];
    }

    public function getArticleText($url):array{
        $body2 = Http::withoutVerifying()->get($url)->body();
        $crawler = new Crawler($body2);
        return $crawler->filter('article > div.clearfix > p')->each(function ($paragraph){
            return $paragraph->text();
        });
    }
}
