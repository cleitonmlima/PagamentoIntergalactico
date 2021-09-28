<?php

namespace App\Repositories;

use App\Http\Models\User;

class UserRepository
{
    public function __construct()
    {
    	$this->model = new User;
    }

    public function store($pet)
    {

    }
}
