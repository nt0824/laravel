<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// リクエストクラスの読み込み
use App\Http\Requests\EditRequest;
// モデルの読み込み
use App\Models\Post;


class EditController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(EditRequest $request)
    {
        // リクエストしたURLからpostIdを取得して、データを取得。
    $post = Post::where('id', $request->postId())->firstOrFail();
    // データを更新
    $post->content = $request->content();
    $post->save();
    // リダイレクト
    return redirect()->route('editindex', ['postId' => $post->id])->with('success', '投稿を更新しました。');
    }
}
