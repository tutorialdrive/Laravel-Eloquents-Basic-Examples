@extends('layouts.app')

@section('content')

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
<div class="pull-left">
    <h3>Student Board</h3>
</div>
<a href="/studentboard/add" class="pull-right btn btn-info marbtm10"><i class="glyphicon glyphicon-plus"></i>Add</a>
<div class="table-responsive">          
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Priority</th>
                <th>Posted By</th>
                <th>College</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if(count($records))
            @foreach($records as $row)
            <tr>
                <td><a href="/studentboard/view/{{$row->id}}">{{$row->title}}</a></td>
                <td>{{$row->category->title}}</td>
                <td>{{$row->priority->title}}</td>
                <td>{{$row->posted_by}}</td>
                <td>{{$row->college->title}}</td>
                <td>
                    <form class="removeStudentRecord" method="POST" action="{{ route('studentRecord.destroy', [$row->id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="6" class="text-center">
                    No records to display                    
                </td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
