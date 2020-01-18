<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

//use App\File;
class  UploadController extends Controller
{

    /*
     *
     $request,$path,$upload_type='single',$delete_file=null,$new_name=null, $crud_type=[]
     *
     */
    public function upload($data = [])
    {
        if (in_array('new_name', $data)) {
            $new_name = $data['new_name'] == null ? time() : $data['new_name'];
        }
        if (request()->hasFile($data['file']) && $data['upload_type'] == 'single') {
            //  in_array('delete_file',$data)&& !empty($data['delete_file'])?Storage::delete($data['delete_file']):'';
            Storage::has($data['delete_file']) ? Storage::delete($data['delete_file']) : '';

            return request()->file($data['file'])->store($data['path']);
        } elseif (request()->hasFile($data['file']) && $data['upload_type'] == 'multiple') {
            $files = request()->file($data['file']);
            $filename = [];
            $i = 0;
            foreach ($files as $file) {

                $filename[$i] = $file->store($data['path']);
                $i++;
            }
            return $filename;
        }
    }
}
