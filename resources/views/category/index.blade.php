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
                                    <th scope="col">Category</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>

                                        <td>{{ $category->category }}</td>
                                        <td>
                                            <a href="{{action('CategoryController@edit', $category['id'])}}" class="btn btn-sm btn-outline-info">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{action('CategoryController@destroy', $category['id'])}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-outline-danger btn-sm">
                                                    Delete
                                                </button>
                                            </form>
                                            {{--<a href="{{action('PostController@destroy', $category['id'])}}" class="btn btn-sm btn-outline-danger">Delete</a>--}}
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
