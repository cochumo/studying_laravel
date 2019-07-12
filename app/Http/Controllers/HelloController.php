<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Validator;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{

  public function index(Request $request) {
    // $validator = Validator::make($request->query(),
    // [
    //   'id' => 'required',
    //   'pass' => 'required',
    // ]);
    // if ($validator->fails()) {
    //   $msg = 'クエリに問題があります。';
    // } else {
    //   $msg = 'ID/PASSを受け付けました。フォームを入力してください。';
    // }

    // if ($request->hasCookie('msg'))
    // {
    //     $msg = 'Cookie:' . $request->cookie('msg');
    // } else {
    //     $msg = '※Cookieはありまへん';
    // }

    $items = DB::select('select * from people');
    return view('hello.index',['items'=>$items]);
  }

  public function post(Request $request) {
    // $rules = [
    //     'name' => 'required',
    //     'mail' => 'email',
    //     'age' => 'numeric',
    // ];
    // $messages = [
    //     'name.required' => '名前は必ず入力してください',
    //     'mail.email' => 'メールアドレスが必要です',
    //     'age.numeric' => '年齢は整数で記入してください',
    //     'age.min' => '年齢は0以上で入力してください',
    //     'age.max' => '年齢は200以下で入力してください',
    // ];
    // $validator = Validator::make($request->all(),$rules,$messages);
    //
    // $validator->sometimes('age', 'min:0', function($input) {
    //   return !is_int($input->age);
    // });
    // $validator->sometimes('age', 'max:200', function($input) {
    //   return !is_int($input->age);
    // });
    //
    // if ($validator->fails()) {
    //   return redirect('/hello')
    //    ->withErrors($validator)
    //    ->withInput();
    // }

    $validate_rules = [
        'msg' => 'required',
    ];
    $this->validate($request, $validate_rules);
    $msg = $request->msg;
    $response = new Response(view('hello.index',['msg'=>'「' . $msg . '」をクッキーに保存しました']));
    $response->cookie('msg', $msg, 100);
    return $response;


    // return view('hello.index', ['msg'=>'正しく入力されました']);
  }

}
