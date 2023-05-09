<!-- Đăng kí -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/sign_in_up.css') }}" rel="stylesheet">
    <title>Details</title>
</head>
<body>
<div class="container">
    <form method="POST" action="{{ url('admin/register') }}">
        @csrf
        <h2>Đăng kí</h2>
        <label for="name"><b>Name</b></label>
        <input id="name" placeholder="Name" type="text" name="name" >
        @error('name')
        <div style="color: red"  class="error-message">{{ $message }}</div>
        @enderror
        <label for="email"><b>Email</b></label>
        <input id="email" placeholder="Email" type="email" name="email" >
        @error('email')
        <div style="color: red"  class="error-message">{{ $message }}</div>
        @enderror
        <label for="password"><b>Password</b></label>
        <input id="password" placeholder="Password" type="password" name="password" >
        @error('password')
        <div style="color: red"  class="error-message">{{ $message }}</div>
        @enderror
        <label for="confirm-password"><b>Password Confirmation</b></label>
        <input id="password_confirmation" placeholder="Password Confirmation" type="password" name="password_confirmation" >
        @error('password_confirmation')
        <div style="color: red"  class="error-message">{{ $message }}</div>
        @enderror
        <button type="submit">Đăng kí</button>
        <a href="{{route('login')}}">Login</a>
    </form>
</div>
</body>

