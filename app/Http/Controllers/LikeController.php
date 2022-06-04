<?php

namespace App\Http\Controllers;

use App\Models\like;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function Like($id){
        like::create(['foto_id' => $id,'user_id'=>Auth::user()->id]);
        return redirect()->route('fotoShow',$id);
    }

    public function DisLike($id){
        $like = like::find($id);
        $return = $like->foto_id;
        $like->delete();
       
        return redirect()->route("fotoShow",$return);
    }

    public function LikeCount($id){
        $like = like::where('foto_id',$id)->count();
        return $like;
    }

    public function UserLikeList(){
        $like = like::where('user_id',Auth::user()->id)->get();
        return view('post.liked',compact('like'));
    }


}
