<h1>Nuevo Ticket</h1>
<form
    method="POST"
    action="{{ route('tickets.store') }}">
    @csrf
    <div>
        <label>Título</label>
        <input
            type="text"
            name="titulo"
            value="{{ old('titulo') }}">
        @error('titulo')
        <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label>Descripción</label>
        <textarea
            name="descripcion">{{ old('descripcion') }}</textarea>
        @error('descripcion')
        <p>{{ $message }}</p>
        @enderror
    </div>
    <button type="submit">
        Crear ticket
    </button>
</form>