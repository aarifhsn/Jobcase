<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use SimpleXMLElement;

class RssFeedService
{
    public function fetchArticles($feedUrl)
    {
        $response = Http::get($feedUrl);
        if ($response->successful()) {
            $xml = new SimpleXMLElement($response->body());
            $articles = [];
            foreach ($xml->channel->item as $item) {
                $articles[] = [
                    'title' => (string) $item->title,
                    'link' => (string) $item->link,
                    'description' => (string) $item->description,
                ];
            }

            return $articles;
        }

        return [];
    }
}
