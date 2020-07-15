@extends('layouts.app')

@section('title', $doctor->name.' - '.env('APP_NAME'))

@section('content')
<div class="d-none d-sm-block mb-5 pb-4"></div>
<div class="whole-wrap">
    <div class="container box_1170">
        <div class="section-top-border">
            <h2 class="mb-3">{{$doctor->name}}</h2>
            <h5 class="mb-3 text-secondary"><b><i class="fa fa-user-md" aria-hidden="true"></i> {{$doctor->doctorInfo->doctorType->name}}</b></h5>
            <div class="row">
                <div class="col-md-3">
                    <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.iconsdb.com%2Froyal-blue-icons%2Fdoctor-2-icon.html&psig=AOvVaw25Rga_Piz8Wdt_kWYBjln7&ust=1594889959904000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCKDU16TyzuoCFQAAAAAdAAAAABBT" alt="" class="img-fluid">
                </div>
                <div class="col-md-9 mt-sm-20">
                    <h3>Məlumat</h3>
                    <p>{{$doctor->doctorInfo->bio}}</p>
                </div>
            </div>
            <hr>
            <div><a href="/chat?doctor={{$doctor->id}}" class="btn btn-primary" style="font-size: 1.1rem">Chat</a></div>
        </div>
    </div>
</div>
@endsection