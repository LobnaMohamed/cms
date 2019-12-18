    @extends('layouts.app')
    @section('content')
    

    <h1>edit post</h1>
    <form method="POST" action="/posts/{{$post->id}}">
        {!! Form::model($post,['method'=>'PATCH', 'action'=>['PostsController@update',$post->id]]) !!}

        {{-- because it is not post request --}}
        {{-- <input type="hidden" name="_method" value="PUT">
        <input type="text" name="title" value = "{{$post->title}}" > --}}
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
      
       
       
        {{csrf_field()}}
        {{-- <input type="submit" name="UPDATE"> --}}
        {!! Form::submit('update', ['class'=>'btn btn-info']) !!}


        {!! Form::close() !!}

        {!! Form::model(['method'=>'DELETE', 'action'=>['PostsController@destroy',$post->id]]) !!}
         {!! Form::submit('delete', ['class'=>'btn btn-danger']) !!}
        
        {!! Form::close() !!}
    {{-- </form> --}}
    {{-- <form method="POST" action="/posts/{{$post->id}}">
        <input type="hidden" name="_method" value="DELETE">
        {{csrf_field()}}
        <input type="submit" name="DELETE">
        

    </form> --}}

    @endsection