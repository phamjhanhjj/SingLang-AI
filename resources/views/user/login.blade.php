<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Đăng nhập</title>
    <head>
    <body>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label>User_name:</label>
            <input type="text" name="username" required>
            <br>
            <label>Password:</label>
            <input type="password" name="password" required>
            <br>
            <button type="submit">Đăng nhập</button>
            @if ($errors->any())
                <dix>{{ $errors->first() }}</dix>
            @endif
        </form>
    </body>
</html>
