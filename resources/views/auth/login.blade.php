@extends('admin/authentication')

@section('admin')
    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <div class="d-flex justify-content-center">
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

                                    <form class="row g-3 needs-validation" method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="col-12">
                                            <label for="email" class="form-label">Email</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="email" name="email" class="form-control" id="email"
                                                    required autofocus>
                                                <div class="invalid-feedback">Please enter your email.</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                required autocomplete="current-password">
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember_me" value="true"
                                                    id="remember_me">
                                                <label class="form-check-label" for="remember_me">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100 hover:btn-success" type="submit">Login</button>
                                        </div>
                                        @if (Route::has('password.request'))
                                        <div class="col-12">
                                            <p class="small mb-0">Forgot your password? 
                                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                                    {{ __('Forgot your password?') }}
                                                </a>
                                            </p>
                                        </div>
                                        @endif
                                        <div class="col-12">
                                            <p class="small mb-0">Don't have account? 
                                                <a href="{{ route('register') }}">Create an account</a>
                                            </p>
                                        </div>
                                    </form>

                                </div>
                            </div>

                            <div class="credits">
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main>
@endsection
