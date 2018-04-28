@extends('layouts.app')

@section('content')

<h3>View Record</h3>


<div class="form-group">
    <label for="title" class="form-label">Title: </label>
    <label for="title" class="form-label">{{$detail->title}}</label>
</div>
<div class="form-group">
    <label for="title" class="form-label">Description: </label>
    <label for="title" class="form-label">@if($detail->description) {{$detail->description}} @else <span class="no-data-found">No record found</span> @endif</label>
</div>
<div class="form-group">
    <label for="title" class="form-label">College: </label>
    <label for="title" class="form-label">@if($detail->college) {{$detail->college->title}} @else <span class="no-data-found">No record found</span> @endif</label>
</div>
<div class="form-group">
    <label for="title" class="form-label">Category: </label>
    <label for="title" class="form-label">@if($detail->category) {{$detail->category->title}} @else <span class="no-data-found">No record found</span> @endif</label>
</div>
<div class="form-group">
    <label for="title" class="form-label">Priority: </label>
    <label for="title" class="form-label">@if($detail->priority) {{$detail->priority->title}} @else <span class="no-data-found">No record found</span> @endif</label>
</div>


<div class="form-group">
    <div class="col-md-12 col-md-offset-4">
        <a href="/studentboard" class="btn btn-info">
            Back
        </a>                             
    </div> 
</div>


@endsection
