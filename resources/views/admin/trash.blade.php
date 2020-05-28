@extends('admin.layout')

@section('title','Trashed')

@section('content')

  <div id="layoutSidenav_content"><div class="container-fluid">
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Trashed Posts</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>content</th>
                            <th>Restore</th>
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
                              <td>
                                @if(empty($post->category))
                                  {{ $post->category_id }}
                                @else
                                  @foreach($categories as $category)
                                    @if($post->category_id === $category->id)
                                      {{ $category->name }}
                                    @endif
                                  @endforeach
                                @endif
                              </td>
                            <td><a href="#">View Post</a> </td>
                            <td class=""><a class="btn btn-success" href="{{ route('admin.post/restore',['id' => $post->id]) }}">Restore</a> </td>
                            <td class=""><a class="btn btn-danger" href="{{ route('admin.post/forcedelete',['id' => $post->id]) }}">Delete</a> </td>
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
