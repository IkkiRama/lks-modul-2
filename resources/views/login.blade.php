<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset("css/riset.css") }}">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <link rel="stylesheet" href="{{ asset("css/form.css") }}">

    <style>
        /* .containerLogin{
            width: 100%;
        } */
    </style>
</head>
<body>
    <div class="containerLogin">
        <div class="container">
        <div class="login">
                <h2>Login</h2>
                <form action="{{ url("/login") }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="@error("email")
                            is-invalid
                        @enderror">

                        @error("email")
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="@error("password")
                            is-invalid
                        @enderror">

                        @error("password")
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
