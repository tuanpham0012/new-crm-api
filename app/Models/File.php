<?php

namespace App\Models;

use App\Helper\FileHelper;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\File as Files;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model
{
    use HasFactory;

    const TYPE_FILE = [
        'image' => [
            'jpeg',
            'jpg',
            'png',
            'gif',
            'tiff'
        ],
        'document' => [
            'pdf',
            'docx',
            'xlsx',
            'pptx'
        ]
    ];
    protected $table = 'files';

    protected $fillable = [
        'fileable_id',
        'fileable_type',
        'url',
        'type',
    ];

    /**
     * Get the parent fileable model (user or post).
     */
    public function fileable(): MorphTo
    {
        return $this->morphTo(__FUNCTION__, 'fileable_type', 'fileable_id');
    }

    /**
     * @var string
     */
    protected $diskName;

    protected $storage;

    /**
     * return Storage
     */
    private function storage(): mixed
    {
        if (!$this->storage) {
            $this->storage = Storage::disk($this->diskName ?? env('FILE_STORAGE', 'public'));
        } //end if
        return $this->storage;
    }


    public function uploadFile(UploadedFile $file, $fileName = '', $model = null) :mixed
    {
        // $this->diskName = env('FILE_STORAGE', 'public');


        $extension = $file->getClientOriginalExtension();
        $result = null;
        if(in_array($extension, self::TYPE_FILE['image'])){
            $result = $this->uploadImage($file, $extension);
        }else if(in_array($extension, self::TYPE_FILE['document'])){
            $result = $this->uploadImage($file, $extension);
        }

        if($result){
            $file = File::query()->create([
                'fileable_id' => $model->id ?? null,
                'fileable_type' => $model ? get_class($model) : null,
                'url' => $result['url'],
                'type' => $extension,
                'file_name' => $fileName
            ]);
            // $imageUrl = $this->storage()->url($file->url);
            return [
                'url' => $this->url($file->url),
                'file_id' => $file->id
            ];
        }
        return [];
    }
    /**
     * Upload image
     *
     * @param UploadedFile $file
     * @param $type
     * @return array
     * @throws InputException
     */
    public function uploadImage(UploadedFile $file, $type): array
    {
        $name = $file->getClientOriginalName();
        $name = strtotime(date('Y-m-d H:i:s')) . rand(1000, 999999) . '_' . substr($name, 0, 16) . '.' . $type;
        $photo = "/images/" . $name;
        $this->storage()->put($photo, $file->getContent());

        return ['url' => $photo];
    }

    public function url(String $url): String
    {
        return $this->storage()->url($url);
    }
}
