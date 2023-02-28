@extends('auth.layout')

@section('content')
    <div class="d-flex flex-column align-items-center w-lg-50 h-100 px-3 px-lg-5 pt-5">
        <div class="w-100 mt-auto" style="max-width: 526px;">
            <h1>Sign in to Around</h1>
            <p class="pb-3 mb-3 mb-lg-4">Don't have an account yet?&nbsp;&nbsp;<a href='/register'>Register
                    here!</a></p>
            <form class="needs-validation" action="/login" method="POST" novalidate>
                @csrf
                <div class="pb-3 mb-3">
                    <div class="position-relative"><i
                            class="ai-mail fs-lg position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                        <input class="form-control form-control-lg ps-5" type="email" placeholder="Email address" required>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="position-relative"><i
                            class="ai-lock-closed fs-lg position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                        <div class="password-toggle">
                            <input class="form-control form-control-lg ps-5" type="password" placeholder="Password"
                                required>
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                                <input class="password-toggle-check" type="checkbox"><span
                                    class="password-toggle-indicator"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap align-items-center justify-content-between pb-4">
                    {{-- <form-check class="my-1">
                        <input class="form-check-input" type="checkbox" id="keep-signedin">
                        <label class="form-check-label ms-1" for="keep-signedin">Keep me signed in</label>
                    </form-check> --}}
                    <a class="fs-sm fw-semibold text-decoration-none my-1"
                        href="/forgot-password">Forgot password?</a>
                </div>
                <button class="btn btn-lg btn-primary w-100 mb-4" type="submit">Sign in</button>

            </form>
        </div>
        

        <p class="w-100 fs-sm pt-5 mt-auto mb-5" style="max-width: 526px;">
            <span class="text-muted">&copy; All rights reserved.</span>
        </p>
    </div>
@endsection
