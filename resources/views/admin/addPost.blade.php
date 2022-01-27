@extends('layouts.adminLayout')


@section('content')

    <div class="admin-content">
        <div class="button-group">
            <a href="{{ route('post.create') }}" class="btn btn-big">Add Post</a>
            <a href="{{ route('adminPanel') }}" class="btn btn-big">Manage Posts</a>
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
            <form action="{{ url('/posts') }}" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}
                <div>
                    <label>Title</label>
                    <input type="text" name="titre" class="text-input">
                </div>
                <div>
                    <label>Detail</label>
                    <textarea name="detail" id="body"></textarea>
                </div>
                <div>
                    <label>Image</label>
                    <input type="file" name="photo" class="text-input">
                </div>
                <div>
                    <label>Topic</label>
                    <select name="topic" class="text-input">
                        
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-big">Add Post</button>
                </div>
            </form>


        </div>

    </div>
    <!-- // Admin Content -->

    <!-- Ckeditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/12.2.0/classic/ckeditor.js"></script>
    <!-- // Admin Content -->


@endsection
