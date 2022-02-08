@extends('layouts.home')

@section('content')

<div class="row">

  <div class="col-lg-3">

  </div>
  <!-- /.col-lg-3 -->

  <div class="col-lg-9">

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- /.card -->

    <div class="card card-outline-secondary my-4">
      <div class="card-header">
        J'ai oublié mon password
      </div>
      <div class="card-body">

        <form action="{{ route('post.forgotpw') }}" method="post">

          @csrf

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            @error('email')
            <div class="error">{{ $message }}</div>
            @enderror
          </div>

          <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>

        <p><br><a href="{{ route('register') }}">Je n'ai pas de compte</a></p>

      </div>
    </div>
    <!-- /.card -->

  </div>
  <!-- /.col-lg-9 -->

</div>

@stop