<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container d-flex align-items-center justify-content-center  vh-100">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Register</h3>
                @if (session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session()->get('error') }}
                    </div>
                @endif
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>
            <div class="card-body">

                <form method="POST" action="/register">
                    @csrf
                    <div class="form-outline mb-2">
                        <input name="name" type="text" class="form-control" value="{{ old('name') }}" />
                        <label class="form-label" for="name">Name</label>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-outline mb-2">
                        <input name="email" value="{{ old('email') }}" type="email" class="form-control" />
                        <label class="form-label" for="email">Email address</label>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-outline mb-2">
                        <select name="role" value="{{ old('role') }}" class="form-select"
                            aria-label="Default select example">
                            <option selected>---select role---</option>
                            <option value="admin">Admin</option>
                            <option value="super-admin">Super Admin</option>
                            <option value="user">User</option>
                        </select>
                        <label class="form-label" for="form1Example2">Select role</label>
                    </div>
                    @error('role')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-outline mb-2">
                        <input name="password" type="password" id="form1Example2" class="form-control" />
                        <label class="form-label" for="form1Example2">Password</label>
                    </div>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-outline mb-2">
                        <input name="password_confirmation" type="password" id="form1Example2" class="form-control" />
                        <label class="form-label" for="form1Example2">Confirm Password</label>
                    </div>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="row">
                        <div class="col-8">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <div class="col-4">
                            <a href="/login" class="">Login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
</script>

</html>
