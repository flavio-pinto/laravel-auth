@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">New Post</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="form-group">
            <label for="title">Titolo</label>
            <input class="form-control" type="text" name="title" id="title" value="{{old('title')}}">
        </div>
        <div class="form-group">
            <label for="body">Testo</label>
            <textarea class="form-control" name="body" id="body">{{old('body')}}</textarea>
        </div>
        <div class="form-group">
            <label class="d-block" for="path_img">Add image</label>
            <input type="file" name="path_img" id="path_img" accept="image/*">
        </div>
        <input class="btn btn-primary" type="submit" value="Crea nuovo post">
    </form>
</div>
@endsection