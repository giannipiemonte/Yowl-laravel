@extends('layouts.home')

@section('content')

<div class="container">
  <div class="row justify-content-md-center">
    <div class="col-lg-10">

      @if(session('success'))
      <div id="alert-form" class="alert alert-success">{{session('success')}}</div>
      @endif

      <!-- /.card -->

      <div class="card card-outline-secondary my-4">
        <div class="card-header">
          You're editing the category : {{ $category->title }}
        </div>

        <div class="card-body">
          <form method="post" action="{{ route('category.update', $category->id) }}">
            @csrf
            @method('PUT')

            <div class="col-12 mt-4">
              <label for="title" class="form-label">Title</label>
              <input type="text" class="form-control" name="title" value="{{($category->title)}}">
              @error('title')
              <div class="error">{{$message}}</div>
              @enderror
            </div>

            <div class="col-12 mt-4">
              <label for="description" class="form-label">Description</label>
              <textarea type="text" class="form-control" name="description"
                value="{{($category->description)}}"> {{($category->description)}}</textarea>
              @error('description')
              <div class="error">{{$message}}</div>
              @enderror
            </div>

            <div class="col-12 mt-4">
              <button type="submit" class="btn btn-primary">Update</button>
              <a href="{{ route('user.profile') }}" class="link-info">Return to your profile page</a> |
              @if(Auth::user()->type === 'Admin')
              <a href="{{ route('admin.index') }}" class="link-info">Return to admin page</a>
              @endif
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection