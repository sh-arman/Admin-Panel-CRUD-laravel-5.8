@extends('admin.layout')

@section('title','Dashboard')

@section('content')

  <div id="layoutSidenav_content"><div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    <div class="row">
      <div class="col-xl-3 col-md-6">
      <div class="card bg-primary text-white mb-4">
        <a href="{{ route('admin.dashboard') }}">
          <div class="card-body text-white">Posts</div>
        </a>
        <div class="card-header">{{ $posts->count() }}</div>
      </div>
      </div>

      <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
          <a href="{{ route('admin.category') }}">
            <div class="card-body text-white">Categories</div>
          </a>
          <div class="card-header">{{ $category->count() }}</div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
          <a href="{{ route('admin.tag') }}">
            <div class="card-body text-white">Tags</div>
          </a>
          <div class="card-header">{{ $tags->count() }}</div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6">
          <div class="card bg-danger text-white mb-4">
            <a href="{{ route('admin.post/trashed') }}">
              <div class="card-body text-white">Trash Posts</div>
            </a>
            {{-- <div class="card-header">{{ $category->count() }}</div> --}}
          </div>
      </div>
    </div>

    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>All Posts</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Tags</th>
                            <th>content</th>
                            <th>Edit</th>
                            <th>Trashed</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td style="width:150px;
                                          height:100px;
                                          padding:3px;">
                                          <img src="{{ asset($post->image) }}" alt="" style="width:100%; height:100%;">
                                </td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td>
                                  @foreach($tags as $tag)
                                    @foreach($post->tags as $t)
                                      @if($tag->id == $t->id)
                                        <p class="card bg-success text-white mb-4"
                                        style="display:inline-block; padding:1px; margin: 1px;">
                                        {{ $tag->tag }}</p>
                                      @endif
                                    @endforeach
                                  @endforeach
                                </td>
                                <td><a href="#">View Post</a> </td>
                                <td class=""><a href="{{ route('admin.post/edit',['id' => $post->id]) }}"><i class="fas fa-pencil-alt"></i></a></td>
                                <td class=""><a href="{{ route('admin.post/trash',['id' => $post->id]) }}"><i class="far fa-trash-alt"></i></a></td>
                                <td class=""><a class="btn btn-danger" href="{{ route('admin.post/forcedelete',['id' => $post->id]) }}">Delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
            </div>
        </div>
    </div> --}}

</div>
</main>

@endsection
