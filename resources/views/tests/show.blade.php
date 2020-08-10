@extends('layouts.app')

@section('title', $test->title.' - '.env('APP_NAME'))

@section('content')
   
<section class="doctor_part section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                @include('inc.messages')
                    
                <div class="section_tittle">
                   <div class="row">
                       <div class="col col-lg-9">
                        <h2>{{$test->title}}</h2>
                        <h5 class="text-secondary">Bu testin nəticəsinin positiv çıxması üçün minimum göstərici : {{$test->treshold}}%</h5>
                        <h5>Həkimlərimizlə <a href="/chat">əlaqə saxlayın</a></h5>
                       </div>
                       <div class="col col-lg-3">
                        @if (session('result'))
                            <div class="">
                                <div class="text-secondary font-weight-bold my-2">Sizin nəticəniz</div>
                                <h5 class="@if (session('result')>$test->treshold)
                                        bg-danger
                                    @else
                                        bg-success 
                                    @endif py-1 px-3 text-center text-light">{{session('result')}}%</h5>
                                @if (session('result')>$test->treshold)
                                    <div class="text-danger" style="font-size:0.8em">Xəstəliyə yoluxma ehtimalınız çoxdur</div>
                                @else
                                    <div class="text-success" style="font-size:0.8em">Xəstəliyə yoluxma ehtimalınız azdır</div>
                                @endif
                            </div>
                        @endif
                       </div>
                   </div>
                </div>
                
            </div>
        </div>
        <hr>
        <div class="">
           <form action="/tests/{{$test->id}}/calculate" method="POST">
                @csrf

                    <div class="row mb-5">
                        <div class="col">
                            <label for="regions"><h5>Şəhər</h5></label>
                            <select id="regions" name="region" class="form-control">
                                @foreach ($regions as $region)
                                    <option value="{{$region->id}}">{{$region->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="ageGroups"><h5>Yaş qrupu</h5></label>
                            <select id="ageGroups" name="age_group" class="form-control">
                                @foreach ($ageGroups as $ageGroup)
                                    <option value="{{$ageGroup->id}}">{{$ageGroup->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                   
                    <div class="my-5">
                        @foreach ($test->questions as $index => $question)
                        <div class="card border-primary my-3">
                            <div class="card-body">
                              <h5 class="card-title font-weight-bold">{{$index+1}}. {{$question->title}}</h5>
                              @if ($question->type=='s')
                                    <label>0-5 arası dəyərləndirin</label>
                                    <input type="range" name="answers[{{$index}}]" 
                                        onchange="
                                            document.getElementById('question-range-output-{{$question->id}}').value=this.value*5
                                        " class="custom-range question-range" value="0" min="0" step="0.2" max="1" id="range-{{$question->id}}">
                                    <input type="text" id="question-range-output-{{$question->id}}" class="form-control text-center question-range-output" value="0" disabled>
                              @endif
                              @if ($question->type=='b')
                                  <input type="radio" value="1" name="answers[{{$index}}]" id="{{'radio-yes-'.$question->id}}"> <label for="{{'radio-yes-'.$question->id}}">Bəli</label>
                                  <input type="radio" value="0" name="answers[{{$index}}]" id="{{'radio-no-'.$question->id}}"> <label for="{{'radio-no-'.$question->id}}">Yox</label>
                              @endif
                            </div>
                        </div>
                         @endforeach
                    </div>
                   
                    <div class="form-group">
                        <label for="userEmail">Nəticənin email adresinizə göndərilməsini istəyirsinizsə email adresinizi daxil edin</label>
                        <input type="email" id="userEmail" name="email" class="form-control">
                        <small>Əgər testin nəticəsi birbaşa email hesabınızda görünməsə, hesabınızın <b>Spam</b> bölməsini yoxlayın</small>
                    </div>

                    <div class="col col-lg-9 my-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Təsdiqlə</button>
                        </div>
                    </div>
           </form>

        </div>
    </div>
</section>
@endsection

