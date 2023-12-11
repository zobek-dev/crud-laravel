<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;

    protected $fillable = [
      'nombre'     
    ];

    protected $table = "sucursales";
    protected $primarykey = "sucursal_id";

    public $timestamps = true;

    public function Producto(){
      return $this->hasMany(Producto::class, 'sucursal_id', 'sucursal_id');
    }

}
