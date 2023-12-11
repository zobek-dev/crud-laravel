<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
      'producto_codigo',
      'producto_nombre',
      'producto_categoria',
      'producto_cantidad',
      'producto_precio',
      'descripcion',
      'sucursal_id',    
    ];

    protected $table = "productos";
    protected $primaryKey = "producto_id";

    public $timestamps = true;


    public function Sucursal(){
      return $this->belongsTo(Sucursal::class, 'sucursal_id');
    }
}
