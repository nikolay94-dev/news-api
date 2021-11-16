<?php

namespace App\Repositories;

use App\Models\News;
use Illuminate\Support\Facades\DB;

final class NewsRepository
{

    private $sourceNewsRepository;

    public function __construct(SourceNewsRepository $sourceNewsRepository)
    {
        $this->sourceNewsRepository = $sourceNewsRepository;
    }

    public function createOrUpdate(\stdClass $data)
    {
        $news = News::where('title', $data->title)->first();

        if (!$news) {
            $news = new News();
        }

        return $this->fillData($news, $data);
    }

    public function getNewsWithSource()
    {
        return DB::table('news')
            ->join('source_news', 'news.source_news_id', '=', 'source_news.id');
    }

    private function fillData(News $news, \stdClass $data)
    {
        $news->theme = $data->theme;
        $news->author = $data->author;
        $news->title = $data->title;
        $news->description = $data->description;
        $news->url = $data->url;
        $news->urlToImage = $data->urlToImage;
        $news->publishedAt = date("Y-m-d H:i:s", strtotime($data->publishedAt));
        $news->content = $data->content;

        $sourceOfNews = $this->sourceNewsRepository->getSource($data->source);
        $news->source_news_id = $sourceOfNews->id;

        $news->save();

        return $news;
    }
}
