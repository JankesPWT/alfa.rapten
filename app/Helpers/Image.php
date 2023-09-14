<?php
//TODO można by zrobić tak, żeby używało createThumbnail również do konwetsji
namespace App\Helpers;

// STORAGE_PATH = E:\pwtsoftware\blank_project\public/../storage/

class Image
{

    public array $file; // $_FILES
    public string $filePath;
    public string $tmpPath;
    public string $model;

    public int $width;
    public int $height;
    public int $type;
    public int $id;
    public array $errors = [];
    
    public function __construct($file, $model = null)
    {
        $this->file = $file;
        $this->model = $model;
        
        $this->tmpPath = $file['image']['tmp_name'];
        $this->filePath = STORAGE_PATH . "/{$model}/" . $file['image']['name'];
        list($this->width, $this->height, $this->type, $attr) = getimagesize($this->tmpPath);
        echo 'images';
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function move()
    {
        return move_uploaded_file($this->tmpPath, $this->filePath);
    }

    public function getNewFilePath()
    {
        return $newFilePath =  STORAGE_PATH . '/' . $this->model . '/' . $this->id . ".jpg";
    }

    public function getThumbsPath($width)
    {
        if ($width === 200) {
            return STORAGE_PATH . '/' . $this->model . '/thumbs/' . $this->id . ".jpg";
        } else {
            return STORAGE_PATH . '/' . $this->model . '/thumbs/' . $this->id . "_" . $width . ".jpg";
        }
    }

    // walidacja typu i rozmiaru zdjecia
    public function validation()
    {
        if ((!empty($this->file['image']['name'])) && ($this->file['image']['error'] == 0)) {
            
            if ($this->type > 3) {
                $this->errors['image_format'] = 'Zdjęcia w formacie .jpg, .png albo .gif.';
                unlink($this->tmpPath);
                return false;
                
            } elseif ($this->file['image']['size'] > 512000) {
                $this->errors['image_size'] = 'Nie no tyle to nie... Max. 0,5MB.';
                unlink($this->tmpPath);
                return false;
            }
        
        } else {
            $this->errors['image_other'] = 'Coś nie zagrało, ale sami nie wiemy co...';
            return false;
        }

        return true;
    }
    
    public function afterInputImageHandler($id)
    {
        $this->move();
        $this->setId($id);
        $this->konwersja();

        $src = $this->getNewFilePath();
        $dst = $this->getThumbsPath(200);
        
        $this->createThumbnail($src, $dst, 200 );
        
        $dst = $this->getThumbsPath(128);
        $this->createThumbnail($src, $dst, 128 );

        return true;
    }

    //konwersja musi być już po dodaniu rekordu do bazy, bo potrzebuje ID // w sumie nie musi, bo przecież samą nazwę można później zmienić
    public function konwersja()
    {
        switch ($this->type) {
            case 2:
                rename($this->filePath, $this->getNewFilePath());
                break;
            case 1:
                $this->giftojpg($this->filePath, $this->getNewFilePath());
                break;
            case 3:
                $this->pngtojpg($this->filePath, $this->getNewFilePath());
                break;
            default:
                # code...
                break;
        }

        /*unlink($this->filePath);*/
    }

    #CHATGPT
    public function pngtojpg($source, $destination)
    {
        // Create a new image from the PNG file
        $sourceImage = imagecreatefrompng($source);

        // Create a blank JPG image with the same dimensions as the source image
        $jpgImage = imagecreatetruecolor(imagesx($sourceImage), imagesy($sourceImage));

        // Fill the blank image with white color (optional step, in case the PNG has transparency)
        $whiteColor = imagecolorallocate($jpgImage, 255, 255, 255);
        imagefill($jpgImage, 0, 0, $whiteColor);

        // Copy the PNG image onto the JPG image
        imagecopy($jpgImage, $sourceImage, 0, 0, 0, 0, imagesx($sourceImage), imagesy($sourceImage));

        // Save the JPG image to a file
        imagejpeg($jpgImage, $destination, 100);

        // Free up memory by destroying the image resources
        imagedestroy($sourceImage);
        imagedestroy($jpgImage);
        unlink($this->filePath);
    }

    #CHATGPT
    public function giftojpg($source, $destination)
    {
        // Create a new image from the GIF file
        $sourceImage = imagecreatefromgif($source);

        // Create a blank JPG image with the same dimensions as the source image
        $jpgImage = imagecreatetruecolor(imagesx($sourceImage), imagesy($sourceImage));

        // Fill the blank image with white color (optional step, in case the GIF has transparency)
        $whiteColor = imagecolorallocate($jpgImage, 255, 255, 255);
        imagefill($jpgImage, 0, 0, $whiteColor);

        // Copy the GIF image onto the JPG image
        imagecopy($jpgImage, $sourceImage, 0, 0, 0, 0, imagesx($sourceImage), imagesy($sourceImage));

        // Save the JPG image to a file
        imagejpeg($jpgImage, $destination, 100);

        // Free up memory by destroying the image resources
        imagedestroy($sourceImage);
        imagedestroy($jpgImage);
        unlink($this->filePath);
    }

    // Link image type to correct image loader and saver
    // - makes it easier to add additional types later on
    // - makes the function easier to read
    const IMAGE_HANDLERS = [
        IMAGETYPE_JPEG => [
            'load' => 'imagecreatefromjpeg',
            'save' => 'imagejpeg',
            'quality' => 100
        ],
        IMAGETYPE_PNG => [
            'load' => 'imagecreatefrompng',
            'save' => 'imagepng',
            'quality' => 0
        ],
        IMAGETYPE_GIF => [
            'load' => 'imagecreatefromgif',
            'save' => 'imagegif'
        ]
    ];

    /**
     * @param $src - a valid file location
     * @param $dest - a valid file target
     * @param $targetWidth - desired output width
     * @param $targetHeight - desired output height or null
     */
    public function createThumbnail($src, $dest, $targetWidth, $targetHeight = null)
    {

        // 1. Load the image from the given $src
        // - see if the file actually exists
        // - check if it's of a valid image type
        // - load the image resource

        // get the type of the image
        // we need the type to determine the correct loader
        $type = exif_imagetype($src);

        // if no valid type or no handler found -> exit
        if (!$type || !self::IMAGE_HANDLERS[$type]) {
            return null;
        }

        // load the image with the correct loader
        $image = call_user_func(self::IMAGE_HANDLERS[$type]['load'], $src);

        // no image found at supplied location -> exit
        if (!$image) {
            return null;
        }

        // 2. Create a thumbnail and resize the loaded $image
        // - get the image dimensions
        // - define the output size appropriately
        // - create a thumbnail based on that size
        // - set alpha transparency for GIFs and PNGs
        // - draw the final thumbnail

        // get original image width and height
        $width = imagesx($image);
        $height = imagesy($image);

        // maintain aspect ratio when no height set
        if ($targetHeight == null) {

            // get width to height ratio
            $ratio = $width / $height;

            // if is portrait
            // use ratio to scale height to fit in square
            if ($width > $height) {
                $targetHeight = floor($targetWidth / $ratio);
            }
            // if is landscape
            // use ratio to scale width to fit in square
            else {
                $targetHeight = $targetWidth;
                $targetWidth = floor($targetWidth * $ratio);
            }
        }

        // create duplicate image based on calculated target size
        $thumbnail = imagecreatetruecolor($targetWidth, $targetHeight);

        // set transparency options for GIFs and PNGs
        if ($type == IMAGETYPE_GIF || $type == IMAGETYPE_PNG) {

            // make image transparent
            imagecolortransparent(
                $thumbnail,
                imagecolorallocate($thumbnail, 0, 0, 0)
            );

            // additional settings for PNGs
            if ($type == IMAGETYPE_PNG) {
                imagealphablending($thumbnail, false);
                imagesavealpha($thumbnail, true);
            }
        }

        // copy entire source image to duplicate image and resize
        imagecopyresampled(
            $thumbnail,
            $image,
            0,
            0,
            0,
            0,
            $targetWidth,
            $targetHeight,
            $width,
            $height
        );

        // 3. Save the $thumbnail to disk
        // - call the correct save method
        // - set the correct quality level

        // save the duplicate version of the image to disk
        return call_user_func(
            self::IMAGE_HANDLERS[$type]['save'],
            $thumbnail,
            $dest,
            self::IMAGE_HANDLERS[$type]['quality']
        );
    }
}
