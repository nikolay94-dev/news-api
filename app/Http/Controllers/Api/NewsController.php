<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\NewsGrouped;
use Illuminate\Http\Request;


class NewsController extends Controller
{
    private $newsGrouped;

    public function __construct(NewsGrouped $newsGrouped)
    {
        $this->newsGrouped = $newsGrouped;
    }

    public function getNews(Request $request)
    {
        return $this->newsGrouped->handle($request->groupedBy);
    }
}
