<?php

namespace App\Http\Controllers\Media;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
    protected $entity;

    public function __construct () {
        $this->entity = app(\App\Entities\Media\File::class);
    }

    public function coverPost (Request $request) {
        $this->validate($request, [
            'image' => 'required|file|mimes:' . $this->entity->getAllExtensions().'|max:'.$this->entity->getMaxSize()
        ]);
        
        if (!$request->hasFile('image')) {
            return response()->json([
                'success' => false,
                'error' => 'no file found.',
            ]);
        }

        $file = $request->file('image');
        $name = \Carbon\Carbon::now()->format('dmY') .'_'. time();
        $path = 'cover/';
        $extension = $file->getClientOriginalExtension();
        $full_name = $name . '.' . $extension;

        $imagethumb = \Image::make($file);
        
        $imagethumb->resize(480, 320, function ($constraint) {
            $constraint->aspectRatio();                 
        });

        $imagethumb->stream();
        
        if ( \Storage::disk('upload_files')->put($path.$full_name, $imagethumb) )
            return response()->json([
                'url'   =>  url('/').'/storage/cover/'.$full_name
            ]);

        return response()
            ->setStatusCode(404);
    }

    public function iconCourse (Request $request) {
        $this->validate($request, [
            'image' => 'required|file|mimes:' . $this->entity->getAllExtensions().'|max:'.$this->entity->getMaxSize()
        ]);
        
        if (!$request->hasFile('image')) {
            return response()->json([
                'success' => false,
                'error' => 'no file found.',
            ]);
        }

        $file = $request->file('image');
        $name = \Carbon\Carbon::now()->format('dmY') .'_'. time();
        $extension = $file->getClientOriginalExtension();
        $full_name = $name . '.' . $extension;
        
        if ( $file->storeAs('icons', $full_name, 'upload_files') )
            return response()->json([
                'url'   =>  url('/').'/storage/icons/'.$full_name
            ]);

        return response()
            ->setStatusCode(404);
    }

    public function photoProfile (Request $request) {
        $this->validate($request, [
            'image' => 'required|file|mimes:' . $this->entity->getAllExtensions().'|max:'.$this->entity->getMaxSize()
        ]);
        
        if (!$request->hasFile('image')) {
            return response()->json([
                'success' => false,
                'error' => 'no file found.',
            ]);
        }

        $file = $request->file('image');
        $name = \Carbon\Carbon::now()->format('dmY') .'_'. time();
        $path = 'users/';
        $extension = $file->getClientOriginalExtension();
        $full_name = $name . '.' . $extension;

        $imagethumb = \Image::make($file);
        
        $imagethumb->resize(250, 250, function ($constraint) {
            $constraint->aspectRatio();                 
        });

        $imagethumb->stream();
        
        if ( \Storage::disk('upload_files')->put($path.$full_name, $imagethumb) )
            return response()->json([
                'url'   =>  url('/').'/storage/users/'.$full_name
            ]);

        return response()
            ->setStatusCode(404);
    }
}
