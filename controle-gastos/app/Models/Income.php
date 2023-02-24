<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "name",
        "income_type",
        "primary_income",
        "frequency",
        "value",
    ];

     /**
     * Vínculo com a tabela de usuários
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ies()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
