@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('layouts.side')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create new tag</div>

                    <div class="card-body">
                        <form action="{{ route('tags.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="tag" class="col-form-label">Tag</label>
                                <input type="text" name="tag" id="tag" class="form-control">
                            </div>

                            <div class="form-group text-center">
                                <button class="btn btn-success" type="submit">Create tag</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
