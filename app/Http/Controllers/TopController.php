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
        $todos = Todo::orderBy('deadline', 'desc')->paginate(5);
        $buys = Buy::orderby('created_at', 'desc')->paginate(5);
        $mornings = Morning::orderby('created_at', 'desc')->paginate(5);
        $memos = Memo::orderby('created_at', 'desc')->paginate(5);


       return view('userTop',['todos'=>$todos,'buys'=>$buys,'mornings'=>$mornings,'memos'=>$memos]);
    }
}
