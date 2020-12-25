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


    public function updateImg(Request $request, $id){

        $time=date('Y-m-d-H-i-s');
        $res = DB::select('select * from img_registration where id_registration =:id', ['id' => $id]);
        if($res){
            if($file = $request->hasFile('image')) {
                
                $img = new ImagesUser();
                $file = $request->file('image') ;

                $fN = $file->getClientOriginalName() ;
                $fileName = $time."_".$fN ;
                
                $destinationPath = public_path().'/assets/imgUsers/' ;
                $file->move($destinationPath,$fileName);
                $img->image = '/assets/imgUsers/'.$fileName ;
                ImagesUser::where('id_registration', $id)->update(['image' => $img->image]);
            }
            return Response::json([
                'message'=>'Image user updated',
                'status'=>'1',
                ]
            );
        
        }else{
            $img = new ImagesUser();
            if($file = $request->hasFile('image')) {
                $file = $request->file('image') ;
                $fN = $file->getClientOriginalName() ;
                $fileName = $time."_".$fN ;
                $destinationPath = public_path().'/assets/imgUsers/' ;
                $file->move($destinationPath,$fileName);
                $img->image = '/assets/imgUsers/'.$fileName ;
            }
            $img->id_registration = $id;
            
            $img->save();

            return Response::json([
                'message'=>'Image user added',
                'status'=>'2',
                ]
            );
        }
        
    }
}
