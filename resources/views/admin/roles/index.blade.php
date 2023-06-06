@extends('layout.admin')

@section('title','Roles page')

@section('content')
    <h1>roles page</h1>
    <a class="btn btn-primary mb-2" href="{{route('roles.create')}}">create role</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th>edit</th>
            <th>delete</th>
        </tr>
        </thead>
        <tbody>
        @for($i=0;$i<count($roles); $i++)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{$roles[$i]->name}}</td>
                <td>
                    <a class="btn btn-primary" href="{{route('roles.edit', $roles[$i]->id)}}">edit</a>
                </td>
                <td>
                    <form method="post" action="{{route('roles.destroy', $roles[$i]->id)}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">delete</button>
                    </form>
                </td>
            </tr>
        @endfor
        </tbody>
    </table>
@endsection
