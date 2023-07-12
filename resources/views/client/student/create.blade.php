@extends('client.templates.layout')
@section('title', 'Tạo Student')
@section('content')
    <div class="container">
			<div class="py-2">
				<a href="{{route('student')}}" class="btn btn-primary">Trở về</a>
			</div>
        <form method="post" action="{{ route('student.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
            </div>
						<br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
