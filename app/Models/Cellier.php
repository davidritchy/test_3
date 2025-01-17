<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cellier extends Model
{
    use HasFactory;

    protected $table = 'cellier';

    protected $fillable = [
        'nom_cellier',
        'created_at',
        'updated_at'];
}
