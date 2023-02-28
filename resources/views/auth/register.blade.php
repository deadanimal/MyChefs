@extends('auth.layout')

@section('content')
    <div class="d-flex flex-column align-items-center w-lg-50 h-100 px-3 px-lg-5 pt-5">
        <div class="w-100 mt-auto" style="max-width: 526px;">
            <h1>No account? Sign up</h1>
            <p class="pb-3 mb-3 mb-lg-4">Have an account already?&nbsp;&nbsp;<a href='/login'>Sign
                    in here!</a></p>
            <form class="needs-validation" action="/register" method="POST" novalidate>
                @csrf

                @if($type == 'chef')
                <input type="hidden" name="user_type" value="chef">
                @else
                <input type="hidden" name="user_type" value="foodie">
                @endif
                <div class="row row-cols-1 row-cols-sm-2">
                    <div class="col mb-4">
                        <input class="form-control form-control-lg" type="text" name="name" placeholder="Your name" required>
                    </div>
                    <div class="col mb-4">
                        <input class="form-control form-control-lg" type="email" name="email" placeholder="Email address" required>
                    </div>
                </div>
                <div class="password-toggle mb-4">
                    <input class="form-control form-control-lg" type="password" placeholder="Password" name="password" required>
                    <label class="password-toggle-btn" aria-label="Show/hide password">
                        <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                    </label>
                </div>
                <div class="password-toggle mb-4">
                    <input class="form-control form-control-lg" type="password" placeholder="Confirm password" name="password_confirmation" required>
                    <label class="password-toggle-btn" aria-label="Show/hide password">
                        <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                    </label>
                </div>
                <div class="pb-4">
                    <div class="form-check my-2">
                        <input class="form-check-input" type="checkbox" id="terms">
                        <label class="form-check-label ms-1" for="terms">I agree to <a href="/terms">Terms
                                &amp; Conditions</a></label>
                    </div>
                </div>
                <button class="btn btn-lg btn-primary w-100 mb-4" type="submit">Sign up</button>
            </form>
        </div>
        <!-- Copyright-->
        <p class="w-100 fs-sm pt-5 mt-auto mb-5" style="max-width: 526px;">
            <span class="text-muted">&copy; All rights reserved.</span>
        </p>
    </div>
@endsection
