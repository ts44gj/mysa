<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Buy;


class TopController extends Controller
{
     public function index(Todo $todos, Buy $buys)
    {$todos = Todo::orderBy('deadline', 'desc')->get();
        $buys = Buy::all();


       return view('userTop',['todos'=>$todos,'buys'=>$buys]);
    }
}
