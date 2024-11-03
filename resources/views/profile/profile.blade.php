<h1>Профиль</h1>
<p>{{ auth()->user()->name }}</p>
<p>{{ auth()->user()->email }}</p>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Выйти</button>
</form>

<p>
<form action="{{route('profile.appointment')}}" method="GET">
    @csrf
    <button type="submit">
        Записаться
    </button>
</form>
<table>
    <caption>Мои записи</caption>
    <tr>
        <th>Мастер</th>
        <th>Специализация</th>
        <th>Дата</th>
        <th>Время</th>
        <th>Действие</th>
    </tr>
    @if($appointments->isNotEmpty())
        @foreach($appointments as $appointment)
            <tr>
                <td>{{ $appointment->master->name }}</td>
                <td>{{ $appointment->master->specialization }}</td>
                <td>{{ $appointment->date }}</td>
                <td>{{ $appointment->time }}</td>
                <td>
                    <form method="POST"
                          action="{{ route('profile.appointment.delete', ['appointment' => $appointment->id]) }}">
                        @csrf
                        @method('PATCH')
                        <button type="submit">Отменить запись</button>
                    </form>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="5">Записи отсутствуют.</td>
        </tr>
    @endif
</table>
@if (session('success'))
    <div>
        {{ session('success') }}
    </div>
@endif

