<?php

namespace App;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasSlug;
    protected $table = 'contratos';

    protected $fillable = ['image', 'participacao', 'titulo', 'sub_titulo', 'descricao', 'descricao_longa', 'rentabilidade_alvo', 'contrato_setor_id', 'body_3', 'body', 'body_2', 'valor_captado', 'valor_cota', 'status', 'slug', 'investidor'];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('titulo')
            ->saveSlugsTo('slug');
    }
    
    public function user() {
        return $this->hasMany('App\ContratoUser');
    }
    
    public function setor()
    {
        return $this->belongsTo('App\ContratoSetor', 'contrato_setor_id')->withTrashed();
    }
}