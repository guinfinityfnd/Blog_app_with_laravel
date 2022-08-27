<?php

namespace App\Http\Controllers;

use App\Events\PostCreatedEvent;
use App\Models\Post;
use App\Models\User;
use App\Mail\PostStored;
use App\Models\Category;
use App\Mail\PostCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PostCreatedNotification;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            // $data = Post::all();
            // dd(config('ap.info.second'));
            // $user = User::find(1);
            // $user->notify(new PostCreatedNotification);
            // echo "noti sent";exit();   
            $data = Post::where('user_id',auth()->id())->orderBy('id','desc')->get();
            // Notification::send(User::find(1), new PostCreatedNotification());         
            return view('home',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        // $post = new Post();
        // $post->name = $request->name;
        // $post->description = $request->text;

        // $post->save();
        $validated = $request->validated();
        // dd($validated);
        $post = post::create($validated + ['user_id'=>Auth::user()->id]);

        event(new PostCreatedEvent($post));
        return redirect('/posts')->with('status', config('ap.message.created'));

        //    [ 'name' => $request->name,
            // 'description' => $request->text,
            // 'category_id' => $request->category,]        
        // return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // $post = Post::findOrFail($id);

        return view('show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // $post = Post::findOrFail($id);
        $categories = Category::all();

        return view('edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request,Post $post)
    {
        // $post = Post::findOrFail($id);
        // $request->validate([
        //     'name' => 'required|unique:posts|max:255',
        //     'description' => 'required|max:255',
        // ]);
        $validated = $request->validated();

        $post->update($validated);
        
        return redirect('/posts')->with('status',config('ap.message.edited'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts')->with('status',config('ap.message.deleted'));
    }
}
