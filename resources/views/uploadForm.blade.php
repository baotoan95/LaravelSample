<form action="{{route('uploadFile')}}" method="post" enctype="multipart/form-data">
	{{csrf_field()}}
	<input type="file" name="myFile"/>
	<input type="text" name="fileName"/>
	<input type="submit"/>
</form>