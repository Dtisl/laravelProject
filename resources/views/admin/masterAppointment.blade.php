<table>
    <caption>Свободные записи</caption>
    <tr>
        <th>Дата</th>
        <th>Время</th>
        <th>Действие</th>
    </tr>
    @foreach($appointments as $appointment)
        <tr>
            <td>{{$appointment->date}}</td>
            <td>{{$appointment->time}}</td>
            <td>
                <form action="{{route('appointment.delete', $appointment)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit">Удалить запись</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
<form action="{{ route('master.add.appointment', ['master'=>$master->id]) }}" method="POST">
    @csrf
    <label>Дата</label>
    <input type="date" name="date">
    <label>Время</label>
    <input type="time" name="time">
    <button type="submit">Добавить</button>
    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif
</form>
