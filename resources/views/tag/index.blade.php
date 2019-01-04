@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('layouts.side')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create new tag</div>

                    <div class="card-body">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Tag</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tags as $tags)
                                    <tr>

                                        <td>{{ $tags->tag }}</td>
                                        <td>
                                            <a href="{{action('TagsController@edit', $tags['id'])}}" class="btn btn-sm btn-outline-info">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{action('TagsController@destroy', $tags['id'])}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-outline-danger btn-sm">
                                                    Delete
                                                </button>
                                            </form>
                                            {{--<a href="{{action('PostController@destroy', $tags['id'])}}" class="btn btn-sm btn-outline-danger">Delete</a>--}}
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
