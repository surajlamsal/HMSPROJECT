@extends('front.layout')

@section('title', 'HMS - Home')

@section('content')
    <div class="py-20" style="background-image: url('images/auth-bg.jpg');background-size: cover;">
        <div class="wrapper">
            <div class="max-w-[450px] mx-auto bg-white rounded p-6 shadow-lg">
                <h3 class="text-2xl font-bold text-center mb-3">Create New Account</h3>

                <form action="/register" method="post">

                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" name="name" id="name" class="form-control" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                    </div>

                    <button type="submit" class="btn w-full mt-3">
                        Create New Account
                    </button>

                </form>
            </div>
        </div>
    </div>

@endsection
