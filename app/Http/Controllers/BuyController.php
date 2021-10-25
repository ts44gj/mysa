<?php

namespace App\Http\Controllers;

use App\Buy;
use Illuminate\Http\Request;
use Storage;
use Illuminate\Support\Facades\Validator;
use App\Auth;


class BuyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buys = Buy::all();

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
       /* $buy = new Buy;
        $form = $request->all();

        $buy->text = $request->text;
        $buy->time = $request->time;
        //s3アップロード開始
        $image = $request->file('image');
        // バケットの`img`フォルダへアップロード
        $path = Storage::disk('s3')->putFile('img', $image, 'public');
        // アップロードした画像のフルパスを取得
        $buy->path = Storage::disk('s3')->url($path);
        $buy->user_id = $request->user()->id;
        $buy->save();

        return redirect()->route('buys.index');*/

        //画像およびコメントアップロード

//Validatorファサードのmakeメソッドの第１引数は、バリデーションを行うデータ。
//第２引数はそのデータに適用するバリデーションルール
        $validator = Validator::make($request->all(), [
            'file' => 'required|max:10240|mimes:jpeg,gif,png',
            'comment' => 'required|max:191'
        ]);

//上記のバリデーションがエラーの場合、ビューにバリデーション情報を渡す
        if ($validator->fails()){
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
            'user_id' => $request->user()->id
        ]);

       /* $buy = new Buy;
        $buy ->image_file_name -> $path;
        $buy->image_title = $request->comment;
        $buy->day = $request->day;
        $buy->user_id = $request->user()->id;
        $buy->save();*/

        return redirect('/');
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
