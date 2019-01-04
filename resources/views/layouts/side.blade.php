<div class="col-md-4">
    <ul class="list-group">
        <li class="list-group-item"><a href="{{ route('dashboard.home') }}">Home</a></li>

        <li class="list-group-item"><a href="{{ route('post.index') }}">Posts</a></li>
        <li class="list-group-item"><a href="{{ route('post.create') }}">Create new post</a></li>
        <li class="list-group-item"><a href="{{ route('post.trashed') }}">Trash</a></li>

        <li class="list-group-item"><a href="{{ route('category.index') }}">Categories</a></li>
        <li class="list-group-item"><a href="{{ route('category.create') }}">Create new Category</a></li>


        <li class="list-group-item"><a href="{{ route('tags.index') }}">Tags</a></li>
        <li class="list-group-item"><a href="{{ route('tags.create') }}">Create new tag</a></li>
        {{--li.list-group-item>a--}}
    </ul>
</div>