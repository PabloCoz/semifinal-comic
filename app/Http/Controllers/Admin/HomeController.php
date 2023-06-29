<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $countComics = $this->countComics();
        $countUsers = $this->usersCount();
        $countCreators = $this->creatosCount();
        return view('admin.index', compact('countComics', 'countUsers', 'countCreators'));
    }

    public function countComics()
    {
        return Comic::where('status', Comic::PUBLICADO)->count();
    }

    public function usersCount()
    {
        return User::count();
    }

    public function creatosCount()
    {
        return User::where('is_creator', true)->count();
    }

}
