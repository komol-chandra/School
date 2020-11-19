<?php
namespace App\Traits;

use Illuminate\Http\Request;
trait FileUpload
{
    public function ImageUpload(Request $request, $fieldname = 'undefined', $path = 'undefined', $name = 'undefined')
    {
        if ($request->hasFile($fieldname)) {
            $filetype = $request->file($fieldname)->getClientOriginalExtension();
            $path = 'Backend_assets/Files/' . $path;
            $image = $name . time() . '.' . $filetype;
            $request->file($fieldname)->move($path, $image);
            $image_name = $path . $image;
            return $image_name;
        } else {
            return $request->$fieldname = null;
        }
    }
}

// $ext=$request->file('image')->getClientOriginalExtension();
// $path="Backend_assets/Files/Staff/";
// $name='Staff_'.time().'.'.$ext;
// $request->file('image')->move($path,$name);
// Arr::set($request,'staff_image',"/".$path.$name);
