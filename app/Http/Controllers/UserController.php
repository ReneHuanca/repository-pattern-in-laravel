<?php

namespace App\Http\Controllers;

use App\Services\UserCreator;
use App\Services\UsersList;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $creator, $list;

    public function __construct(UserCreator $creator, UsersList $list)
    {
        $this->creator = $creator;
        $this->list = $list;
    }

    public function index()
    {
        return view('user.index', [
            'users' => $this->list->__invoke(),
        ]);
    }

    public function create()
    {
        return view('user.create');
    }
    
    public function store(Request $request)
    {
        $this->creator->__invoke($request->all());

        return to_route('users.index');
    }

}
