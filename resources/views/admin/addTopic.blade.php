@extends('layouts.adminLayout')
@section('content')

    <!-- Admin Content -->
    <div class="admin-content">
        <div class="button-group">
            <a href="{{url('/admin/addTopics')}}" class="btn btn-big">Add Topic</a>
            <a href="{{ url('admin/topics') }}" class="btn btn-big">Manage Topics</a>
        </div>
        @if($errors->any())
            <div class="alert warning">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="content">

            <h2 class="page-title">Add Topic</h2>

            <form action="{{url('/topics')}}" method="post">
                {{ csrf_field() }}
                <div>
                    <label>Name</label>
                    <input type="text" name="name" class="text-input">
                </div>

                <div>
                    <button type="submit" class="btn btn-big">Add Topic</button>
                </div>
            </form>

        </div>

    </div>
    <!-- // Admin Content -->
    <!-- Ckeditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/12.2.0/classic/ckeditor.js"></script>
@endsection
