<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">

    <!-- Custom Styling -->
    <link href="{{ url('css/style.css') }}" rel="stylesheet">

    <!-- Admin Styling -->
    <link rel="stylesheet" href="{{ url('css/admin.css') }}">


</head>

<body>
    <header>
        <div  class="logo">
            <a href="{{url('/')}}"><h1 class="logo-text"><span>Yosri</span>Blog</h1> </a>
            <h1 class="logo-text"><span>Yosri</span>Blog</h1>
        </div>
        <i class="fa fa-bars menu-toggle"></i>
        <ul class="nav">
            <li>
                <a href="#">
                    <i class="fa fa-user"></i>
                    {{Auth::user()->name }}
                    <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
                </a>
                <ul>
                    <li><a href="{{route('logout')}}"  class="logout" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >Logout</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </header>

    <!-- Admin Page Wrapper -->
    <div class="admin-wrapper">

        <!-- Left Sidebar -->
        <div class="left-sidebar">
            <ul>
                <li>
                    <a href="{{ route('adminPanel') }}" class="btn btn-big">Manage Posts</a>
                </li>
                
                <li><a href="{{ url('admin/topics') }}">Manage Topics</a></li>
            </ul>
        </div>
        <!-- // Left Sidebar -->


        @yield('content')



    </div>
    <!-- // Page Wrapper -->



    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Custom Script -->
    <script src="../../js/scripts.js"></script>

    <!-- Ckeditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/12.2.0/classic/ckeditor.js"></script>


</body>

</html>
