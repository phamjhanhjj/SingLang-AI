{{-- filepath: resources/views/students/create.blade.php --}}
@extends('layouts.app')
@section('content')
    <h2>Thêm sinh viên</h2>
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <label>ID:</label><input name="student_id" required><br>
        <label>Email:</label><input name="email_address" type="email" required><br>
        <label>Username:</label><input name="username" required><br>
        <label>Password:</label><input name="password" type="password" required><br>
        <label>Tuổi:</label><input name="age" type="number"><br>
        <label>Ngày sinh:</label><input name="date_of_birth" type="date"><br>
        <label>Giới tính:</label><input name="gender"><br>
        <button type="submit">Lưu</button>
    </form>
@endsection
