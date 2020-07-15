@extends('layouts.app')

@section('title', 'Həkimlər - '.env('APP_NAME'))

@section('content')

<section class="contact-section section_padding">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="contact-title text-center">Həkimlər</h2>
        </div>
        <div class="col">
            <div class="container">
                <div class="row">
        
                    @foreach ($doctors as $doctor)
                        <div class="col-sm-6 col-lg-3">
                            <div class="single_blog_item border">
                                <div class="single_blog_img">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSGhRRA73GB6ky1fk_TSdiacnC37UcYim4JEA&usqp=CAU" alt="doctor">
                                </div>
                                <div class="single_text">
                                    <div class="single_blog_text">
                                        <a href="/doctors/{{$doctor->id}}"><h3>{{$doctor->name}}</h3></a>
                                        <p>{{$doctor->doctorInfo->doctorType->name}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row justify-content-center">
                    {{ $doctors->links() }}
                </div>
            </div>
            
        </div>
        
      </div>
    </div>
  </section>
<!--::doctor_part end::-->
@endsection