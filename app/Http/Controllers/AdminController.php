<?php
namespace App\Http\Controllers;
use Session;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }

    // Dashboard
    public function dashboard()
    {
      $post = Post::latest()->get();
      return view('admin.dashboard')->with('posts',$post )
                                    ->with('category', Category::all())
                                    ->with('tags', Tag::all());
    }

    // =============== POST =============== //
    // Post Create
    public function post_create()
    {
      $categories = Category::all();
      if($categories->count() == 0)
      {
        Session::flash('info','You must have some Categories to create a post');
        return redirect()->back();
      }
      else
      {
        return view('admin.create-post')->with('tags', Tag::all())
                                        ->with('categories', Category::all());
      }
    }

    // Post Store
    public function post_store(Request $request)
    {
      // dd($request);
      $this->validate($request,[
        'title'=>'required|max:255',
        'image'=>'image',
        'category_id'=>'required',
        'content'=>'required'
      ]);

      if($request->hasFile('image')){
        $image = $request->image;
        $image_new_name = time().$image->getClientOriginalName();
        $image->move('upload/post/',$image_new_name);

        $post = Post::create([
          'title'=> $request->title,
          'slug'=> str_slug($request->title),
          'image' => 'upload/post/' . $image_new_name,
          'category_id' => $request->category_id,
          'content' => $request->content
        ]);

        $post->tags()->attach($request->tag);

      }else{
        $post = Post::create([
          'title'=> $request->title,
          'slug'=> str_slug($request->title),
          'category_id' => $request->category_id,
          'content' => $request->content
        ]);

        $post->tags()->attach($request->tag);

      }

      Session::flash('success','Post Successfully Created.');
      return back();
    }

    // Post Edit
    public function post_edit($id)
    {
      $post = Post::findOrFail($id);
      return view('admin.edit-post')->with('post', $post)
                                    ->with('tags', Tag::all())
                                    ->with('categories', Category::all());
    }

    // Post Update
    public function post_update(Request $request, $id)
    {
      $post = Post::findOrFail($id);

      $this->validate($request,[
        'title'  => 'required|min:4|max:255',
        'category_id' => 'required',
        'content' => 'required'
      ]);

      if($request->hasFile('image')){
        $image = $request->image;
        $image_new_name = time().$image->getClientOriginalName();
        $image->move('upload/post/',$image_new_name);

        $post->image = 'upload/post/' . $image_new_name;
      }

      $post->title = $request->title;
      $post->content = $request->content;
      $post->category_id = $request->category_id;
      $post->tags()->sync($request->tag);
      $post->save();

      Session::flash('success','Post has been updated!');
      return redirect()->route('admin.dashboard');
    }

    // Post trash
    public function post_trash($id)
    {
      $post = Post::findOrFail($id);
      $post->delete();
      return back();
    }

    // Post trashed
    public function post_trashed()
    {
      $posts = Post::onlyTrashed()->latest()->get();
      return view('admin.trash')->with('posts', $posts)->with('categories', Category::all());
    }

    // Post Force Delete
    public function post_forcedelete($id)
    {
      $post = Post::withTrashed()->where('id',$id)->first();
      $post->forcedelete();
      Session::flash('success','Post has deleted!');

      return back();
    }

    // Post restore
    public function post_restore($id)
    {
      $post = Post::withTrashed()->where('id',$id)->first();
      $post->restore();
      Session::flash('info','Post has been Restore!');

      return back();
    }


    // ============== CATEGORY ============= //
    

    // ============== Tag ============= //
    //Tag View
    public function tag()
    {
      return view('admin.tag')->with('tag', Tag::latest()->get());
    }

    // Tag Create
    public function tag_create()
    {
      return view('admin.create-tag');
    }

    // Tsg Store
    public function tag_store(Request $request)
    {
      $this->validate($request,[
        'tag'=> 'required'
      ]);

      $tag = new Tag;
      $tag->tag = $request->tag;
      $tag->save();

      Session::flash('success','Tag has created!');
      return back();
    }

    // Tag Edit
    public function tag_edit($id)
    {
      $tag = Tag::find($id);
      return view('admin.edit-tag')->with('tag',$tag);
    }

    // Tag Update
    public function tag_update(Request $request, $id)
    {
      $tag = Tag::findOrFail($id);
      $tag->tag = $request->tag;
      $tag->save();
      Session::flash('success','Tag has been updated!');

      return redirect()->route('admin.tag');
    }

    // tag Delete
    public function tag_delete($id)
    {
      $tag = Tag::find($id);
      $tag->delete();
      Session::flash('success','Tag has deleted!');

      return back();
    }
}
