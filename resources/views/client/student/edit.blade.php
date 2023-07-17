@extends('client.templates.layout')
@section('title', 'Sửa student')
@section('content')
    <div>
        <form method="post" action="{{ route('student.update', $student->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name"
                    value="{{ $student->name }}">
            </div>
            <div class="form-group py-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email"
                    value="{{ $student->email }}">
            </div>
            <div class="col-md-9 col-sm-8">
                <div class="row">
                    <div class="col-xs-6">
                        <img id="mat_truoc_preview"
                            src="@if ($student->thumbnail) {{ Storage::url($student->thumbnail) }} @endif https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg"
                            alt="your image" style="max-width: 200px; height:100px; margin-bottom: 10px;"
                            class="img-fluid" />
                        <input type="file" name="image" accept="image/*"
                            class="form-control-file @error('image') is-invalid @enderror" id="cmt_truoc">
                        <label for="cmt_truoc">Mặt trước</label><br />
                    </div>
                </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
