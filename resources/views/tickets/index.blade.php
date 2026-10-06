<h1>Tickets</h1>
@if(session('success'))
<p>
    {{ session('success') }}
</p>
@endif
@can('crear tickets')
<a href="{{ route('tickets.create') }}">
    Nuevo Ticket
</a>
@endcan
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Usuario</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tickets as $ticket)
        <tr>
            <td>
                {{ $ticket->id }}
            </td>
            <td>
                {{ $ticket->titulo }}
            </td>
            <td>
                {{ $ticket->user->name }}
            </td>
            <td>
                {{ $ticket->estado }}
            </td>
            <td>
                <a
                    href="{{
route(
'tickets.show',
$ticket
)
}}">
                    Ver
                </a>
                @can('editar tickets')
                <a
                    href="{{
route(
'tickets.edit',
$ticket
)
}}">
                    Editar
                </a>
                @endcan
                @can('cerrar tickets')
                @if($ticket->estado === 'abierto')
                <form
                    method="POST"
                    action="{{
route(
'tickets.cerrar',
$ticket
)
}}">
                    @csrf
                    @method('PATCH')
                    <button type="submit">
                        Cerrar
                    </button>
                </form>
                @endif
                @endcan
            </td>
        </tr>
        @endforeach
    </tbody>
</table>