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
        'unit_id',
        'volume',
    ];

    public function units()
    {
        return $this->belongsTo(unit::class, 'unit_id', 'id');
    }
}
