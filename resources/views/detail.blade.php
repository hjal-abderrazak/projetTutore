@extends('layouts.header')

@section('content')

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v12.0"
        nonce="TvBmE0ov"></script>
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Content -->
        <div class="content clearfix">

            <!-- Main Content Wrapper -->
            <div class="main-content-wrapper">
                <div class="main-content single">
                    <img src="{{ asset('storage/' . $post->photo) }}" alt="" class="post-image">
                    <h1 class="post-title">{{ $post->titre }}</h1>

                    <div class="post-content">
                        {!! html_entity_decode($post->detail, ENT_QUOTES, 'UTF-8') !!}
                    </div>

                </div>
            </div>
            <!-- // Main Content -->

            <!-- Sidebar -->
            <div class="sidebar single">

                <div class="fb-page" data-href="https://www.facebook.com/technologiebest/" data-small-header="false"
                    data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                    <blockquote cite="https://www.facebook.com/technologiebest/" class="fb-xfbml-parse-ignore"><a
                            href="https://www.facebook.com/technologiebest/">Coding Poets</a></blockquote>
                </div>


                <div class="section popular">
                    <h2 class="section-title">Popular</h2>

                    @foreach ($popularPosts as $p)
                        <div class="post clearfix">
                            <img src="{{ asset('storage/' . $p->photo) }}" alt="">
                            <a href="{{ url('/' . $p->titre) }}" class="title">
                                <h4>{{ $p->titre }}</h4>
                            </a>
                        </div>
                    @endforeach


                </div>

                <div class="section topics">
                    <h2 class="section-title">Topics</h2>
                    <ul>
                        @foreach ($categories as $categorie)
                            <li><a href="{{ url('/categorie/' . $categorie->name) }}">{{ $categorie->name }}</a></li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <!-- // Sidebar -->

        </div>
        <!-- // Content -->

    </div>
    <!-- // Page Wrapper -->
@endsection
