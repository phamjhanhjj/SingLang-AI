<!DOCTYPE html>
<html>
<head>
    <title>Trang chủ</title>
</head>
<body>
    <h1>Chào mừng bạn đã đăng nhập thành công!</h1>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Đăng xuất</button>
    </form>
</body>
</html>
