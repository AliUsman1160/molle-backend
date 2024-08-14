<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserBlocklist;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserBlockController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'blocked_user_id' => 'required|exists:users,id',
                'blocked' => 'required|boolean',
            ]);

            $user = $request->user();
            $user_id = $user->id;
            $blocked_user_id = $validatedData['blocked_user_id'];
            $blocked = $validatedData['blocked'];

            if ($user_id === $blocked_user_id) {
                return response()->json([
                    'message' => 'You cannot block yourself.',
                    'result' => false
                ], 400);
            }

            if ($blocked) {
                // Block the user
                $existingBlock = UserBlocklist::where('user_id', $user_id)
                                             ->where('blocked_user_id', $blocked_user_id)
                                             ->first();

                if ($existingBlock) {
                    return response()->json([
                        'message' => 'User is already blocked.',
                        'result' => false
                    ], 409);
                }

                $validatedData['user_id'] = $user_id;
                $block = UserBlocklist::create($validatedData);

                return response()->json([
                    'message' => 'User blocked successfully.',
                    'result' => $block
                ], 201);
            } else {
                // Unblock the user
                $block = UserBlocklist::where('user_id', $user_id)
                                     ->where('blocked_user_id', $blocked_user_id)
                                     ->first();

                if (!$block) {
                    return response()->json([
                        'message' => 'User is not blocked.',
                        'result' => false
                    ], 404);
                }

                $block->delete();

                return response()->json([
                    'message' => 'User unblocked successfully.',
                    'result' => true
                ], 200);
            }
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation error.',
                'result' => false,
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred.',
                'result' => false
            ], 500);
        }
    }
}
