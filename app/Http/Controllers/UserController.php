<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index()
  {
    $items = User::all();
    return response()->json([
      'data' => $items
    ], 200);
  }
  public function store(Request $request)
  {
    $item = User::create($request->all());
    return response()->json([
      'data' => $item
    ], 201);
  }
  public function show(User $user)
  {
    $item = User::find($user);
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
//   public function update(Request $request, User $user)
//   {
//     $update = [
//       'name' => $request->name,
//       'email' => $request->email
//     ];
//     $item = User::where('id', $user->id)->update($update);
//     if ($item) {
//       return response()->json([
//         'message' => 'Updated successfully',
//       ], 200);
//     } else {
//       return response()->json([
//         'message' => 'Not found',
//       ], 404);
//     }
//   }
//   public function destroy(User $user)
//   {
//     $item = User::where('id', $user->id)->delete();
//     if ($item) {
//       return response()->json([
//         'message' => 'Deleted successfully',
//       ], 200);
//     } else {
//       return response()->json([
//         'message' => 'Not found',
//       ], 404);
    // }
//   }
}
