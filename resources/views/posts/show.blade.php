@extends('layouts.app')

@section('title', $post->title.' - '.env('APP_NAME'))

@section('content')
    <section class="section_padding">
        <div class="container">
         @include('inc.messages')
           <div class="row">
              <div class="col-lg-8 posts-list">
                 <div class="single-post">
                    <div class="blog_details">
                       <h2>{{$post->title}}  </h2>@can('update', $post)
                       <a href="/posts/{{$post->id}}/edit">Edit</a>
                   @endcan
                       <ul class="blog-info-link mt-3 mb-4 text-primary">
                           <li class="">
                                 <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                 </svg> 
                                 {{$post->user->name}}
                            </li>
                          <li><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-clock-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                         </svg><span class="px-2">{{date_format($post->createdDate(), 'd-m-Y')}}</span></li>
                       </ul>
                       <p class="excert">
                          {!!$post->body!!}
                       </p>
                    </div>
                   
                    <app-comments :post="{{$post->id}}"></app-comments>
                    {{-- <div class="comments-area">
                     <h4>{{$post->comments->count()}} Şərh :</h4>
                     
                     @foreach ($post->comments as $comment)
                        <div class="comment-list">
                           <div class="single-comment justify-content-between d-flex">
                              <div class="user justify-content-between d-flex">
                                 <div class="thumb">
                                    
                                 </div>
                                 <div class="desc">
                                    <p class="comment">
                                      {{$comment->body}}
                                    </p>
                                    <div class="d-flex justify-content-between">
                                       <div class="d-flex align-items-center">
                                          <h5 class="text-primary">
                                             {{$comment->user->name}}
                                          </h5>
                                          <p class="date">{{$comment->created_at}}</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <hr>
                     @endforeach
                     
                     <div class="comment-form">
                        <h4>Şərh bildir</h4>

                        <form class="form-contact comment_form" action="#" id="commentForm">
                           <div class="row">
                              <div class="col-12">
                                 <div class="form-group">
                                    <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                       placeholder="Write Comment"></textarea>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <button type="submit" class="btn btn-success">Şərh bildir</button>
                           </div>
                        </form>
                     </div>
                  </div> --}}

                 </div>
              </div>
           </div>
        </div>
     </section>
@endsection 