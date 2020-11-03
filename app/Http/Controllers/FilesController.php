<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Technology;
use App\File;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    public function uploadFile(Request $request, $tech_id)
    {
        $this->validate($request, array(
            'file' => 'required|file|max:10240|mimes:pdf'
        ));
        
        if($request->hasFile('file')){
            $pdfFile = $request->file('file');
            $pdfName = uniqid().$pdfFile->getClientOriginalName();
            $pdfFile->move(public_path('/storage/files/'), $pdfName);
            $tech = Technology::find($tech_id);
            $file = $tech->files()->create([
                'filename' => $pdfName,
                'filesize' => 1,
                'category' => $request->category,
                'filetype' => pathinfo(storage_path().'/storage/files/'.$pdfName, PATHINFO_EXTENSION),
                'technology_id' => $tech_id
            ]);
            
        }
        return redirect()->back()->with('success', 'File Uploaded!');
    }

    public function deleteFile($file_id){
        $file = File::find($file_id);
        $filePath = public_path().'/storage/files/'.$file->filename;
        unlink($filePath);
        $file->delete();
        return redirect()->back()->with('success','File Deleted.'); 
    }
}
