<?php

namespace App\Jobs;

use App\Repositories\NewsRepository;

class ParseNewsByThemeJob extends Job
{
    private $articleFromApi;
    private $theme;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(\stdClass $articleFromApi, string $theme)
    {
        $this->articleFromApi = $articleFromApi;
        $this->theme = $theme;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $newsRepository = app()->make(NewsRepository::class);

        $this->articleFromApi->theme = $this->theme;

        $newsRepository->createOrUpdate($this->articleFromApi);


    }
}
