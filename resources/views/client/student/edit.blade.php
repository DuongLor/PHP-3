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
                        <img id="mat_truoc_preview" src="{{ $student->thumbnail ? '' . Storage::url($student->thumbnail) : '' }}"
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
@section('script')
    <script>
        $(function() {
            function readURL(input, selector) {
                if (input.files && input.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        $(selector).attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#cmt_truoc").change(function() {
                readURL(this, '#mat_truoc_preview');
            });
        });
    </script>
@endsection
