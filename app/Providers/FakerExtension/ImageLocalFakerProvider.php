<?php

namespace App\Providers\FakerExtension;

use Exception;
use Faker\Provider\Base;

class ImageLocalFakerProvider extends Base
{

    /**
     * @throws Exception
     */
    public function copyRandomImage($src_dir, $dst_dir, $only_name = false): string
    {
        if (!is_dir($src_dir)) {
            throw new Exception("Source directory does not exist");
        }
        if (!is_readable($src_dir)) {
            throw new Exception("Source directory is not readable");
        }
        $images = array_filter(scandir($src_dir), function ($file) {
            return in_array(pathinfo($file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']);
        });
        if (empty($images)) {
            throw new Exception("No images found in source directory");
        }
        $src_file = $src_dir . '/' . $images[array_rand($images)];
        $dst_file = $dst_dir . '/' . substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyz', 10)), 0, 10) . '.' . pathinfo($src_file, PATHINFO_EXTENSION);
        $directories = explode('/', $dst_file);
        array_pop($directories);
        $path = '';
        foreach ($directories as $directory) {
            $path .= '/' . $directory;
            if (!is_dir($path)) {
                mkdir($path);
            }
        }
        copy($src_file, $dst_file);
        return $only_name ? basename($dst_file) : $dst_file;
    }
}
