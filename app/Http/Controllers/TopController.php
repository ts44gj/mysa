<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Buy;
use App\Morning;
use App\Memo;



class TopController extends Controller
{
     public function index(Todo $todos, Buy $buys, Morning $mornings, Memo $memos)
    {
        $todos = Todo::orderBy('deadline', 'desc')->get();
        $buys = Buy::all();
        $mornings = Morning::all();
        $memos = Memo::all();


       return view('userTop',['todos'=>$todos,'buys'=>$buys,'mornings'=>$mornings,'memos'=>$memos]);
    }
}
