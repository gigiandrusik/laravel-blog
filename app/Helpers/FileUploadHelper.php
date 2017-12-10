<?php

namespace App\Helpers;

use File;
use Storage;
use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

/**
 * Class FileUploadHelper
 * @package App\Helpers
 */
class FileUploadHelper
{
    /**
     * @return string
     */
    public static function getImagesUploadedPath()
    {
        return Storage::disk('local')->path('images');
    }

    /**
     * @param UploadedFile $image
     *
     * @return bool|string
     */
    public static function uploadImage(UploadedFile $image)
    {
        try {

            $image_name = md5(uniqid($image->getClientOriginalName())) . '.' . $image->getClientOriginalExtension();

            $image->move(self::getImagesUploadedPath(), $image_name);

            return $image_name;

        } catch (FileException $e){
            return false;
        }
    }

    /**
     * @param string $image_name
     *
     * @return bool
     */
    public static function deleteImage($image_name)
    {
        return File::delete(self::getImagesUploadedPath() . '/' . $image_name);
    }

    /**
     * @param UploadedFile $image
     *
     * @param string $deleting_image_name
     *
     * @return bool|string
     */
    public static function changeImage(UploadedFile $image, $deleting_image_name)
    {
        if ($image_name = self::uploadImage($image)) {

            self::deleteImage($deleting_image_name);

            return $image_name;
        }

        return false;
    }
}