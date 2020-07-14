@extends('layouts.admin')

@section('content')
    <h1 class="mt-4">Bloq</h1>
    @include('inc.messages')
    @if (session('status'))
    <div class="alert alert-success" role="alert">
       {{ session('status') }}
    </div>
    @endif

    <div class="card my-4">
        <div class="card-header"><i class="fa fa-table mr-1"></i>Xəbər siyahısı</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="newsTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>İd</th>
                            <th>Başlıq</th>
                            <th>Əməliyyatlar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>İd</th>
                            <th>Başlıq</th>
                            <th>Əməliyyatlar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($news as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->title}}</td>
                                <td>
                                    {{-- <a href="/admin/posts/{{$item->id}}" class="btn btn-primary">Edit</a> --}}
                                    {!!Form::open(['action'=>['NewsController@destroy',$item->id], 'method'=>'POST', 'class'=>'my-2'])!!}
                                        {{Form::hidden('_method','DELETE')}}
                                        {{Form::submit('Sil',['class'=>'btn btn-danger'])}}
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