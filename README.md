# videotothumbbyks
videotothumbbyks

This package is created by Khemraj Sharma
if you have any Queries then Please contact me at captainjacksparrow295@gmail.com


Step ---1 ----
Install this package 

composer require ksolutions/videotothumbbyks



Step ---2 ----

sudo apt update

sudo apt install ffmpeg

Step ---3 ----

In your Controller 

use KSolutions\VideoToThumb\VideoToThumb;

public function uploadVideo(Request $request)

{

    try {

        if (!$request->hasFile('video')) {

            return response()->json(['status' => 'failed', 'message' => 'No video file uploaded']);

        }

        $file = $request->file('video');

        $videoPath = $file->storeAs('public/videos', 'sample.mp4');

        $videoFullPath = storage_path('app/' . $videoPath);

        $thumbnailPath = storage_path('app/public/thumbnails/sample-thumbnail.jpg');

        $videoToThumb = new VideoToThumb();

        $result = $videoToThumb->generateVideoThumbnail($videoFullPath, $thumbnailPath, 5);

        if ($result) {

            return response()->json(['status' => 'success', 'message' => 'Thumbnail generated successfully', 'thumbnail' => $thumbnailPath]);

        } else {

            return response()->json(['status' => 'failed', 'message' => 'Thumbnail generation failed']);

        }

    } catch (Exception $e) {

        return response()->json(['status' => 'error', 'message' => $e->getMessage()]);

    }

}
