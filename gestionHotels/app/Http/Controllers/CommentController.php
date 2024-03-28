<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        $comment = Comment::all();
        return response()->json($comment);
    }

    public function create(){
        return response()->json();
    }

    public function add(Request $request){
        $this->validate($request, [
            'idC'=>'required|exists:clients,idC',
            'comment' => 'required|string',
        ]);
        $comment = new Comment([
            'idC'=>$request->input('idC'),
            'comment' => $request->input('comment'),
        ]);
        $comment->save();
        return response()->json(["message" => "successfully created"]);
    }

    public function delete($id){
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return response()->json(['message'=>'deleted']);
    }
}
