{{-- filepath: resources/views/dynamic_crud/edit.blade.php --}}
<h2>Sửa dữ liệu bảng: {{ $table }}</h2>
<form action="{{ route('dynamic_crud.update', [$table, $row->{$columns[0]}]) }}" method="POST">
    @csrf @method('PUT')
    @foreach($columns as $col)
        <label>{{ $col }}:</label>
        <input name="{{ $col }}" value="{{ $row->$col }}"><br>
    @endforeach
    <button type="submit">Cập nhật</button>
</form>
