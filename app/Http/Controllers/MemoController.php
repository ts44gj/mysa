<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemoRequest;
use App\Memo;
use Illuminate\Http\Request;

class MemoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memos = Memo::simplePaginate(10);

        return view("memos.index", ['memos' => $memos]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("memos.index");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemoRequest $request, Memo $memo)
    {
        $memo->title = $request->title;
        $memo->body = $request->body;
        $memo->user_id = $request->user()->id;
        $memo->save();
        return redirect()->route('memos.index', );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Memo $memo)
    {

        return view('memos.show', ['memo' => $memo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Memo $memo)
    {
        return view('memos.edit', ['memo' => $memo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MemoRequest $request, Memo $memo)
    {
        $memo->fill($request->all())->save();
        return redirect()->route('memos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Memo $memo)
    {
        $memo->delete();
        return redirect()->route('memos.index');

    }
}
