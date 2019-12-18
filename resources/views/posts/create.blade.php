@extends('layouts.app')
@section('content')
  

<h1>create post</h1>
{{-- <form method="POST" action="/posts"> --}}
   {!! Form::open(['method'=>'POST', 'action'=>'PostsController@store' , 'files'=>true]) !!}
      <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
      </div>
   
      <div class="form-group">
        
        {!! Form::file('uploadfile', ['class'=>'form-control']) !!}
      </div>
   
      {{-- <input type="text" name="title" placeholder="enter title.."> --}}
      {{csrf_field()}}
      {{-- <input type="submit" name="submit"> --}}
      {!! Form::submit('submit Post', ['class'=>'btn btn-info']) !!}

  {!! Form::close() !!}
  {{-- </form> --}}

@endsection