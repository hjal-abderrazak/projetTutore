@extends('layouts.header')

@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Post Slider -->
        @if (empty($titre))
            <div class="post-slider">
                <h1 class="slider-title">Recent Posts</h1>
                <i class="fas fa-chevron-left prev"></i>
                <i class="fas fa-chevron-right next"></i>

                <div class="post-wrapper">
                    @foreach ($tposts as $post)
                        <div class="post">
                            <img src="{{ asset('storage/' . $post->photo) }}" alt="" class="slider-image">
                            <div class="post-info">
                                <h4><a href="{{ url('/' . $post->titre) }}">{{ $post->titre }}</a></h4>

                                &nbsp;
                                <i class="far fa-calendar"> {{ date_format($post->created_at, 'd M Y') }}</i>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        @endif
        <!-- Content -->
        <div class="content clearfix">

            <!-- Content -->
            <div class="content clearfix">

                <!-- Main Content -->
                <div class="main-content">
                    <br>
                    @if (!empty($titre))
                        <h1 class="recent-post-title">{{ $titre }}</h1>
                    @else
                        <h1 class="recent-post-title">Popular Posts</h1>
                    @endif
                    @foreach ($posts as $post)

                        <div class="post clearfix">
                            <img src="{{ asset('storage/' . $post->photo) }}" alt="" class="post-image">
                            <div class="post-preview">
                                <h2><a href="{{ url('/' . $post->titre) }}">{{ $post->titre }}</a></h2>
                                &nbsp;
                                <i class="far fa-user"> hjal abderrazak</i>
                                <p class="preview-text">
                                    {{ substr(strip_tags($post->detail), 0, 200) }}
                                    {{ strlen(strip_tags($post->detail)) > 200 ? '...' : '' }}
                                </p>
                                <a href="{{ url('/' . $post->titre) }}" class="btn read-more">Read More</a>
                            </div>
                        </div>
                        
                    @endforeach
                    {{ $posts->links('pagination.custom') }}




                </div>
                <!-- // Main Content -->


                <div class="sidebar">

                    <div class="section search">
                        <h2 class="section-title">Search</h2>
                        <form action="{{url('/search')}}" method="post">
                            {{csrf_field()}}
                            <input type="text" name="search" class="text-input" placeholder="Search...">
                            <input type="submit" style="visibility: hidden;" />
                        </form>
                    </div>


                    <div class="section topics">
                        <h2 class="section-title">Topics</h2>
                        <ul>
                            @foreach ($categories as $categorie)

                                <li><a href="{{ url('/categorie/' . $categorie->name) }}">{{ $categorie->name }}</a>
                                </li>

                            @endforeach

                        </ul>
                    </div>

                </div>

            </div>
            <!-- // Content -->

        </div>
        <!-- // Page Wrapper -->
    @endsection
