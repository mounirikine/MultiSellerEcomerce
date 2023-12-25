<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    //

public function comment(Request $request){

    $comment = new Comments();

    $comment->user_id = $request->user_id;
    $comment->product_id = $request->product_id;
    $comment->content = $request->content;
    $comment->save();

    return redirect()->back();

}
}
