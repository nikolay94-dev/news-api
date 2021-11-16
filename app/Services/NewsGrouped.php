<?php

namespace App\Services;

use App\Repositories\NewsRepository;

final class NewsGrouped
{
    private $newsRepository;

    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    public function handle(string $groupedBy = null)
    {
        $news = $this->newsRepository->getNewsWithSource()->get();

        switch ($groupedBy) {
            case 'theme':
                $news = $news->groupBy('theme');
                break;
            case 'sources':
                $news = $news->groupBy('name');
                break;
            case 'date':
                $news = $news->groupBy(function ($match) { return substr($match->publishedAt, 0, 10);});
                break;
        }

        return $news->toJson();
    }
}
