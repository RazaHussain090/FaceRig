<?php
namespace App\Http\Controllers;
//_______________________________________________________________________________

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Post;
use AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

//_______________________________________________________________________________

class PostController extends Controller
{
  public function getDashboard ()
  {
    $posts = Post::orderBy('created_at','desc')->get();
    return view('dashboard',['posts' => $posts]);
  }

  public function postCreatePost(Request $request)
  {
    //validation
    $this->validate($request,[
      'body' => 'required|max:1000'
    ]);
    $post = new Post();
    $post->body = $request['body'];
    $message = 'There was an error';
    if($request->user()->posts()->save($post)){
      $message = 'Post Sucessfully';
    }

    return redirect()->route('dashboard')->with(['message'=> $message]);
  }
  public function getDeletePost($post_id) {
    $post = Post::where('id',$post_id)->first();
    if (Auth::user() != $post->user){
      return redirect()->back();
    }
    $post->delete();

    return redirect()->route('dashboard')->with(['message'=> 'Successfully deleted']);

  }
  public function postEditPost(Request $request)
  {
    $this->validate($request,[
      'body' => 'required'
    ]);
    $post = Post::find($request['postId']);
    if (Auth::user() != $post->user){
      return redirect()->back();
    }
    $post->body = $request['body'];
    $post->update();
    return response()->json(['new_body'=> $post->body],200);
  }
}

?>
