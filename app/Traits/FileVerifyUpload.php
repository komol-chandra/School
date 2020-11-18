<?php
namespace App\Traits;
use Illuminate\Http\Request;
trait FileVerifyUpload
{
    public function ImageVerifyUpload(Request $request,$fieldname='undefined',$path='backend_assets/images/undefined/',$name='undefined')
    {
        if($request->hasFile($fieldname))
        {
            $filetype=$request->file($fieldname)->getClientOriginalExtension();
            $path=public_path($path);
            $image=$name.time().'.'.$filetype;
            $request->file($fieldname)->move($path,$image);
            $request->$fieldname=$image;
            return $request->$fieldname;
        }
        else
        {
            return $request->$fieldname=null;
        }
    }
}
