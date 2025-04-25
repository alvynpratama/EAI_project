<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    private $users = [
        1 => ['id' => 1, 'name' => 'Alvyn', 'email' => 'Alvyn@email.com'],
        2 => ['id' => 2, 'name' => 'Adam', 'email' => 'Adam@email.com'],
        3 => ['id' => 3, 'name' => 'Rifki', 'email' => 'Rifki@email.com'],
        4 => ['id' => 4, 'name' => 'Raka', 'email' => 'raka@email.com'],
        5 => ['id' => 5, 'name' => 'Dina', 'email' => 'dina@email.com'],
        6 => ['id' => 6, 'name' => 'Rio', 'email' => 'rio@email.com'],
        7 => ['id' => 7, 'name' => 'Tania', 'email' => 'tania@email.com'],
        8 => ['id' => 8, 'name' => 'Fikri', 'email' => 'fikri@email.com'],
        9 => ['id' => 9, 'name' => 'Lina', 'email' => 'lina@email.com'],
        10 => ['id' => 10, 'name' => 'Yusuf', 'email' => 'yusuf@email.com'],
    ];

    public function index()
    {
        return response()->json(array_values($this->users));
    }

    public function show($id)
    {
        return response()->json($this->users[$id] ?? ['error' => 'User not found']);
    }
}
