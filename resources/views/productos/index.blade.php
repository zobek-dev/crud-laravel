<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Productos</h1>
  <div>
    <a href="{{ route('producto.crear')}}">
      Añadir un producto
    </a>
  </div> 
  <div>
    @if(session()->has('success'))
      <span>
        {{ session('success')}}
      </span>  
    @endif
  </div>  
  <div>
    <table border="1">
      <thead>
        <tr>
          <th>
            Código
          </th>
          <th>
            Nombre
          </th>
          <th>
            Categoría
          </th>
          <th>
            Cantidad
          </th>
          <th>
            Precio
          </th>
          <th>
            Descripción
          </th>
          <th>
            Sucursal
          </th>
          <th>
            Editar
          </th>
          <th>
            Eliminar
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach ( $productos as $producto )
          <tr>
            <td>{{ $producto->producto_codigo }}</td>
            <td>{{ $producto->producto_nombre }}</td>
            <td>{{ $producto->producto_categoria }}</td>
            <td>{{ $producto->producto_cantidad }}</td>
            <td>{{ $producto->producto_precio }}</td>
            <td>{{ $producto->descripcion }}</td>
            @foreach ( $sucursales as $sucursal )
                @if ($producto->sucursal_id == $sucursal->sucursal_id)
                  <td>{{ $sucursal->nombre }}</td>
                @endif
            @endforeach
            <td>
              <a href="{{ route('producto.editar', ['producto' => $producto]) }}">Editar</a>
            </td>              
            <td>
              <form method="POST" action="{{ route('producto.eliminar', ['producto' => $producto ])}}">
                @csrf
                @method('delete')
                <button type="submit">Eliminar</button>
              </form>
            </td>
          </tr> 
        @endforeach
        
      </tbody>
    </table> 
  </div>
  <div style="margin: 32px 0;">
    <form action="{{ route('producto.index') }}" method="get">
      <div>
        <label for="buscar">Buscar:</label>
        <input type="text" name="codigo" id="buscar" placeholder="Buscar por código">
      </div>
      <button type="submit">Buscar</button>
    </form>
  </div>  
</body>
</html>