@extends('layouts.home')

@section('content')

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-lg-10">
            <div class="blockquote text-center">
                <h3 id="blade-title">Les posts pour la sous-catégorie : {{ $subcategories->title }}</h3>
                <p><small class="text-muted">Description de la sous-catégorie :</small> {{ $subcategories->description }}</p>
            </div>
            <div class="cards-posts">
                @forelse ($posts as $item)
                <div class="card w-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text">{{ $item->content }}</p>
                        <a href="{{route('postshow', $item->id)}}" class="btn btn-primary">Show</a>
                    </div>
                </div>
                @empty
                <p>
                    Pas encore de post
                </p>
                @endforelse
            </div>
            @if(session('success'))
            <div id="alert-form" class="alert alert-success">{{session('success')}}</div>
            @endif

            @auth
            <!-- /.form -->
            <div class="card card-outline-secondary my-4">
                <div class="card-header">
                    Créer un post avec le profil : {{ Auth::user()->nickname }}
                </div>
                <div class="card-body">
                    <form action="{{ route('posts.create', $subcategories->id) }}" method="post">
                        @csrf
                        <div class="col-12">
                            <label for="url" class="form-label"><br>Url</label>
                            <input type="text" class="form-control" name="url" placeholder="URL of Website"
                                value="{{old('url')}}">
                            @error('url')
                            <div class="error">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="title" class="form-label"><br>Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Your title"
                                value="{{old('title')}}">
                            @error('title')
                            <div class="error">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="content" class="form-label"><br>Content</label>
                            <textarea type="text" class="form-control" name="content" placeholder="The content"
                                value="{{old('content')}}"></textarea>
                            @error('content')
                            <div class="error">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <br><button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            @else
            <div class="card card-outline-secondary my-4">
                <div class="card-header">
                    <p> Pour poster vous devez être connecté </p>
                    <a class="nav-link" href="{{route('login')}}">Se connecter</a>
                </div>
                <div class="card-body">
                    <form method="post">
                        @csrf
                        <div class="col-12">
                            <label for="title" class="form-label"><br>Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Your title"
                                value="{{old('title')}}">
                            @error('title')
                            <div class="error">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="content" class="form-label"><br>Content</label>
                            <input type="text" class="form-control" name="content" placeholder="The content"
                                value="{{old('content')}}">
                            @error('content')
                            <div class="error">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="url" class="form-label"><br>Url</label>
                            <input type="text" class="form-control" name="url" placeholder="URL of Website"
                                value="{{old('url')}}">
                            @error('url')
                            <div class="error">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <br><button type="submit" class="btn btn-primary" disabled>Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            @endauth
        </div>
    </div>
</div>


@stop