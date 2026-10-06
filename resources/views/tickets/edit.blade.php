<h1>Editar Ticket</h1>
<form
    method="POST"
    action="{{ route('tickets.update', $ticket) }}">
    @csrf
    @method('PUT')
    <div>
        <label>Título</label>
        <input
            type="text"
            name="titulo"
            value="{{ old('titulo', $ticket->titulo) }}">
        @error('titulo')
        <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label>Descripción</label>
        <textarea
            name="descripcion">{{ old('descripcion', $ticket->descripcion) }}</textarea>
        @error('descripcion')
        <p>{{ $message }}</p>
        @enderror
    </div>
    <button type="submit">
        Actualizar ticket
    </button>
</form>