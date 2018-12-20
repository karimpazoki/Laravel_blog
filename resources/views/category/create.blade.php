@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('layouts.side')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create new post</div>

                    <div class="card-body">
                        <form action="{{ route('category.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="Category" class="col-form-label">Category</label>
                                <input type="text" name="category" id="Category" class="form-control">
                            </div>

                            <div class="form-group text-center">
                                <button class="btn btn-success" type="submit">Create Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
