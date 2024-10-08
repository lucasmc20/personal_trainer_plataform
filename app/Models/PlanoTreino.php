<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanoTreino extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dias()
    {
        return $this->hasMany(Dia::class);
    }

    public static function createPlano(User $cliente, string $objetivo, string $youtube_link)
    {
        $plano = new PlanoTreino();
        $plano->objetivo = $objetivo;
        $plano->youtube_link = $youtube_link;
        $plano->user()->associate($cliente);
        $plano->save();
    }


}
