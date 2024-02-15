<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

    <h2>Login</h2>

    @if(session('status'))
        <p>{{ session('status') }}</p>
    @endif

    <form method="POST" action="{{ route('storelog') }}">
    @csrf

        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>

        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <div>
    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    <label for="remember">Remember me</label>
</div>

        <button type="submit">Login</button>
    </form>

</body>
</html>
