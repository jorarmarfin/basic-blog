<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use Auth;

use Styde\Html\Facades\Alert;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
    	$posts = Post::paginate();
    	return view('post/list',compact('posts'));
    }

    public function edit($id)
    {
    	Auth::loginUsingId(1);

		$post = Post::findOrFail($id);
		// allow o denies
		if (Gate::denies('update-post',$post)) {

			Alert::danger('No tienes permisos para editar este post');

			return redirect('posts');
		}
		return $post->title;
    }



}
