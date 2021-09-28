<?php

namespace App\Services;

use App\Http\Resources\PetsCollection;
use App\Http\Repositories\UserRepository;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class UserService
{
	public function __construct()
	{
		$this->repository = new UserRepository;
	}
	
    public function store($user)
    {
      try {
		$this->repository->store($user);
      } catch (Exception $e) {
      	return $e->getMessage();
      }

      return $this;
    }

    public function validate($request)
    {
        return Validator::make($request->all(), [
            'name' => 'required|min:2',
            'user_type' => 'required|in:C,L',
			'email' => 'required|unique:users',
			'identification_document' => 'required|unique:users',
        ]);
    }

}
