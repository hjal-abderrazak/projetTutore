@extends('layouts.adminLayout')
@section('content')

    <!-- Admin Content -->
    <div class="admin-content">
        <div class="button-group">
            <a href="{{ url('/admin/addTopics') }}" class="btn btn-big">Add Topic</a>
            <a href="{{ url('admin/topics') }}" class="btn btn-big">Manage Topics</a>
        </div>
        @if ($message = Session::get('successDelete'))
            <div class="alert success ">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('successCreate'))
            <div class="alert success ">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('successEdit'))
            <div class="alert success ">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('errorDelete'))
        <div class="alert warning  ">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <p>{{ $message }}</p>
        </div>
    @endif

        <div class="content">

            <h2 class="page-title">Manage Topics</h2>

            <table>
                <thead>
                    <th>SN</th>
                    <th>Name</th>
                    <th >Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    @foreach ($categories as $categorie)
                        <tr>
                            <td>{{ $categorie->id }}</td>
                            <td>{{ $categorie->name }}</td>
                            <td><a href="{{ url('/topic/' . $categorie->id . '/edit') }}" class="edit"><i class="fas fa-edit"></i></a></td>
                            <td>
                                <form action="{{ url('/topics' . $categorie->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <a href="{{ url('topics/' . $categorie->id) }}" class="delete"><i class="fas fa-trash"></i></a>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $categories->links('pagination.custom') }}

        </div>

    </div>
    <!-- // Admin Content -->

@endsection
