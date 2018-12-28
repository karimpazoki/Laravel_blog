@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('layouts.side')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create new post</div>

                    <div class="card-body">
                        <form action="{{ action('PostController@update', $post->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put" />
                            <div class="form-group row">
                                <label for="title" class="col-form-label">title</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}">
                            </div>
                            <div class="form-group row">
                                <label for="category" class="col-form-label">Category</label>
                                <select name="category" id="" class="form-control">

                                        <option value=""
                                        @if($post->category_id == null)
                                            selected
                                        @endif
                                        >Non</option>


                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                                @if($post->category_id == $category->id)
                                                selected
                                                @endif
                                        >{{ $category->category }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group row">
                                <input type="file" class="form-control" accept="image/*" name="featured">
                            </div>
                            <div class="form-group row">
                                <label for="content" class="col-form-label">content</label>
                                <textarea class="form-control" col="5" row="5" id="content" name="content">{{ $post->content }}</textarea>
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-success" type="submit">Update Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
