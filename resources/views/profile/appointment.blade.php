<table>
    <caption>Свободные места</caption>
    <tr>
        <th>Мастер</th>
        <th>Специализация</th>
        <th>Дата</th>
        <th>Время</th>
        <th>Действие</th>
    </tr>
    @foreach($appointments as $appointment)
        <tr>
            <td>{{$appointment->master->specialization}}</td>
            <td>{{$appointment->master->name}}</td>
            <td>{{$appointment->date}}</td>
            <td>{{$appointment->time}}</td>
            <td>
                <form action="{{route('profile.appointment.create', ['appointment' => $appointment->id])}}"
                      method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit">
                        Записаться
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
