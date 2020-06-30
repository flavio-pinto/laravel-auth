@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">{{$post->title}}</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->body}}</td>
                <td>{{$post->created_at->format('d/m/Y')}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
                <td>
                    <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST">
                        @csrf
                        @method('DELETE')

                        <input class="btn btn-danger" type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        </tbody>
    </table>

    <h3 class="mb-4">Image</h3>
    @if(!empty($post->path_img))
        <img src="{{asset('storage/' . $post->path_img)}}" alt="{{$post->title}}" width="400">
    @else
        <div class="no-image">Questo post non ha immagini</div>
    @endif
</div>
@endsection