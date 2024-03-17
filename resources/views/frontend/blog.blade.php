@extends('layouts.frontend.header')

@section('content')

<main id="main">

   <!-- ======= Breadcrumbs ======= -->
   <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Blog</h2>
          <ol>
            <li><a href="{{route('accueil')}}">accueil</a></li>
            <li>Blog</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">
          @foreach($blogs as $blog)
            <article class="entry">

              <div class="entry-img">
                <img src="{{asset('uploads/blog/'.$blog->imageBlog)}}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="">{{ $blog->titre}}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="">Rower</a></li>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href=""><time datetime="2020-01-01">{{ $blog->created_at}}</time></a></li>
                  
                </ul>
              </div>

              <div class="entry-content">
                <p>
                {{ $blog->descriptionBlog}}
                </p>
                <div class="read-more">
                  <a href="">Voir detail</a>
                </div>
              </div>

            </article><!-- End blog entry -->
            @endforeach
      

            <div class="blog-pagination">
              <ul class="justify-content-center">
              {{ $blogs->links() }}
              </ul>
            </div>

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="">
                  <input type="text">
                  <button type="submit"><i class="icofont-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item categories">
                <ul>
                  <li><a href="#">General <span>(25)</span></a></li>
                  <li><a href="#">publication <span>(12)</span></a></li>
                  <li><a href="#">Travail <span>(5)</span></a></li>
                  <li><a href="#">Education <span>(22)</span></a></li>
                  <li><a href="#">Creation <span>(8)</span></a></li>
                  <li><a href="#">Journal <span>(14)</span></a></li>
                </ul>
              </div><!-- End sidebar categories-->

              <h3 class="sidebar-title"> Posts Recent</h3>
              <div class="sidebar-item recent-posts">
              @foreach($blogs1 as $blog1)
                <div class="post-item clearfix">
                  <img src="{{asset('uploads/blog/'.$blog1->imageBlog)}}"  alt="">
                  <h4><a href="">{{ $blog1->titre}}</a></h4>
                  <time datetime="2020-01-01">{{ $blog1->created_at}}</time>
                </div>
              @endforeach
     

              </div><!-- End sidebar recent posts-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->
    </main>
@endsection()