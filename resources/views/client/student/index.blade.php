@extends('client.templates.layout')
@section('title','Học Sinh')
@section('content')
    <div class="table-responsive">
			<div class="py-2">
				<a href="{{ route('student.create') }}" class="btn btn-primary">Tạo student</a>
			</div>
        <table class="table table-light table-striped ">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                </tr>
            </thead>
            @foreach ($students as $item)
                <tbody>
                    <tr class="">
                        <td scope="row">{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
@endsection
