<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Buy;


class TopController extends Controller
{
     public function show(Todo $todos, Buy $buys)
    {$todos = Todo::orderBy('deadline', 'desc')->get();
        $buys = Buy::all();


       return view('top',['todos'=>$todos,'buys'=>$buys]);
    }
}
