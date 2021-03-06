@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('layouts.side')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create new post</div>

                    <div class="card-body">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Trash</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>
                                            <img src="{{ $post->featured }}" alt="{{ $post->title }}" width="50px">
                                        </td>

                                        <td>{{ $post->title }}</td>
                                        <td>
                                            <a href="{{action('PostController@edit', $post['id'])}}" class="btn btn-sm btn-outline-info">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{action('PostController@destroy', $post['id'])}}" method="POST" style="display:inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-outline-danger btn-sm">
                                                    Trash
                                                </button>
                                            </form>
                                            {{--<a href="{{action('PostController@destroy', $post['id'])}}" class="btn btn-sm btn-outline-danger">Delete</a>--}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
