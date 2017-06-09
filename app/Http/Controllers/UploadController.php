<?php
namespace App\Http\Controllers;

//use Illuminate\Support\Facades\Request;
use App\Http\Requests\Product\UploadProductRequest;
use App\ProductPhoto;
use Intervention\Image\ImageManager;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload()
    {
        return view('upload');
    }

    public function uploadHandl(UploadProductRequest $request)
    {
        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $originalNameWithoutExt = substr($originalName, 0, strlen($originalName) - strlen($extension) -1);
        $filename = $this->sanitize($originalNameWithoutExt);
        $allowed_filename = $this->createUniqueFilename( $filename, $extension );
        $uploadSuccess = $this->move( $file, $allowed_filename );
        if(!$uploadSuccess) {
            return response()->json([
                                    'error' => true,
                                    'code' => 500
                               ],500);
        }
        $productPhoto = ProductPhoto::create([
            'filename' => $allowed_filename
        ]);
        $request->session()->push('images.id',$productPhoto->id);
        return response()->json(['error'=> false, 'code' => 200], 200);

    }

    function sanitize($string, $force_lowercase = true, $anal = false)
    {
        $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
            "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
            "â€”", "â€“", ",", "<", ".", ">", "/", "?");
        $clean = trim(str_replace($strip, "", strip_tags($string)));
        $clean = preg_replace('/\s+/', "-", $clean);
        $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;

        return ($force_lowercase) ?
            (function_exists('mb_strtolower')) ?
                mb_strtolower($clean, 'UTF-8') :
                strtolower($clean) :
            $clean;
    }

    public function createUniqueFilename( $filename, $extension )
    {
        $full_size_dir = storage_path('app/img');
        $full_image_path = $full_size_dir . $filename . '.' . $extension;

        if ( file_exists( $full_image_path ) )
        {
            // Generate token for image
            $imageToken = substr(sha1(mt_rand()), 0, 5);
            return $filename . '-' . $imageToken . '.' . $extension;
        }

        return $filename . '.' . $extension;
    }

    public function move( $photo, $filename )
    {
        $manager = new ImageManager();
        $image = $manager->make( $photo )->save(storage_path('app/img') . $filename );
        return $image;
    }
}