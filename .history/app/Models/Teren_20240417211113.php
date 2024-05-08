<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teren extends Model
{
    /**
     * Atribuie coloanele care pot fi umplute în masă.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'suprafata', 'mentiuni',
    ];

    /**
     * Atribuie coloana cheii primare.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Specifică dacă coloana cheii primare este de tip incrementare auto.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Specifică dacă modelele trebuie să fie marcate cu un timestamp.
     *
     * @var bool
     */
    public $timestamps = true;

    // Poți adăuga aici și alte metode sau relații dacă este necesar

    protected $table = 'terenuri';

}
