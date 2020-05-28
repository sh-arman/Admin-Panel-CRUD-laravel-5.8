@extends('admin.layout')

@section('title','Create Category')

@section('content')

<div id="layoutSidenav_content"><div class="container-fluid">
  <h1 class="mt-4">Edit Category</h1>
  <div class="row ml-2">
    <div class="card col-sm-8 shadow p-3 mb-5 bg-white rounded">
      <div class="card-body">
        @include('layouts.errors')
        <form action="{{ route('admin.category/update',['id' => $category->id]) }}" method="POST">
        {{ csrf_field() }}

          <div class="form-group">
            <label>Category</label>
            <input name="name" type="text" value="{{ $category->name }}" class="form-control">
          </div>

          <button value="submit" class="btn btn-success">Update Category</button>
        </form>
       </div>
    </div>
  </div>
</div>
</main>

@endsection
