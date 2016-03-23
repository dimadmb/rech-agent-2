<?php

namespace BaseBundle\Controller\Helper;
use Symfony\Component\Filesystem\Filesystem;

class ImageResizer {

    /**
     * Resize an image
     *
     * @param string $image (The full image path with filename and extension)
     * @param string $newPath (The new path to where the image needs to be stored)
     * @param int $height (The new height to resize the image to)
     * @param int $width (The new width to resize the image to)
     * @return string (The new path to the reized image)
     */
    public function resizeImage($image, $newPath, $width=0, $height=0 ){

        // Get current dimensions
        $ImageDetails = $this->getImageDetails($image);
        $name = $ImageDetails->name;
        $height_orig = $ImageDetails->height;
        $width_orig = $ImageDetails->width;
        $fileExtention = $ImageDetails->extension;
        $ratio = $ImageDetails->ratio;
        $jpegQuality = 75;

		if($width_orig/$height_orig > $width/$height)
		{
			// высота нормальная, ширину урезаем
			$height_temp = $height;
			$width_temp = $width_orig/$height_orig*$height;
			$dy = 0;
			$dx = ($width_temp - $width)/2;
		} 
		else
		{
			$width_temp = $width;
			$height_temp = $height_orig/$width_orig*$width;
			$dx = 0;
			$dy = ($height_temp - $height)/2;
		};	

        $gd_image_dest = imagecreatetruecolor($width, $height);
        $gd_image_src = null;
        switch( $fileExtention ){
            case 'png' :
                $gd_image_src = imagecreatefrompng($image);
                imagealphablending( $gd_image_dest, false );
                imagesavealpha( $gd_image_dest, true );
                break;
            case 'jpeg': case 'jpg': $gd_image_src = imagecreatefromjpeg($image); 
                break;
            case 'gif' : $gd_image_src = imagecreatefromgif($image); 
                break;
            default: break;
        }

       // imagecopyresampled($gd_image_dest, $gd_image_src, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
        imagecopyresampled($gd_image_dest, $gd_image_src, 0, 0, $dx, $dy, $width_temp, $height_temp, $width_orig, $height_orig);

        $filesystem = new Filesystem();
        $filesystem->mkdir($newPath, 0744); 
        $newFileName = $newPath . $name . "." . $fileExtention;

        switch( $fileExtention ){
            case 'png' : imagepng($gd_image_dest, $newFileName); break;
            case 'jpeg' : case 'jpg' : imagejpeg($gd_image_dest, $newFileName, $jpegQuality); break;
            case 'gif' : imagegif($gd_image_dest, $newFileName); break;
            default: break;
        }

        return $name . "." . $fileExtention;
    }

    /**
     *
     * Gets image details such as the extension, sizes and filename and returns them as a standard object.
     *
     * @param $imageWithPath
     * @return \stdClass
     */
    private function getImageDetails($imageWithPath){
        $size = getimagesize($imageWithPath);

        $imgParts = explode("/",$imageWithPath);
        $lastPart = $imgParts[count($imgParts)-1];

        if(stristr("?",$lastPart)){
            $lastPart = substr($lastPart,0,stripos("?",$lastPart));
        }
        if(stristr("#",$lastPart)){
            $lastPart = substr($lastPart,0,stripos("#",$lastPart));
        }

        $dotPos     = stripos($lastPart,".");
        $name         = substr($lastPart,0,$dotPos);
        $extension     = substr($lastPart,$dotPos+1);

        $Details = new \stdClass();
        $Details->height    = $size[1];
        $Details->width        = $size[0];
        $Details->ratio        = $size[0] / $size[1];
        $Details->extension = $extension;
        $Details->name         = $name;

        return $Details;
    }
}
?>