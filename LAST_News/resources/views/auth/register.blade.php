<!DOCTYPE html>

<html>
<head>
    <title>Registration</title>
</head>
<body>

    <h2>Registration</h2>

    @if(session('status'))
        <p>{{ session('status') }}</p>
    @endif

    <form method="POST" action="{{ route('store') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>

        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>

        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" required>
        <br>

        <button type="submit">Register</button>
    </form>

</body>
</html>
