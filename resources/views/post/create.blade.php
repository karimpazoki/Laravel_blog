@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('layouts.side')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create new post</div>

                    <div class="card-body">
                        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="title" class="col-form-label">title</label>
                                <input type="text" name="title" id="title" class="form-control">
                            </div>
                            <div class="form-group row">
                                <label for="category" class="col-form-label">Category</label>
                                <select name="category" id="" class="form-control">
                                    <option value="">Non</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <input type="file" class="form-control" accept="image/*" name="featured">
                            </div>

                            <div class="form-group">
                                <label for="tags">Select Tags</label>
                                @foreach($tags as $tag)
                                    <div class="checkbox">
                                        <label for="">
                                            <input name="tags[]" type="checkbox" value="{{ $tag->id }}">{{ $tag->tag }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-group row">
                                <label for="content" class="col-form-label">content</label>
                                <textarea class="form-control" col="5" row="5" id="content" name="content"></textarea>
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-success" type="submit">Create Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
