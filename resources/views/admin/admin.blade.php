<h1>Админ-панель</h1>
<p>{{ auth()->user()->name }}</p>
<p>{{ auth()->user()->email }}</p>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Выйти</button>
</form>

<table>
    <caption>Мастера</caption>
    <tr>
        <th>Мастер</th>
        <th>Специализация</th>
        <th>Действие</th>
    </tr>
    @foreach($masters as $master)
        <tr>
            <td>{{ $master->name }}</td>
            <td>{{ $master->specialization }}</td>
            <td>
                <form action="{{ route('master.appointment', $master->id)}}" method="GET">
                    @csrf
                    <button>Управление записями</button>
                </form>
            </td>
            <td>
                <form action="{{ route('master.delete', $master->id) }}" method="POST"
                      onsubmit="return confirm('Вы уверены, что хотите удалить?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
            </td>
        </tr>

    @endforeach
</table>
<form method="POST" action="{{route('master.add')}}">
    @csrf
    <label>Имя</label>
    <input type="text" name="name">
    <br>
    <label>Специализация</label>
    <input type="text" name="specialization">
    <br>
    <button type="submit">Добавить мастера</button>
</form>
@if (session('success'))
    <div>
        {{ session('success') }}
    </div>
@endif
