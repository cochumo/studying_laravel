@extends('layouts.helloapp')

@section('title','Add')

  @section('menubar')

    @parent
    新規作成ページ

  @endsection

  @section('content')

    <table>
      <form class="" action="/laravel/public/hello/add" method="post">
        {{csrf_field()}}
        <tr>
          <th>name:</th>
          <td>
            <input type="text" name="name" value="">
          </td>
        </tr>
        <tr>
          <th>mail:</th>
          <td>
            <input type="text" name="mail" value="">
          </td>
        </tr>
        <tr>
          <th>age:</th>
          <td>
            <input type="text" name="age" value="">
          </td>
        </tr>
        <tr>
          <td>
            <input type="submit" name="" value="send">
          </td>
        </tr>
      </form>
    </table>

  @endsection

  @section('footer')
    copyright 2019 cochumo
  @endsection
