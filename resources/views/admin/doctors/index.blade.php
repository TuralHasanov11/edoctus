@extends('layouts.admin')

@section('content')
    <h1 class="mt-4">Həkimlər</h1>
    @include('inc.messages')
    @if (session('status'))
    <div class="alert alert-success" role="alert">
       {{ session('status') }}
    </div>
    @endif

    <div class="card my-4">
        <div class="card-header"><i class="fa fa-table mr-1"></i>İstifadəçi siyahısı</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="doctorsTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>İd</th>
                            <th>Ad</th>
                            <th>Email</th>
                            <th>Əməliyyatlar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>İd</th>
                            <th>Ad</th>
                            <th>Email</th>
                            <th>Əməliyyatlar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($doctors as $doctor)
                            <tr>
                                <td>{{$doctor->id}}</td>
                                <td>{{$doctor->name}}</td>
                                <td>{{$doctor->email}}</td>
                                <td>
                                    {!!Form::open(['action'=>['DoctorsController@destroy',$doctor->id], 'method'=>'POST', 'class'=>'my-2'])!!}
                                        {{Form::hidden('_method','DELETE')}}
                                        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection