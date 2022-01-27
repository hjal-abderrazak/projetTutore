@extends('layouts.adminLayout')


@section('content')

    <!-- Admin Content -->
    <div class="admin-content">
        <div class="button-group">
            <a href="{{ url('admin/post/create') }}" class="btn btn-big">Add Post</a>
            <a href="index.html" class="btn btn-big">Manage Posts</a>
        </div>

        <div class="content">
            <h2 class="page-title">Manage Posts</h2>
            @if ($errors->any())
                <div class="alert warning">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ url('posts/' . $post->id) }}" enctype="multipart/form-data" method="post">
                <input type="hidden" name="_method" value="PUT">

                {{ csrf_field() }}
                <div>
                    <label>Title</label>
                    <input type="text" value="{{ $post->titre }}" name="titre" class="text-input">
                </div>
                <div>
                    <label>Detail</label>
                    <textarea name="detail" id="body">{{ $post->detail }} </textarea>
                </div>
                <div>
                    <label>Image</label>
                    <input type="file" name="photo" class="text-input">
                </div>
                <div>
                    <label>Topic</label>
                    <select name="topic" class="text-input">
                        <option  value="{{ $post->categorie_id }}">
                            {{ $post_categorie }} </option>
                        @foreach ($categories as $categorie)

                            <option  value="{{ $categorie->id }}">
                                {{ $categorie->name }} </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-big">update Post</button>
                </div>
            </form>


        </div>
        <!-- Ckeditor -->
        <script src="https://cdn.ckeditor.com/ckeditor5/12.2.0/classic/ckeditor.js"></script>
        <!-- // Admin Content -->

    </div>
    <!-- // Admin Content -->



@endsection
