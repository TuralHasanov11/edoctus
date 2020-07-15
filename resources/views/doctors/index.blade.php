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
                            <div class="single_blog_item">
                                <div class="single_blog_img border">
                                    <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.iconsdb.com%2Froyal-blue-icons%2Fdoctor-2-icon.html&psig=AOvVaw25Rga_Piz8Wdt_kWYBjln7&ust=1594889959904000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCKDU16TyzuoCFQAAAAAdAAAAABBT" alt="doctor">
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