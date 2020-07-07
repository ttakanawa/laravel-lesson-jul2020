<?php

namespace App\Repositories;

use Illuminate\Contracts\Filesystem\Filesystem;

class PortfolioRepository
{
    public function create(array $data)
    {
        resolve(Filesystem::class)
            ->put("{$data['name']}.txt", json_encode($data, JSON_UNESCAPED_UNICODE));
    }
}
