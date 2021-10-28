<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CkeditorController extends Controller
{
    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            
            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();
       
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
            //Upload File
            $file = $request->file('upload');
            $file->move(public_path('images'), $filenametostore);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$filenametostore);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
              
            echo '{
                "uploaded": true,
                "url": "'.$url.'"}';
            }
        }
}
