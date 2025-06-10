{{-- filepath: resources/views/dynamic_crud/index.blade.php --}}
<h2>Bảng: {{ $table }}</h2>
<a href="{{ route('dynamic_crud.create', $table) }}">Thêm mới</a>
<table border="1" cellpadding="8">
    <thead>
        <tr>
            @foreach($columns as $col)
                <th>{{ $col }}</th>
            @endforeach
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $row)
        <tr>
            @foreach($columns as $col)
                <td>{{ $row->$col }}</td>
            @endforeach
            <td>
                <a href="{{ url('crud/'.$table.'/'.$row->{$columns[0]}.'/edit') }}">Sửa</a>
                <form action="{{ url('crud/'.$table.'/'.$row->{$columns[0]}) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Xóa?')">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
