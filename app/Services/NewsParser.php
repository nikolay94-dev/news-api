<?php

namespace App\Services;

use App\Jobs\ParseNewsByThemeJob;

final class NewsParser
{
    const THEMES = ['Bitcoin', 'Litecoin', 'Ripple', 'Dash', 'Ethereum'];

    private $apiClient;

    public function __construct(NewsApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    public function parseNews()
    {
        for ($i = 1; $i > 0; $i++) {
            try {
                foreach (self::THEMES as $theme) {
                    foreach ($this->apiClient->getNewsByTheme($theme, $i)->articles as $article) {
                        dispatch((new ParseNewsByThemeJob($article, $theme))->delay(60));
                    }
                }
            } catch (\Exception $exception) {
                break;
            }
        }

    }
}
