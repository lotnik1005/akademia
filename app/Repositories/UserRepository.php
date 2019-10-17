<?php

namespace App\Repositories;

use App\User;

class UserRepository extends BaseRepository
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getAllTutors()
    {
        return $this->model->where('role_id', 3)->get();
    }

    public function getAllStudents()
    {
        return $this->model->where('role_id', 2)->orderBy('name', 'asc')->get();
    }
}