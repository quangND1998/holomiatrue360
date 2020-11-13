<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use ZipArchive;
use Illuminate\Support\Facades\File;
use RarArchiver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use DirectoryIterator;
use Illuminate\Support\Str;
trait FileUploadTrait
{

    /**
     * File upload trait used in controllers to upload files
     */
    public function saveFiles(Request $request)
    {
        if (! file_exists(public_path('uploads'))) {
            mkdir(public_path('uploads'), 0777);
            mkdir(public_path('uploads/thumb'), 0777);
        }

        $finalRequest = $request;

        foreach ($request->all() as $key => $value) {
            if ($request->hasFile($key)) {
                if ($request->has($key . '_max_width') && $request->has($key . '_max_height')) {
                    // Check file width
                    $filename = time() . '-' . $request->file($key)->getClientOriginalName();
                    $file     = $request->file($key);
                    $image    = Image::make($file);
                    if (! file_exists(public_path('uploads/thumb'))) {
                        mkdir(public_path('uploads/thumb'), 0777, true);
                    }
                    Image::make($file)->resize(50, 50)->save(public_path('uploads/thumb') . '/' . $filename);
                    $width  = $image->width();
                    $height = $image->height();
                    if ($width > $request->{$key . '_max_width'} && $height > $request->{$key . '_max_height'}) {
                        $image->resize($request->{$key . '_max_width'}, $request->{$key . '_max_height'});
                    } elseif ($width > $request->{$key . '_max_width'}) {
                        $image->resize($request->{$key . '_max_width'}, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    } elseif ($height > $request->{$key . '_max_width'}) {
                        $image->resize(null, $request->{$key . '_max_height'}, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    }
                    $image->save(public_path('uploads') . '/' . $filename);
                    $finalRequest = new Request(array_merge($finalRequest->all(), [$key => $filename]));
                } else {
                    $filename = time() . '-' . $request->file($key)->getClientOriginalName();
                    $request->file($key)->move(public_path('uploads'), $filename);
                    $finalRequest = new Request(array_merge($finalRequest->all(), [$key => $filename]));
                }
            }
        }

        return $finalRequest;
    }
    public function uploadFile($name,$image,$url_folder)
    {
        $current = Carbon::now()->format('YmdHs');
        $folder = $url_folder;
        $destinationpath = public_path($folder);

        $name = Str::slug($name).'_'.time();
        $namefile =   $name. '.' . $image->getClientOriginalExtension();
        $image->move($destinationpath,$namefile);
        $image_url =  $folder . $namefile;
            return $image_url;
    }


    //Upload and Update fileZIp
    public function UploadZipFile($file,$extracto){

        $zip = new ZipArchive;
        $user_id = Auth::user()->id;
        if($file->getClientOriginalExtension()=="zip" ){
            $zip->open($file->getRealPath());
            $zip->extractTo($extracto);
            $string =explode(".zip", $file->getClientOriginalName())[0]."-".time().$user_id;
            rename($extracto.'/'.explode(".zip", $file->getClientOriginalName())[0],$extracto.'/'.$string);
            $path =  $extracto.'/'.$string.'/index.html';
        }
        return $path;
    }

    public function UpdateFile($file,$extracto,$attribute){

        $zip = new ZipArchive;
        $user_id = Auth::user()->id;
        if($file->getClientOriginalExtension()=="zip" ){

            $oldzip =explode("/index.html",$attribute)[0];
            File::deleteDirectory($oldzip);
            $zip->open($file->getRealPath());
            $zip->extractTo($extracto);
            $string =explode(".zip", $file->getClientOriginalName())[0]."-".time().$user_id;
            rename($extracto.'/'.explode(".zip", $file->getClientOriginalName())[0],$extracto.'/'.$string);
            $path =  $extracto.'/'.$string.'/index.html';
        }
        return $path;
    }


    public function UploadFilePresent($file,$extracto){

        $zip = new ZipArchive;
        $user_id = Auth::user()->id;
        if($file->getClientOriginalExtension()=="zip" ){
            $zip->open($file->getRealPath());
            $zip->extractTo($extracto);
            $string =explode(".zip", $file->getClientOriginalName())[0]."-".time().$user_id;
            rename($extracto.'/'.explode(".zip", $file->getClientOriginalName())[0],$extracto.'/'.$string);
            $path =  $extracto.'/'.$string.'/tour.html';
        }
        return $path;
    }


    public function UpdateFilePresent($file,$extracto,$attribute){

        $zip = new ZipArchive;
       $user_id = Auth::user()->id;
        if($file->getClientOriginalExtension()=="zip" ){

            $oldzip =explode("/tour.html",$attribute)[0];//genneral/tenfile/
            File::deleteDirectory($oldzip);//xoa dc file nay
            $zip->open($file->getRealPath());
            $zip->extractTo($extracto);
            $string =explode(".zip", $file->getClientOriginalName())[0]."-".time().$user_id;
            rename($extracto.'/'.explode(".zip", $file->getClientOriginalName())[0],$extracto.'/'.$string);
            $path =  $extracto.'/'.$string.'/tour.html';
        }
        return $path;
    }



    //upload and update model_AR
    public function UploadFileGLB_Usdz($file,$destinationpath){
        $user_id = Auth::user()->id;
        if($file->getClientOriginalExtension()=="glb" || $file->getClientOriginalExtension()=="usdz"  ){
            $file->move($destinationpath,time().$user_id."-".$file->getClientOriginalName());
            $path= $destinationpath.'/'.time().$user_id."-".$file->getClientOriginalName();
        }
        return $path;
    }


    public function UpdateFileGlb_Usdz($file,$destinationpath,$attribute){
        $user_id = Auth::user()->id;
        if($file->getClientOriginalExtension()=="glb" || $file->getClientOriginalExtension()=="usdz"  ){

            if($attribute == ''){
                $file->move($destinationpath,time().$user_id."-".$file->getClientOriginalName());
                $path= $destinationpath.'/'.time().$user_id."-".$file->getClientOriginalName();
            }
            else{
                 unlink($attribute);
                 $file->move($destinationpath,time().$user_id."-".$file->getClientOriginalName());
                 $path= $destinationpath.'/'.time().$user_id."-".$file->getClientOriginalName();
            }
           
            
        }
        return $path;

    }

    //update image ground
    public function image($file,$destinationpath){
        $user_id = Auth::user()->id;
        $name =time().$user_id."-".$file->getClientOriginalName();
        $file->move($destinationpath, $name);
        $path = $destinationpath.$name;

        return $path;
    }




    public function update_image($file,$destinationpath,$attribute){

        $user_id = Auth::user()->id;
        $name =time().$user_id."-".$file->getClientOriginalName();
        if($attribute ==null || file_exists($attribute) ==false){
            $file->move($destinationpath, $name);
            $path = $destinationpath.$name;
    
        }
        else{
        unlink($attribute);
        $file->move($destinationpath, $name);
        $path = $destinationpath.$name;
        }

        return $path;
    }


    //upload folder image Map
    public function uploadfloder_image($file , $extracto){
        $zip = new ZipArchive;
        $user_id = Auth::user()->id;
        if($file->getClientOriginalExtension()=="zip" ){
            $zip->open($file->getRealPath());
            $zip->extractTo($extracto);
            $string =explode(".zip", $file->getClientOriginalName())[0]."-".time().$user_id;
            rename($extracto.'/'.explode(".zip", $file->getClientOriginalName())[0],$extracto.'/'.$string);
            $path =  $extracto.'/'.$string .'/';
        }
        return $path;
    }

    public function updatefloder_image($file , $extracto ,$attribute){

        $zip = new ZipArchive;
        $user_id = Auth::user()->id;
        if($file->getClientOriginalExtension()=="zip" ){
            File::deleteDirectory($attribute);   
            $zip->open($file->getRealPath());
            $zip->extractTo($extracto);
            $string =explode(".zip", $file->getClientOriginalName())[0]."-".time().$user_id;
            rename($extracto.'/'.explode(".zip", $file->getClientOriginalName())[0],$extracto.'/'.$string);
            $path =  $extracto.'/'.$string .'/';
        }
        return $path;
    }
    public function DeleteFolder($attribute,$extension){

        if(file_exists($attribute)){
            $oldzip =explode($extension,$attribute)[0];

            if(is_dir($oldzip)){
                File::deleteDirectory($oldzip);//xoa dc file nay
            }
            else{
                unlink($attribute);
            }

        }


    }
    public function createFolder($public,$name){

            $path = $public.$name;
            mkdir($path);
            return $path;
    
     }
     public function createFolderChild($public,$nameParent,$name){
         $path = $public.$nameParent.'/'.$name;
        mkdir($path);
        return $path;
    
     }

     public function getAllFolder($public,$name){
        $dir = new DirectoryIterator($public.$name);
        $array=  [];
        foreach ($dir as $fileinfo) {
            if ($fileinfo->isDir() && !$fileinfo->isDot()) {
                $array[]= $fileinfo->getFilename();
            }
        }
        return $array;
     }
     public function uploadMultiple($path,$files){
        foreach ($files as $file) {
            $name = $file->getClientOriginalName();
            $file->move($path, $name);
            $data[] = $name;
        }
      
     }
     public function getAllImage($public,$name){
        $dir = new DirectoryIterator($public.$name);
        $array=  [];
        foreach ($dir as $fileinfo) {
            if (!$fileinfo->isDir()) {
                $array[]= $fileinfo->getFilename();
            }
        }
        return $array;
     }

}
