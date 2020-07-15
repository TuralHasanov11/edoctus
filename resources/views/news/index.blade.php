@extends('layouts.app')

@section('title', 'Bloq - '.env('APP_NAME'))

@section('content')

    <section class="contact-section section_padding">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <h2 class="contact-title text-center">Bloq</h2>
            </div>
            <div class="col">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mb-5 mb-lg-0">
                            <div class="blog_left_sidebar">
                                
                                @foreach ($news as $item)
                                    <article class="blog_item">
                                        <div class="blog_item_img">
                                            <img class="card-img rounded-0" src="/storage/images/news/{{$item->cover_image}}" alt="">
                                            <a href="#" class="blog_item_date">
                                                <h3 class="text-center">{{date_format($item->createdDate(), 'd')}}</h3>
                                                <p class="text-center">{{date_format($item->createdDate(), 'm')}}.{{date_format($item->createdDate(), 'Y')}}</p>
                                            </a>
                                        </div>
        
                                        <div class="blog_details">
                                            <a class="d-inline-block" href="/news/{{$item->id}}">
                                                <h2>{{$item->title}}</h2>
                                            </a>
                                        </div>
                                    </article>
                                    <hr>
                                @endforeach
        
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        {{ $news->links() }}
                    </div>
                </div>
            </div>
            
          </div>
        </div>
      </section>
@endsection 