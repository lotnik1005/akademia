<?php

namespace App\Repositories;

use App\Visit;

class VisitRepository extends BaseRepository
{
    public function __construct(Visit $model)
    {
        $this->model = $model;
    }
}