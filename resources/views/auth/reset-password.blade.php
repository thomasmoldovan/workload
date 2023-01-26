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

                            <div class="card p-3 mb-4 small text-gray-600">
                                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}

                                @if (session('status'))
                                    <div class="mb-4 font-medium text-sm text-green-600">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <div class="flex mt-3">
                                    <form class="needs-validation" method="POST" action="{{ route('password.update') }}">
                                        @csrf

                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                        <div class="block">
                                            <label for="email" class="form-label">{{ __('Email') }}</label>
                                            <input id="email" class="form-control" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                                        </div>

                                        <div class="mt-4">
                                            <label for="password" class="form-label">{{ __('Password') }}</label>
                                            <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                                        </div>

                                        <div class="mt-4">
                                            <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                                            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                                        </div>

                                        <div class="flex items-center justify-end mt-4">
                                            <button class="btn btn-primary btn-sm me-5">
                                                {{ __('Reset Password') }}
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
