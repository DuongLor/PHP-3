@extends('client.templates.layout')
@section('title', 'Đăng nhập')
@section('style')
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .form-container {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            border-radius: 1rem;
            padding: 30px;
        }

        input[type="text"],
        input[type="password"] {
            border-radius: 10rem;
        }

        button {
            border-radius: 10rem;
            background: linear-gradient(to right, #1380e6, #12d012);
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.2);
        }

        .social-login i {
            font-size: 1.5rem;
            margin-right: 10px;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 form-container">
                <h3 class="text-center mb-4">Đăng nhập</h3>
                <form action="{{ route('login.store') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fas fa-user"></i>
                        </span>
                        <input type="text" class="form-control" name="email" placeholder="Username">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fas fa-key"></i>
                        </span>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary btn-block mt-4 " type="submit">Đăng nhập</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
