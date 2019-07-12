@extends('layouts.helloapp')

@section('title','index')

@section('menuber')
  @parent
  インデックスページ
@endsection

@section('content')

  <table>
    <tr>
      <th>name</th>
      <th>mail</th>
      <th>age</th>
    </tr>
    @foreach ($items as $item)
      <tr>
        <th>{{$item->name}}</th>
        <th>{{$item->mail}}</th>
        <th>{{$item->age}}</th>
      </tr>
    @endforeach
  </table>

@endsection

@section('footer')
copyright 2019 igamoto.
@endsection
