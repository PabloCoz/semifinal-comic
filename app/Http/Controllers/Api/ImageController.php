<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function orderImage(Request $request)
    {
        $position = 1;
        $images = $request->get('orders');

        foreach ($images as $image) {

            $ima = Image::find($image);
            $ima->position = $position;
            $ima->save();
            $position++;
        }
    }
}
