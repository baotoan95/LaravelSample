<form action="{{route('GetName')}}" method="post">
	{{ csrf_field() }}
	<input type="text" name="hoTen"/>
	<input type="submit"/>
</form>