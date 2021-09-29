<?php

namespace App\Http\Controllers;

use App\Buy;
use Illuminate\Http\Request;

class BuyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$buys = Buy::orderBy('day', 'desc')->get();

        return view('buys.index' /*, ['buys' => $buys]*/);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $buy = new Buy;
        $form = $request->all();

       // $buy->text = $request->text;
      //  $buy->day = $request->day;

//s3アップロード開始
        $image = $request->file('image');
// バケットの`myprefix`フォルダへアップロード
        $path = Storage::disk('s3')->putFile('img', $image, 'public');
// アップロードした画像のフルパスを取得
        $buy->image_path = Storage::disk('s3')->url($path);

        $buy->save();

        return redirect('buys.index');

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
    public function destroy($id)
    {
        //
    }
}
