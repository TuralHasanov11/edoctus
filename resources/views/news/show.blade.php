@extends('layouts.app')

@section('title', $news->title.' - '.env('APP_NAME'))

@section('content')
    <section class="section_padding">
        <div class="container">
           <div class="row">
              <div class="col-lg-8 posts-list">
                 <div class="single-post">
                    <div class="feature-img">
                       <img class="img-fluid" src="/storage/images/news/{{$news->cover_image}}" alt="">
                    </div>
                    <div class="blog_details">
                       <h2>{{$news->title}}</h2>
                       <ul class="blog-info-link mt-3 mb-4">
                          <li><a href="javascript:void(0)"><i class=""></i> {{date_format($news->createdDate(), 'd-m-Y')}}</a></li>
                       </ul>
                       <p class="excert">
                          {!!$news->body!!}
                       </p>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
@endsection 