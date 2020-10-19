@extends('welcome')
@section('content')
<div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
<div class="text-center text-sm text-gray-500 sm:text-left">
<form action="/bookmarks/{{$bookmark->id}}" method="POST">
{{ csrf_field() }}
<input type="hidden" name="_method" value="PUT">
TITLE:<input type="text" name="title" value="{{$bookmark->title}}"><br>
NUMBER:<input type="text" name="number" value="{{$bookmark->number}}"><br>
COMPLETE:<input type="checkbox" name="completed" value="1" {{ $bookmark->completed ? 'checked' :''}}><br>
<input type="submit" value="UPDATE">
</form>
<form action="/bookmarks/{{$bookmark->id}}" method="POST">
{{ csrf_field() }}
<input type="hidden" name="_method" value="DELETE">
<input type="submit" value="DELETE">
</form>
</div></div>
@endsection