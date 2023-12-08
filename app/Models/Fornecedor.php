<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Fornecedor extends Model
{
    use HasFactory;
    use SoftDeletes;

    // Ajusta o nome da tabela no Model para ORM
    protected $table = 'fornecedores';

    // Autoriza a método estático create utilize essas variaveis
    protected $fillable = ['nome', 'site', 'uf', 'email'];

}
