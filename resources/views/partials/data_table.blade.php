@if($data->isEmpty())
    <p>Không có dữ liệu.</p>
@else
    <table border="1" cellpadding="8">
        <thead>
            <tr>
                @foreach(array_keys($data->first()->getAttributes()) as $col)
                    <th>{{ $col }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
                <tr>
                    @foreach($row->getAttributes() as $value)
                        <td>{{ $value }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
