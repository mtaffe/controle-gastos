<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrimaryIncome extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "name",
        "value",
    ];

     /**
     * Vínculo com a tabela de usuários
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
