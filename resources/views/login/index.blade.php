<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Login/Registration Form Transition</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
  <link rel="stylesheet" href="/css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
@if (session()->has('success'))
    @php
    echo "
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '".session('success')."',
        })
    </script>
    ";
    @endphp
@endif
@if (session()->has('error'))
    @php
    echo "
    <script>
    Swal.fire({
        icon: 'error',
        title: 'error!',
        text: '".session('error')."',
        })
    </script>
    ";
    @endphp
@endif

@error('email')
    @php
        echo "
        <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Insert valid Format!',
            });
        </script>
        ";
    @endphp
@enderror
<!-- partial:index.partial.html -->
<div class="cont mt-2">
    <form action="/login" method="post">
        @csrf
        <div class="form sign-in">
            <h2>Welcome back,</h2>
            <label>
            <span>Email</span>
            <input type="email" name="email" value="{{ old('email') }}" required>
            </label>
            <label>
            <span>Password</span>
            <input type="password" name="password" required>
            </label>
            <button type="submit" class="submit">Sign In</button>
            <label>
                <p>Don't have account? Login</p><a href="/"> As Guest Here!</a>
            </label>
        </div>
    </form>
    <form action="/register" method="post">
        @csrf
    <div class="sub-cont ">
        <div class="img">
        <div class="img__text m--up">
            <h2>New here?</h2>
            <p>Sign up and discover great amount of new opportunities!</p>
        </div>
        <div class="img__text m--in">
            <h2>One of us?</h2>
            <p>If you already has an account, just sign in. We've missed you!</p>
        </div>
        <div class="img__btn">
            <span class="m--up">Sign Up</span>
            <span class="m--in">Sign In</span>
        </div>
        </div>
        <div class="form sign-up">
        <h2>Time to feel like home,</h2>
        <label>
            <span>Name</span>
            <input type="text" name="name" value="{{ old('name') }}" required/>
            @error('name')
            <p style="color:red">{{ $message }}</p>
            @enderror
        </label>
        <label>
            <span>Username</span>
            <input type="text" name="username" value="{{ old('username') }}" required/>
            @error('username')
            <p style="color:red">{{ $message }}</p>
            @enderror
        </label>
        <label>
            <span>Email</span>
            <input type="email" name="email" value="{{ old('email') }}" required/>
            @error('email')
            <p style="color:red">{{ $message }}</p>
            @enderror
        </label>
        <label>
            <span>Password</span>
            <input type="password" name="password" required/>
            @error('password')
            <p style="color:red">{{ $message }}</p>
            @enderror
        </label>
        <button type="submit" class="submit">Sign Up</button>
        </div>
    </div>
    </form>
</div>

<!-- <a href="https://dribbble.com/shots/3306190-Login-Registration-form" target="_blank" class="icon-link">
  <img src="http://icons.iconarchive.com/icons/uiconstock/socialmedia/256/Dribbble-icon.png">
</a>
<a href="https://twitter.com/NikolayTalanov" target="_blank" class="icon-link icon-link--twitter">
  <img src="https://cdn1.iconfinder.com/data/icons/logotypes/32/twitter-128.png">
</a> -->
<!-- partial -->
  <script  src="/js/script.js"></script>

</body>
</html>
