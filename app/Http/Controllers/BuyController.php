<?php

namespace App\Http\Controllers;

use App\Buy;
use Illuminate\Http\Request;
//use Illuminate\Http\Request\BuyRequest;
use App\Http\Requests\BuyRequest;
use Illuminate\Support\Facades\Validator;
use Storage;

class BuyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buys = Buy::paginate(10);

        return view('buys.index', ['buys' => $buys]);

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
    public function store(Request $request, Buy $buy)
    {
        //画像およびコメントアップロード

//Validatorファサードのmakeメソッドの第１引数は、バリデーションを行うデータ。
        //第２引数はそのデータに適用するバリデーションルール
        $validator = Validator::make($request->all(), [
            'file' => 'required|max:204,800|mimes:jpeg,gif,png',
            'comment' => 'required|max:191',
        ]);
//上記のバリデーションがエラーの場合、ビューにバリデーション情報を渡す
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
//s3に画像を保存。第一引数はs3のディレクトリ。第二引数は保存するファイル。
        //第三引数はファイルの公開設定。
        $file = $request->file('file');
        $path = Storage::disk('s3')->putFile('img', $file, 'public');
//カラムに画像のパスとタイトルを保存
        Buy::create([
            'image_file_name' => $path,
            'image_title' => $request->comment,
            'day' => $request->day,
            'user_id' => $request->user()->id,
        ]);
        return redirect()->route('buys.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Buy $buy)
    {
        return view('buys.show', ['buy' => $buy]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buy $buy)
    {
        $buy->delete();
        return redirect()->route('buys.index');
    }
}
