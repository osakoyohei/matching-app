<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Swipe;

class SwipeController extends Controller
{
    public function store(Request $request)
    {
        Swipe::create([
            'from_user_id' => \Auth::user()->id,
            'to_user_id' => $request->to_user_id,
            'is_like' => $request->is_like,
        ]);

        $isMatch = $request->is_like &&
                    Swipe::where('from_user_id', $request->to_user_id)
                    ->where('to_user_id', \Auth::user()->id)
                    ->where('is_like', true)
                    ->exists();

        // dd($isMatch);
        
        if ($isMatch) {
            return redirect(route('users.index'))->with('flash_message', 'マッチしました!');
        }

        return redirect(route('users.index'));
    }
}
