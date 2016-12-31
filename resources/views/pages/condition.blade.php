@if($name != "")
	{{$name}}
@else
	{{ "No name to show" }}
@endif

<br/>

{{ $name or "No name to show"}}

{{-- For --}}
<br/>
@for($i = 0; $i < 3; $i++)
	{!! "Count " . $i . "<br/>" !!}
@endfor

<?php $animals = ['Bear', 'Dog', 'Cat', 'Crow']; ?>

@foreach($animals as $animal)
	{{ $animal }}
@endforeach

<br/>

@forelse($animals as $animal)
	{{ $animal }}
@empty
	{{ "Array is empty" }}
@endforelse