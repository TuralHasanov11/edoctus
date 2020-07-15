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
                            <div class="single_blog_item border p-2">
                                <div class="single_blog_img">
                                    <img src="https://firebasestorage.googleapis.com/v0/b/medicusv1.appspot.com/o/images%2Fdoctors%2Fdoctor-default.png?alt=media&token=ce4221a0-f19d-4424-b1ca-842e0c328985" alt="doctor">
                                </div>
                                <div class="single_text">
                                    <div class="single_blog_text text-center">
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