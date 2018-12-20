@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('layouts.side')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create new post</div>

                    <div class="card-body">
                        <form action="{{ action('CategoryController@update', $category->id) }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put" />
                            <div class="form-group row">
                                <label for="category" class="col-form-label">Category</label>
                                <input type="text" name="category" id="category" class="form-control" value="{{ $category->category }}">
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
