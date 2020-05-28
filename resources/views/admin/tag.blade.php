@extends('admin.layout')

@section('title','Tags')

@section('content')

  <div id="layoutSidenav_content"><div class="container-fluid">
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Tags</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tag</th>
                            <th style="width:100px; text-align:center;">Edit</th>
                            <th style="width:100px; text-align:center;">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tag as $tag)
                          <tr>
                              <td>{{ $tag->tag }}</td>
                              <td class="md-0"><a href="{{ route('admin.tag/edit',['id' => $tag->id]) }}"><i class="fas fa-pencil-alt"></i></a></td>
                              <td class=""><a href="{{ route('admin.tag/delete',['id' => $tag->id]) }}"><i class="far fa-trash-alt"></i></a> </td>
                          </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</main>

@endsection
