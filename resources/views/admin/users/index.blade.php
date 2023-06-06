@extends('layout.admin')
@section('title','Users page')
@section('content')
    <h1>Users list</h1>

{{--    <form action="{{route('adm.users.search')}}" method="GET">--}}
{{--        <div class="input-group mb-3">--}}
{{--            <div class="input-group-prepend">--}}
{{--                <span class="input-group-text" id="basic-addon1">@</span>--}}
{{--            </div>--}}
{{--            <input type="text" name="search" class="form-control" placeholder="{{ __('messages.Search" aria-label="Username" aria-describedby="basic-addon1">--}}
{{--            <button class="'btn btn-success" type="submit">{{ __('messages.Search</button>--}}

{{--        </div>--}}
{{--    </form>--}}
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">email</th>
            <th scope="col">Role</th>
            <th scope="col">details</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @for($i=0;$i<count($users);$i++)
            <tr class="@if($users[$i]->id == Auth::user()->id) text-primary @endif">
                <th scope="row">{{$i+1}}</th>
                <td>{{$users[$i]->name}}</td>
                <td>{{$users[$i]->email}}</td>
                <td>@foreach($users[$i]->roles as $role)
                    {{$role->name}}
                    @endforeach</td>
                <td>
                    <a href="{{route('admin.users.edit',$users[$i]->id)}}" class="btn btn-success">details</a>
                </td>
                <td>

                </td>
            </tr>@endfor
        </tbody>
    </table>

@endsection
