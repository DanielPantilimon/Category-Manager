@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2 ">
                <img src="/uploads/avatars/{{$user->avatar}}" style="width:150px;
                height:150px; float:left; border-radius:50%; margin-right:25px;">
                <h2>{{ $user->name }}'s Profile</h2>
                <form enctype="multipart/form-data" action="/profileEditPhoto/{{$user->id}}" method="POST">
                    <label>Update Profile Image</label>
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="pull-right btn btn-sm btn-primary">
                </form>
                <hr>
            </div>
{{-- {{ dd($departments) }} --}}
<div class="col-md-8 col-md-offset-2 ">

    <form action="/profileEdit/{{$user->id}}" method="POST">

        <label>Name</label>
        <input type="text" name="name" class="form-control input-lg" value="{{$user->name}}">

        <label>Surname</label>
        <input type="text" name="surname" class="form-control input-lg" value="{{$user->surname}}">

        <label>Address</label>
        <input type="text" name="address" class="form-control input-lg" value="{{$user->address}}">

{{--         <label>Department</label>
        <input type="text" name="department" class="form-control input-lg" value="{{$user->department}}"> --}}

        {{Form::label('department_id', 'Department: ')}}
        <select class="form-control input-lg" name="department_id">
            @foreach ($departments as $department)
                <option value="{{ $department->department_id }}" {{ $userDepartment && $userDepartment->id == $department->id ? 'selected' : '' }}>
                    {{ $department->dep_name }}
                </option>
            @endforeach
        </select>
        
  
{{--         <select class="form-control input-lg" name="department_id">
            @foreach($departments as $department)
                <option value="{{$department->department_id}}">{{$department->dep_name}}</option>
            @endforeach
        </select> --}}

        <hr>

        <div class="col-sm-6 col-md-offset-3">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="submit" class="btn btn-success btn-block">
        </div>
    </form>
</div>
</div>
</div>

@endsection