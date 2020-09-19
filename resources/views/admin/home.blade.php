@extends('layouts.admin-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="card">
            <div class="card-header">Admin Dashboard<a href="{{ route('register') }}">
                    <button class="btn btn-primary float-right">
                        Register new User
                    </button>
                </a></div>

            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                You are logged in as Admin!
                <table class="table table-bordered">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created_at</th>
                        <th>Updated_at</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>{{$user->updated_at}}</td>
                            <td class="px-4">
                                <div class="row">
                                    <a href="/admin/edit/{{$user->id}}"><button class="btn btn-primary mr-2">Edit</button></a>
                                    <form method="post" action="/delete/{{$user->id}}">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection