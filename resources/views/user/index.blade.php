@extends('app')


@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Profile</li>
  </ol>
</nav>
<hr>

<div class="raw ">

  <div class="col-md-12">
    <b>First name</b> : {{$user['first_name']}}<br>
    <b>Last name</b> : {{$user['last_name']}} <br>
    <b>Email</b> : {{$user['email']}} <br>
    <b>Gender</b> : {{$user['gender']}} <br>
    <br>
  </div>
</div>
</div>
@endsection