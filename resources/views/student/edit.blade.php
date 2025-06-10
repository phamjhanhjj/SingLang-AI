{{-- filepath: resources/views/students/edit.blade.php --}}
@extends('layouts.app')
@section('content')
    <h2>Sửa sinh viên</h2>
    <form action="{{ route('students.update', $student) }}" method="POST">
        @csrf @method('PUT')
        <label>ID:</label><input name="student_id" value="{{ $student->student_id }}" readonly><br>
        <label>Email:</label><input name="email_address" type="email" value="{{ $student->email_address }}" required><br>
        <label>Username:</label><input name="username" value="{{ $student->username }}" required><br>
        <label>Password (để trống nếu không đổi):</label><input name="password" type="password"><br>
        <label>Tuổi:</label><input name="age" type="number" value="{{ $student->age }}"><br>
        <label>Ngày sinh:</label><input name="date_of_birth" type="date" value="{{ $student->date_of_birth }}"><br>
        <label>Giới tính:</label><input name="gender" value="{{ $student->gender }}"><br>
        <button type="submit">Cập nhật</button>
    </form>
@endsection
