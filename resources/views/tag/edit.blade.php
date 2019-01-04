@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('layouts.side')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create new tag</div>

                    <div class="card-body">
                        <form action="{{ action('TagsController@update', $tag->id) }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put" />
                            <div class="form-group row">
                                <label for="tag" class="col-form-label">tag</label>
                                <input type="text" name="tag" id="tag" class="form-control" value="{{ $tag->tag }}">
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-success" type="submit">Update tag</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
