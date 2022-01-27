@extends('layouts.adminLayout')
@section('content')

    <!-- Admin Content -->
    <div class="admin-content">
        <div class="button-group">
            <a href="{{ route('post.create') }}" class="btn btn-big">Add Post</a>
            <a href="{{ route('adminPanel') }}" class="btn btn-big">Manage Posts</a>
        </div>
        @if ($message = Session::get('successUpdate'))
        <div class="alert success ">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <p>{{ $message }}</p>
        </div>
        @endif
        @if ($message = Session::get('successDelete'))
        <div class="alert success ">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <p>{{ $message }}</p>
        </div>
        @endif
        @if ($message = Session::get('succes_create'))
        <div class="alert success ">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="content">
            <h2 class="page-title">Manage Posts</h2>
            <table>
                <thead>
                    <th>SN</th>
                    <th>Title</th>
                    <th >Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    @foreach ($posts as $post)

                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->titre }}</td>
                            <td><a href="{{ url('posts/' . $post->id . '/edit') }}" class="edit"><i class="fas fa-edit"></i></a> </td>
                            <td>
                                <form action="{{ url('/posts' . $post->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <a href="{{ url('posts/' . $post->id) }}" class="delete"><i class="fas fa-trash"></i></a>

                                </form>
                            </td>
                        </tr>


                    @endforeach

                </tbody>
            </table>
            <br>

            {{ $posts->links('pagination.custom') }}

        </div>
    </div>
    <!-- // Admin Content -->

@endsection
