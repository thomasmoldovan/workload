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
                                    <span class="">{{ $this->settings["APP_NAME"] }}</span>
                                </a>
                            </div>
                            
                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                        <p class="text-center small">Enter your username & password to login</p>
                                    </div>

                                    @if ($errors->any())
                                        <div>
                                            <div class="font-medium text-red-600">
                                                {{ __('Whoops! Something went wrong.') }}</div>

                                            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    @if (session('status'))
                                        <div class="mb-4 font-medium text-sm text-green-600">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <form class="row g-3 needs-validation" method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="col-12">
                                            <label for="name" class="form-label">{{ __('Name') }}</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                :value="old('name')" required autofocus autocomplete="name">
                                            <div class="invalid-feedback">Please, enter your name!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="email" class="form-label">{{ __('Email') }}</label>
                                            <input type="email" name="email" class="form-control" id="email"
                                                :value="old('email')" required>
                                            <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="password" class="form-label">{{ __('Password') }}</label>
                                            <input type="password" name="password" class="form-control" id="password"
                                                required autocomplete="new-password">
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="password_confirmation"
                                                class="form-label">{{ __('Confirm Password') }}</label>
                                            <input type="password" name="password_confirmation" class="form-control"
                                                id="password_confirmation" required autocomplete="new-password">
                                            <div class="invalid-feedback">Please confirm your password!</div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" name="terms" type="checkbox" value=""
                                                    id="acceptTerms" required>
                                                <label class="form-check-label" for="acceptTerms">I agree and accept the <a
                                                        href="#">terms and conditions</a></label>
                                                <div class="invalid-feedback">You must agree before submitting.</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Create Account</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">{{ __('Already registered?') }}
                                                <a href="{{ route('login') }}"> {{ __('Log In') }}</a>
                                            </p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </main>
@endsection
