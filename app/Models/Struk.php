<?php

namespace App\Models;

use App\Models\Pembelian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Struk extends Model
{
    use HasFactory;

    protected $primaryKey = 'struk_id';
    protected $guarded = [];
    protected $fillable = [
    'pembelian_id',
    'struk'
    ];

    public function pembelian()
    {
        return $this->hasMany(Pembelian::class, 'struk_id', 'struk_id');
    }
}
