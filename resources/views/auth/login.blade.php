<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('bs/bootstrap.bundle.min.js') }}" defer></script>
    <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core/css/ionic.bundle.css" />
    <link href="{{ asset('bs/bootstrap.min.css') }}" rel="stylesheet">
    <style>
    body {
        background-color: #071C21;
    }

    .action-button {
        background-color: #C6DE41;
        color: #071C21;
        font-weight: 600;
    }

    .action-button:hover {
        background-color: #C6DE41;
        color: #071C21;
        font-weight: 600;
    }

    .remember-checkbox {
        background-color: transparent;
        border: 1px solid white;
    }

    .remove-focus:focus {
        outline: none;
        box-shadow: none;
        color: white;
    }

    .placeholder::placeholder {
        color: white;
    }

    .register-bottom-bar {
        width: 23vw;
    }

    .main-color {
        color: #C6DE41;
    }

    .second-color {
        color: #071C21;
    }

    .cursor {
        cursor: pointer;
    }
    </style>
    <title>Login</title>
</head>

<body class="d-flex">
    <div class="container my-auto">
        <div class="row">
            <div class="col">
                <img src="{{ asset('asset/Main Logo.png') }}" alt="" class="mx-auto d-block mb-3" style="width: 4vw;">
                <h2 class="text-center text-light mb-5">Login</h2>
            </div>
        </div>
        <form method="POST" action="{{ route('login') }}" id="login-form">
            @csrf

            <div class="row mb-3">
                <!-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> -->

                <div class="col-md-4 d-block mx-auto">
                    <input id="email" type="email"
                        class="form-control @error('email') is-invalid @enderror remove-focus bg-transparent placeholder text-light cursor"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                        placeholder="Email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <!-- <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> -->

                <div class="col-md-4 d-block mx-auto">
                    <input id="password" type="password"
                        class="form-control @error('password') is-invalid @enderror remove-focus bg-transparent placeholder text-light cursor"
                        name="password" required autocomplete="current-password" placeholder="Password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 d-block mx-auto">
                    <div class="form-check">
                        <input class="form-check-input remember-checkbox" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label text-light" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="row d-flex">
                <div class="col-md-4 mx-auto">
                    <a type="submit" class="btn action-button d-block mx-auto mb-2"
                        onClick="document.getElementById('login-form').submit()" role="button">
                        {{ __('Login') }}
                    </a>
                    <span class="text-secondary text-center mx-auto d-block mb-3">Forgot your password?</span>
                    <p class="text-light text-center mb-2">Don't have any account?</p>
                    <a href="/register" class="btn btn-light mx-auto d-block fw-semibold">Create new account</a>
                </div>
            </div>
        </form>
    </div>
</body>


</html>