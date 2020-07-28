@extends('layouts.app')

@section('title','Statistika - '.env('APP_NAME'))

@section('content')
<section class="contact-section section_padding">
    <div class="container">
      <div class="row justify-content-around">
        <div class="col-12 text-center mb-4">
          <h2 class="contact-title ">Statistika</h2>
          <p>Platformamızdan istifadə şəxslərin müsbət nəticə verən testləri haqda məlumatlar</p>
        </div>
        <div class="col-12 col-md-5">
                <h3 class="mb-4">Şəhərlər üzrə müsbət nəticələrin sayı</h3>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Şəhər</th>
                            <th scope="col">Müsbət testlər</th>
                          </tr>
                        </thead>
                        <tbody>
                         
                            @foreach ($regionalInfo as $key => $region)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$region->name}}</td>
                                    <td>{{$region->user_test_count?$region->user_test_count:0}}</td>
                                </tr>
                            @endforeach
                          
                        </tbody>
                      </table>
                </div>
        </div>
        <div class="col-12 col-md-5 ">
            <h3 class="mb-4">Müxtəlif yaş qrupları üzrə müsbət nəticələrin sayı</h3>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Yaş qrupu</th>
                        <th scope="col">Müsbət testlər</th>
                      </tr>
                    </thead>
                    <tbody>
                     
                        @foreach ($ageGroupInfo as $key => $ageGroup)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$ageGroup->name}}</td>
                                <td>{{$ageGroup->user_test_count?$ageGroup->user_test_count:0}}</td>
                            </tr>
                        @endforeach
                      
                    </tbody>
                  </table>
            </div>
           
        </div>
      </div>
    </div>
  </section>
@endsection

