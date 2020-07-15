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
                    <img src="https://firebasestorage.googleapis.com/v0/b/medicusv1.appspot.com/o/images%2Fdoctors%2Fdoctor-default.png?alt=media&token=ce4221a0-f19d-4424-b1ca-842e0c328985" alt="" class="img-fluid">
                </div>
                <div class="col-md-9 mt-sm-20">
                    <h3>Məlumat</h3>
                    <p>{!!$doctor->doctorInfo->bio!!}</p>
                </div>
            </div>
            <hr>
            <div><a href="/chat?doctor={{$doctor->id}}" class="btn btn-primary" style="font-size: 1.1rem">Chat</a></div>
        </div>
    </div>
</div>
@endsection