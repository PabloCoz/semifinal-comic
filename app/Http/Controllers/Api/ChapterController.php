<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function order(Request $request)
    {
        $position = 1;

        $sorts = $request->get('sorts');
        

        foreach ($sorts as $sort) {
            $chapter = Chapter::find($sort);
            $chapter->position = $position;
            $chapter->save();
            $position++;
        }

        

    }
}
