<!DOCTYPE html>
<html>
<head>
    <title>Editar Producto - Gorilla</title>
</head>
<body>
    <h1>Editar Producto</h1>

    <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Nombre:</label>
        <input type="text" name="nombre" value="{{ $producto->nombre }}" required><br>

        <label>Descripción:</label>
        <textarea name="descripcion" required>{{ $producto->descripcion }}</textarea><br>

        <label>Precio:</label>
        <input type="number" step="0.01" name="precio" value="{{ $producto->precio }}" required><br>

        <label>Stock:</label>
        <input type="number" name="stock" value="{{ $producto->stock }}" required><br>

        <label>Categoría:</label>
        <select name="categoria_id" required>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->nombre }}
                </option>
            @endforeach
        </select><br>

        <label>Imagen actual:</label>
        <img src="{{ asset('imagenes/'.$producto->imagen) }}" width="80"><br>
        <label>Cambiar imagen:</label>
        <input type="file" name="imagen"><br><br>

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
