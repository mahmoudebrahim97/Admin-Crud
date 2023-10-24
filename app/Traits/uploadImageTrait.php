<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait uploadImageTrait
{
    public function uploadImage($request, $id, $category)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName();
            DB::table('categories')->where('id', $id)->update([
                'image' => $file_name,
            ]);
            $file->move(public_path('categories/' . $category->img_path), $file_name);
        }
    }
}
