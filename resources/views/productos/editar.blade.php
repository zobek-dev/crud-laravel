<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Editar un producto</h1>
  <form action="{{ route('producto.actualizar', ['producto' => $producto]) }}" method="post">
    @csrf
    @method('put')
    {{ $producto }}
    <div>
      <label for="codigo">Código</label>
      <input type="text" name="producto_codigo" placeholder="Codigo del producto" id="codigo" value="{{ $producto->producto_codigo }}">
    </div>
    <div>
      <label for="nombre">Nombre</label>
      <input type="text" name="producto_nombre" placeholder="Nombre del producto" id="nombre" value="{{ $producto->producto_nombre }}">
    </div>
    <div>
      <label for="categoria">Categoría</label>
      <input type="text" name="producto_categoria" placeholder="Categoría del producto" id="categoria" value="{{ $producto->producto_categoria }}">
    </div>
    <div>
      <label for="cantidad">Cantidad</label>
      <input type="number" name="producto_cantidad" value="1" min="0" id="cantidad" value="{{ $producto->producto_cantidad }}">
    </div>
    <div>
      <label for="precio">Precio</label>
      <input type="text" name="producto_precio" placeholder="Precio del producto" id="precio" value="{{ $producto->producto_precio }}">
    </div>
    <div>
      <label for="descripcion">Descripcion</label>
      <input type="text" name="descripcion" placeholder="Descripción" id="descripcion" value="{{ $producto->descripcion }}">
    </div>
    <div>
      <label for="secursal">Sucursal</label>
      <select name="sucursal_id" id="sucursal">
        @foreach ($sucursales as $sucursal )
          <option value="{{ $sucursal->sucursal_id }}" @if($sucursal->sucursal_id == $producto->sucursal_id)selected="true"@endif>{{ $sucursal->nombre }}</option>  
        @endforeach
      </select>
    </div>

    <button type="submit">Actualizar</button>
  </form>
</body>
</html>