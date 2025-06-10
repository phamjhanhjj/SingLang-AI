{{-- filepath: resources/views/dynamic_crud/create.blade.php --}}
<h2>Thêm mới vào bảng: {{ $table }}</h2>
<form action="{{ route('dynamic_crud.store', $table) }}" method="POST">
    @csrf
    @foreach($columns as $col)
        <label>{{ $col }}:</label>
        <input name="{{ $col }}"><br>
    @endforeach
    <button type="submit">Lưu</button>
</form>
