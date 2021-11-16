<?php

namespace App\Repositories;

use App\Models\SourceNews;

final class SourceNewsRepository
{
    public function getSource(\stdClass $data)
    {
        $sourceNews = $this->findByOuterId($data->id);

        if (!$sourceNews) {
            $sourceNews = new SourceNews();
        }

        $sourceNews->outer_id = $data->id;
        $sourceNews->name = $data->name;
        $sourceNews->save();

        return $sourceNews;
    }

    private function findByOuterId($outerId)
    {
        return SourceNews::where('outer_id', $outerId)->first();
    }
}
