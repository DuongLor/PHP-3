@extends('client.templates.layout')
@section('title', 'Học Sinh')
@section('content')
    <div class="table-responsive">
        <div class="py-2">
            <a href="{{ route('route_student_create') }}" class="btn btn-primary">Tạo student</a>
        </div>
        <table class="table table-light table-striped ">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
										<th scope="col">thumbnail</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            @foreach ($students as $item)
                <tbody>
                    <tr class="">
                        <td scope="row">{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td><img src="{{ $item->thumbnail ? '' . Storage::url($item->thumbnail) : '' }}" style="width: 300px" /></td>
                        <td>
                            <a href="{{ route('student.edit', $item->id) }}" class="me-2"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                            <a href="{{ route('student.delete', $item->id) }}"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
@endsection
