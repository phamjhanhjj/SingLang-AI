{{-- filepath: resources/views/students/show.blade.php --}}
@extends('layouts.app')
@section('content')
    <h2>Thông tin sinh viên</h2>
    <ul>
        <li>ID: {{ $student->student_id }}</li>
        <li>Email: {{ $student->email_address }}</li>
        <li>Username: {{ $student->username }}</li>
        <li>Tuổi: {{ $student->age }}</li>
        <li>Ngày sinh: {{ $student->date_of_birth }}</li>
        <li>Giới tính: {{ $student->gender }}</li>
    </ul>
    <a href="{{ route('students.index') }}">Quay lại danh sách</a>
@endsection
