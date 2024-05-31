@extends('app')


@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">View Book</li>
    </ol>
</nav>
<hr>

<div class="raw ">

    <div class="col-md-12">
        <b>Auther</b> : {{$auther_name}}<br>
        <b>Title</b> : {{$bookdata['title']}} <br>
        <b>Release date</b> : {{date("Y-m-d", strtotime($bookdata['release_date']))}} <br>
        <b>Description</b> : {{$bookdata['description']}} <br>
        <b>Isbn</b> : {{$bookdata['isbn']}} <br>
        <b>Format</b> : {{$bookdata['format']}} <br>
        <b>Number of pages</b> : {{$bookdata['number_of_pages']}} <br>
        <br>
    </div>
    <div class="col-md-12">
        <a type="button" class="btn btn-primary" href={{asset('books')}}>Go Back</a>
    </div>

</div>
</div>
@endsection