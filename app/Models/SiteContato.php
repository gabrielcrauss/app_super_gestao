<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Para encontrar a tabela no banco o ORM vai transformar o nome da Model em site_contatos
//SiteContato
//site_Contato
//site_contatos

class SiteContato extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'email', 'motivo_contatos_id', 'telefone', 'mensagem'];
    
}
