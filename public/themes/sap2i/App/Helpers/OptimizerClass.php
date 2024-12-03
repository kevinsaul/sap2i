<?php

namespace App\Helpers;

/**
 * Optimisation des images
 */
class OptimizerClass
{
    public function __construct()
    {
        add_filter('wp_handle_upload_prefilter', array($this, 'custom_upload_filter'));
        add_filter('wp_save_image_editor_file', array($this, 'custom_wp_save_image_editor_file'), 10, 5);
    }

    /*
     * Optimisation de l'image à l'upload
     * ---------------------------------------
     */
    public function custom_upload_filter($file)
    {
        $file['name'] = sanitize($file['name']);
        $type = $file['type'];

        if (($type == "image/jpeg") || ($type == "image/png")) {
            $this->imageOptimization($file['tmp_name']);
        }
        return $file;
    }

    /*
     * Optimisation de l'image après modification de l'image
     * ------------------------------------------------------
     */
    public function custom_wp_save_image_editor_file($override, $filename, $image, $mime_type, $post_id)
    {
        $file = explode('wp-content', $filename);
        if (!empty($file) && isset($file[1])) {
            $filePath = '../wp-content' . $file[1];
            $image->save($filePath, $mime_type);
            $this->imageOptimization($filePath);
        }
        return $filePath;
    }

    /*
     * Optimise une image
     * @filePath est le chemin d'accès à l'image
     * ------------------------------------------
     */
    public function imageOptimization($filePath)
    {
        $optimizer = \Spatie\ImageOptimizer\OptimizerChainFactory::create();
        $optimizer->addOptimizer(new \Spatie\ImageOptimizer\Optimizers\Jpegoptim([
            //'-m85',
            '--strip-all',
            '--all-progressive',
        ]))
            ->addOptimizer(new \Spatie\ImageOptimizer\Optimizers\Pngquant([
                '--force',
            ]))
            ->optimize($filePath);

        chmod($filePath, 0644);
    }

    /*
     * Redimensionne et optimise une image
     * @imagePath est le chemin d'accès à l'image
     * @width est la largeur désirée
     * @height est la hauteur désirée
     * -------------------------------------------
     */
    public function useResize($imagePath, $width, $height = null, $webp = false)
    {
        $wpUrl = get_bloginfo('url');
        $uploadDir = wp_upload_dir();
        $imgSave = $imagePath;
        $pathInfo = pathinfo($imagePath);
        $extension = $pathInfo['extension'];
        $imageName = $pathInfo['filename'];
        $imageCachePath = '/cache/' . $imageName . '-rz-' . $width . 'x' . $height . '.' . $extension;

        if ($extension == 'gif') {
            return $imgSave;
        }

        if (strpos($imagePath, $wpUrl) !== false) {
            $imagePath = str_replace($wpUrl . '/', ABSPATH . '../', $imagePath);
        }

        $filePath = $uploadDir['basedir'].$imageCachePath;
        if (!file_exists($filePath)) {
            $image = wp_get_image_editor($imagePath);
            if (!is_wp_error($image)) {
                if (!is_null($height)) {
                    $image->resize((int) $width, (int) $height, ['center', 'center']);
                } else {
                    $image->resize((int) $width, null);
                }

                $image->save($uploadDir['basedir'] . $imageCachePath);

                $this->imageOptimization($uploadDir['basedir'] . $imageCachePath);
            } else {
                return $imgSave;
            }
        } elseif ($webp) {
            return $this->convertToWebp($filePath);
        }

        return $uploadDir['baseurl'] . $imageCachePath;
    }

    /**
     * Convert image attachment to Webp
     *
     * @filePath path absolut de l'image
     */
    private function convertToWebp($filePath)
    {
        $upload = wp_upload_dir();

        $dir = dirname($filePath);
        $fileInfo = pathinfo($filePath);
        $extension = $fileInfo['extension'];
        $fileName = $fileInfo['filename'].'.webp';
        $destination = $dir.'/'.$fileName;
        
        if (!file_exists($destination)) {
            if ($extension == 'jpeg' || $extension == 'jpg') {
                $image = imagecreatefromjpeg($filePath);
            } elseif ($extension == 'gif') {
                $image = imagecreatefromgif($filePath);
            } elseif ($extension == 'png') {
                $image = imagecreatefrompng($filePath);
                imagepalettetotruecolor($image);
                imagealphablending($image, true);
                imagesavealpha($image, true);
            }
            
            imagewebp($image, $destination, 80);
            imagedestroy($image);
        }
        
        $dir = str_replace($upload['basedir'].'/', '', $dir);
        $result = $upload['baseurl'].'/'.$dir.'/'.$fileName;
        return $result;
    }
}