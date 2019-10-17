<?php

namespace App\Repositories;

use App\Specialization;

class SpecializationRepository extends BaseRepository
{
    public function __construct(Specialization $model)
    {
        $this->model = $model;
    }
}