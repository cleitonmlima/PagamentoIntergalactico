<?php

namespace App\Services;

use App\Http\Resources\PetsCollection;
use App\Http\Repositories\WalletRepository;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class UserService
{
	public function __construct()
	{
		$this->repository = new WalletRepository;
	}
	
    public function updateWallet($payload)
    {
        if(!$this->validate($payload)->fails()) {

        }
      
    }

    public function validate($request)
    {
        return Validator::make($request->all(), [
            'name' => 'required|min:2',
            'user_id' => 'required|exists:users',
            'total_amount' => 'required|numeric',
        ]);
    }

}
