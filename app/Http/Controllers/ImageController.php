<?php

namespace App\Http\Controllers;

use App\Models\ImagesUser;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{

    /**
     * Generate a thumbnail for a given image
     *
     * @param $image_src
     * @param bool $width
     * @param bool $height
     * @param int $quality
     */
    public function generateThumbnail($image_src, $width = false, $height = false, $quality = 90)
    {
        $img = Image::make('public/foo.jpg');

        $img->resize(320, 240);

        $img->insert('public/watermark.png');

        $img->save('public/bar.jpg');
    }

    public function addImg(Request $request, $id){
      
        $img = new ImagesUser();
        if($file = $request->hasFile('image')) {
            

            $file = $request->file('image') ;

            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/assets/imgUsers/' ;
            $file->move($destinationPath,$fileName);
            $img->image = '/assets/imgUsers/'.$fileName ;
        }
        $img->id_registration = $id;
        
        $img->save();
        return response()->json($img);
    }


    public function updateImg(Request $request, $id){
        if($file = $request->hasFile('image')) {
            
            $img = new ImagesUser();
            $file = $request->file('image') ;

            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/assets/imgUsers/' ;
            $file->move($destinationPath,$fileName);
            $img->image = '/assets/imgUsers/'.$fileName ;
            $data=ImagesUser::where('id_registration', $id)->update(['image' => $img->image]);
        }
        
        
        
        
        
        if($data){
            return Response::json([
                'message'=>'Data user updated',
                'status'=>'1',
                ]
            );
            }else{
            return Response::json([
                'message'=>'this user does not exist',
                'status'=>'0',
                ]
            );
            }
    }
}
