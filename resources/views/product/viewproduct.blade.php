
@extends('layouts.app-master')

@section('content')
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	{{$data->name}}
	{{$data->description}}

	<iframe height="600px"  width="100%" src="/assets/{{$data->file}}"></iframe>

</body>
</html>
@endsection
