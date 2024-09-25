<?php

namespace KSolutions\VideoToThumb;

use FFMpeg\FFMpeg;
use FFMpeg\Coordinate\TimeCode;

class VideoToThumb
{
    protected $ffmpeg;

    public function __construct()
    {
        // Initialize FFMpeg for video processing
        $this->ffmpeg = FFMpeg::create();
    }

    /**
     * Generate a thumbnail from a video.
     *
     * @param string $videoPath Path to the video file.
     * @param string $thumbnailPath Path to save the thumbnail.
     * @param int $second The time in seconds to capture the thumbnail.
     * @return bool
     */
    public function generateVideoThumbnail($videoPath, $thumbnailPath, $second = 1)
    {
        try {
            $video = $this->ffmpeg->open($videoPath);
            $video->frame(TimeCode::fromSeconds($second))->save($thumbnailPath);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Generate a thumbnail from an image.
     *
     * @param string $imagePath Path to the image file.
     * @param string $thumbnailPath Path to save the thumbnail.
     * @param int $width Width of the thumbnail.
     * @param int $height Height of the thumbnail.
     * @return bool
     */
    public function generateImageThumbnail($imagePath, $thumbnailPath, $width, $height)
    {
        try {
            $image = imagecreatefromstring(file_get_contents($imagePath));
            $thumbnail = imagescale($image, $width, $height);
            imagejpeg($thumbnail, $thumbnailPath);
            imagedestroy($image);
            imagedestroy($thumbnail);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
