<?php

namespace App\Repositories;

use Illuminate\Contracts\Filesystem\Filesystem;

class PortfolioRepository
{
    public function getAll()
    {
        $portfolio = collect();
        foreach(resolve(Filesystem::class)->files() as $file) {
            if ($file === '.gitignore') {
                continue;
            }
            $contents = resolve(Filesystem::class)->get($file);
            $portfolio[] = json_decode($contents, true);
        }
        return $portfolio;
    }

    public function create(array $data)
    {
        resolve(Filesystem::class)
            ->put("{$data['name']}.txt", json_encode($data, JSON_UNESCAPED_UNICODE));
    }
}
