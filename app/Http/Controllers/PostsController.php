<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        echo $posts;
       //dd($posts)  ;
       //return view('posts.index',compact('posts'));
    }

    /**
    **/
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $file = $request->file('file'); 
        // echo "<br>";
        // echo $file-> getClientOriginalName();//returns file name
        // echo "<br>";
        // echo $file->getClientSize();//get file size to validate it
        
        $input = $request->all();
        $file = $request->file('uploadfile');
        //return $file;
        //return $input;
        if($file = $request->file('file')){
            $name = $file->getClientOriginalName();
            $file->move('images' , $name);
            $input['path'] = $name;
           // echo $input['path'];
        }
        
        Post::create($input);
        
        //return 
        //returns all inputs
        //return $request->all();

        //return $request->get('title');
        //or:
       // return $request->title;
       //insert in db:

       //simple validate
    //     $this->validate($request,[

    //         'title'=>'required|max:50',
            

    //     ]);
    //    Post::create($request->all());

    //    return redirect('posts');
       //or:

        // $post = new Post;
        // $post->title = $request->title;
        // $post->save();

        //or:
        // $input = $request->all();
        // $input['title'] = $request->title;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     
        $post = Post::findOrFail($id);
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
       return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        // $post->title = $request ->title;
        // $post->save();

        //Or
        //not working
        $post->update($request->all());
        //cant use dot notation with redirect function
        return redirect('posts/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $post = Post::findOrFail($id);
        $post->delete();
        //or
        //$post->whereId($id)->delete();
       // return redirect('/posts');
    }

    // Custom controller, returns a view.
    public function contact()
    {
        //$people = ['Edwin', 'Jose', 'James', 'Peter', 'Maria'];
        $people = [];

        return view('contact', compact('people'));
    }

    // View with variables.
    // public function show_post($id, $name, $password)
    // {
    //     //return view('post')->with('id', $id);
    //     //return view('post', compact('id'));
    //     //return view('post', ['id' => $id]);
    //     return view('post', compact('id', 'name', 'password'));

    // }
}

