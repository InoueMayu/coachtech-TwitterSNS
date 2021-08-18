<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    public function index()
  {
    $items = Comment::all();
    return response()->json([
      'data' => $items
    ], 200);
  }
  public function store(Request $request)
  {
    $item = Comment::create($request->all());
    return response()->json([
      'data' => $item
    ], 201);
    $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->posts_id = $request->posts_id;
        $comment->user_id = $request->user_id;
        $comment->save();
  }

  public function show(Comment $comment)
  {
    $item = Comment::find($comment);
    if ($item) {
      return response()->json([
        'data' => $item
      ], 200);
    } else {
      return response()->json([
        'message' => 'Not found',
      ], 404);
    }
  }
  public function update(Request $request, Comment $comment)
  {
    $update = [
      'comment' => $request->comment,
    ];
    $item = Comment::where('id', $comment->id)->update($update);
    if ($item) {
      return response()->json([
        'message' => 'Updated successfully',
      ], 200);
    } else {
      return response()->json([
        'message' => 'Not found',
      ], 404);
    }
  }
  public function destroy(Comment $comment)
  {
    $item = Comment::where('id', $comment->id)->delete();
    if ($item) {
      return response()->json([
        'message' => 'Deleted successfully',
      ], 200);
    } else {
      return response()->json([
        'message' => 'Not found',
      ], 404);
    }
  }
}

