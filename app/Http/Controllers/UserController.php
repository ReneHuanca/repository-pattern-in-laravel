<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\EloquentUserRepository;
use App\Repositories\UserRepository;
use App\Services\UserCreator;
use App\Services\UserCreatorWithRepository;
use App\Services\UsersList;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $creator, $list;

    public function __construct(UserCreator $creator, UsersList $list)
    {
        $this->creator = $creator;
        $this->list = $list;
    }

    public function create()
    {
        return view('user.create', [
            'users' => $this->list->__invoke(),
        ]);
    }
    
    public function store(Request $request)
    {
        $this->creator->__invoke($request->all());

        return back();
    }

}
