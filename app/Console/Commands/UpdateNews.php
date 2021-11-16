<?php

namespace App\Console\Commands;

use App\Services\NewsParser;
use Illuminate\Console\Command;

class UpdateNews extends Command
{
    protected $signature = 'update-news';

    protected $description = 'Обновляет статьи';

    private $newsParser;

    public function __construct(NewsParser $newsParser)
    {
        parent::__construct();

        $this->newsParser = $newsParser;
    }

    public function handle()
    {
        $this->newsParser->parseNews();
    }
}
