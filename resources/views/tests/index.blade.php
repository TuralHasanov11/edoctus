
@extends('layouts.app')

@section('title', 'Testlər - '.env('APP_NAME'))


@section('content')
<section class="">
    <div class="d-none d-sm-block mb-5 pb-4"></div>
    <h2 class="contact-title text-center">Xəstəlik Testləri</h2>
</section>

<section class="feature_part single_feature_page mb-5">
    <div class="container">
        <div class="row">
            @foreach ($tests as $test)
            <div class="col my-1">
                <div class="card border-primary">
                    <div class="card-body">
                        <h3 class="card-title">
                          {{$test->title}}
                            <p class="text-secondary">Bu testin nəticəsinin positiv çıxması üçün minimum göstərici : {{$test->treshold}}%</p>
                        </h3>  
                      <div><a href="/tests/{{$test->id}}" class="btn btn-primary">Daxil ol</a></div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        <div class="row justify-content-center">
            {{ $tests->links() }}
        </div>
    </div>
</section>
@endsection