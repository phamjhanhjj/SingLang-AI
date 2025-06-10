{{-- filepath: resources/views/students/index.blade.php --}}
@extends('layouts.app')
@section('content')
    <h2>Danh sách sinh viên</h2>
    <a href="{{ route('students.create') }}">Thêm sinh viên</a>
    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Username</th>
                <th>Tuổi</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->student_id }}</td>
                <td>{{ $student->email_address }}</td>
                <td>{{ $student->username }}</td>
                <td>{{ $student->age }}</td>
                <td>{{ $student->date_of_birth }}</td>
                <td>{{ $student->gender }}</td>
                <td>
                    <a href="{{ route('students.show', $student) }}">Xem</a> |
                    <a href="{{ route('students.edit', $student) }}">Sửa</a> |
                    <form action="{{ route('students.destroy', $student) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Xóa sinh viên này?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
