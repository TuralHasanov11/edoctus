@extends('layouts.admin')

@section('content')
    <h1 class="mt-4">İstifadəçilər</h1>
    <div class="card my-4">
        <div class="card-header"><i class="fa fa-table mr-1"></i>İstifadəçi siyahısı</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="usersTable" width="100%" cellspacing="0">
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
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection