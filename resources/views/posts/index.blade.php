@extends('layouts.app')

@section('title', 'Forum - '.env('APP_NAME'))

@section('content')

    <section class="contact-section section_padding">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <h2 class="contact-title text-center">Forum</h2>
            </div>
            <div class="col">
                <div class="container">
            
                    @include('inc.messages')
        
                    <div class="row">
                        <div class="col-lg-8 mb-5 mb-lg-0">
                            <div class="blog_left_sidebar">
                                
                                @foreach ($posts as $post)
                                    <article class="blog_post" style="border: 0.1em solid #ddd">
                                        <div class="blog_details">
                                            <a class="d-inline-block" href="/posts/{{$post->id}}">
                                                <h2>{{$post->title}}</h2>
                                            </a>
                                            <p>
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                                </svg> 
                                                {{$post->user->name}}
                                            </p>
                                            <p>{{$post->created_at}}</p>
                                            
                                        </div>
                                    </article>
                                    <hr>
                                @endforeach
        
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
            
          </div>
        </div>
      </section>
@endsection 