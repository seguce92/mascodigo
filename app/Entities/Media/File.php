<?php

namespace App\Entities\Media;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'files';

    protected $fillable = [
        'name',  'type', 'extension', 'user_id'
    ];

    protected $appends = [
        'name_path'
    ];

    public function getNamePathAttribute () {
        return 'storage/' . $this->getUserDir() . '/' . $this->type . '/' . $this->name . '.' . $this->extension;
    }

    public static $image_ext = ['jpg', 'jpeg', 'png', 'gif', 'svg'];
    public static $audio_ext = ['mp3', 'ogg', 'mpga'];
    public static $video_ext = ['mp4', 'mpeg', 'webm'];
    public static $document_ext = ['doc', 'docx', 'pdf', 'odt', 'txt'];

    public static function getMaxSize () {
        return (int)ini_get('upload_max_filesize') * 1000;
    }

    public function getUserDir () {
        return \Auth::user()->username . '_' . \Auth::id();
    }

    public static function getAllExtensions () {
        $merged_arr = array_merge(self::$image_ext, self::$audio_ext, self::$video_ext, self::$document_ext);
        
        return implode(',', $merged_arr);
    }

    public function getType($ext) {
        if ( in_array($ext, self::$image_ext) ) {
            return 'image';
        }

        if ( in_array($ext, self::$audio_ext) ) {
            return 'audio';
        }

        if ( in_array($ext, self::$video_ext) ) {
            return 'video';
        }

        if ( in_array($ext, self::$document_ext) ) {
            return 'document';
        }
    }

    public function getName ($type, $name, $extension) {
        return '/public/' . $this->getUserDir() . '/' . $type . '/' . $name . '.' . $extension;
    }

    public function upload ($type, $file, $name, $extension) {
        $path = '/public/' . $this->getUserDir() . '/' . $type . '/';
        $full_name = $name . '.' . $extension;
;
        $image = \Image::make($file);

        $image->resize(1024, 768, function ($constraint) {
            $constraint->aspectRatio();                 
        });

        $image->stream();
        
        return \Storage::disk('local')->put($path.$full_name, $image, 'public');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
