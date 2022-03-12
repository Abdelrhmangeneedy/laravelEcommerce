@extends('layouts.admin')

@section('content')

    <div class='card'>
        <div class="card-header">
            <h3>Registered Users</h3>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>phone</th>
                        <th>Role</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name.' '.$item->lname}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{ $item->role_as == '1' ?'Admin' : 'User'}}</td>

                            <td>
                                <a href="{{url('view-users/'.$item->id)}}" class="btn btn-primary btn-sm">view</a>
                            </td>

                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @endsection
