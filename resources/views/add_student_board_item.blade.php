@extends('layouts.app')

@section('content')

    <h3>Add Record</h3>
<!-- Display custom flash messages -->
@if(Session::has('success'))
<div class="alert alert-success">
    <a class="close" data-dismiss="alert">×</a>
    {!!Session::get('success')!!}
</div>
@endif
@if(Session::has('error'))
<div class="alert alert-danger">
    <a class="close" data-dismiss="alert">×</a>
    {!!Session::get('error')!!}
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form class="form-control padtop20" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title" class="form-label">Title <span class="required">*</span></label>
        <input type="text" class="form-control" value="{{old('title')}}" name="title" id="title" placeholder="Enter title here" required=""/>
    </div>

    <div class="form-group">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="description" >{{old('description')}}</textarea>
    </div>
    <div class="form-group">
        <label for="college" class="form-label">College <span class="required">*</span></label>
        <select name="college_id" id="college" class="form-control" required="">
            <option value="">NONE SELECTED</option>
            @if(count($colleges))
            @foreach($colleges as $row)
            <option value="{{$row->id}}">{{$row->title}}</option>
            @endforeach
            @endif
        </select>
    </div>
    <div class="form-group">
        <label for="priority" class="form-label">Priority <span class="required">*</span></label>
        <select name="priority_id" id="priority" class="form-control" required="">
            <option value="">NONE SELECTED</option>
            @if(count($priorities))
            @foreach($priorities as $row)
            <option value="{{$row->id}}">{{$row->title}}</option>
            @endforeach
            @endif
        </select>
    </div>
    <div class="form-group">
        <label for="category" class="form-label">Category <span class="required">*</span></label>
        <select name="category_id" id="category" class="form-control" required="">
            <option value="">NONE SELECTED</option>
            @if(count($categories))
            @foreach($categories as $row)
            <option value="{{$row->id}}">{{$row->title}}</option>
            @endforeach
            @endif
        </select>
    </div>
    <div class="form-group">
        <label for="attachment" class="form-label">Attachment</label>
        <input type="file" class="form-control" name="attachment" id="attachment"/>
    </div>

    <div class="form-group">
        <div class="col-md-12 col-md-offset-4">
            <a href="/studentboard" class="btn btn-danger">
                Cancel
            </a>                            
            <button type="submit" class="btn btn-success">
                Submit
            </button>                            
        </div> 
    </div>
</form>

@endsection
