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

    public function search($filter = null)
    {
        $results = $this->where(function ($query) use($filter) {
            if ($filter) {
                $query->where('valor_cota', 'LIKE', "%{$filter}%");
            }
        })//->toSql();
        ->paginate();

        return $results;
    }

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

    public function contrato() {
        return $this->hasMany('App\Contrato');
    }
    
    public function setor()
    {
        return $this->belongsTo('App\ContratoSetor', 'contrato_setor_id')->withTrashed();
    }
}