<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stocks';
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_barang',
        'hargabeli',
        'hargajual',
        'photo',
        'volume',
        'satuan',
    ];

    public function units()
    {
        return $this->belongsTo(unit::class, 'satuan', 'satuan');
    }
}
