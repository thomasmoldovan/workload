@extends('admin/authentication')

@section('admin')
    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <div class="d-flex justify-content-center py-4">
                                <a href="/" class="logo d-flex align-items-center w-auto pb-5">
                                    <span class="">{{ $_ENV["APP_NAME"] }}</span>
                                </a>
                            </div>

                            <div class="card p-3 mb-4 small text-gray-600">
                                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}

                                @if (session('status'))
                                    <div class="mb-4 font-medium text-sm text-green-600">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <div class="flex mt-3">
                                    <form class="needs-validation" method="POST" action="{{ route('password.email') }}">
                                        @csrf

                                        <div class="col-12">
                                            <label for="email" class="form-label">{{ __('Email') }}</label>
                                            <input type="email" name="email" class="form-control form-control-sm" id="email"
                                                :value="old('email')" required autofocus>
                                            <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                        </div>

                                        <div class="mt-3">
                                            <button class="btn btn-primary btn-sm me-5" type="submit">
                                                {{ __('Email Password Reset Link') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
