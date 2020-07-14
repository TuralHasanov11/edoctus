@extends('layouts.app')

@section('title', 'Həkimlər - '.env('APP_NAME'))

@section('content')

<section class="breadcrumb_part breadcrumb_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2>Həkimlər</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="doctor_part single_page_doctor_part">
    <div class="container">
        <div class="row">

            @foreach ($doctors as $doctor)
                <div class="col-sm-6 col-lg-3">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <img src="/storage/images/doctors/{{$doctor->profile_image}}" alt="doctor">
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
    
</section>

<!--::doctor_part end::-->
@endsection