<style>
  img {
    border-radius: 50%;
    vertical-align: middle;
    width: 50px;
    height: 50px;
  }
  </style>
@extends('admin.layouts.home')

@section('content')

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">الاسم</th>
      <th scope="col">الايميل</th>
      <th scope="col">الحالة</th>
      <th scope="col">الوظيفة</th>
      <th scope="col">صورة المستخدم</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $user)
    <tr>
      <th scope="row">{{$user->name}}</th>
      <th scope="row">{{$user->email}}</th>
      <th scope="row">{{$user->active}}</th>
      <th scope="row">{{$user->role}}</th>
    <td class="thumbnail"> <img  height: 50px src="{{$user->photo}}" alt="{{$user->name}}"> </td>
    <th scope="row"> <a href="{{route('users.edit',['id'=>$user->id])}}" class="btn btn-info"> <i class="fas fa-edit"></i> Edit </a></th>
    <th scope="row"> <a href="{{route('users.destroy', ['id'=>$user->id])}}" class="btn btn-danger"> <i class="fas fa-user-times"></i> Delete </a></th>
    </tr>  
    @endforeach


  </tbody>
</table>

@endsection
