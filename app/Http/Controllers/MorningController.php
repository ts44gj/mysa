<?php

namespace App\Http\Controllers;

use App\Morning;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MorningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Morning $morning,User $user)
    {
        $user = User::find($user->id);
        $morning = Morning::orderby('created_at', 'desc')->paginate(10);

        return view('mornings.index', ['mornings' => $morning,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Morning $morning)
    {
        $morning->time = $request->time;
        $morning->day = Carbon::today();
        $morning->user_id = $request->user()->id;
        $morning->save();

        return redirect()->route('mornings.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Morning $morning)
    {
        $morning->delete();
        return redirect()->route('mornings.index');

    }
}
