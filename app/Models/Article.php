<?php

namespace App\Models;

use App\Models\Commentaire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{

    use HasFactory;
    protected $table = 'articles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nom',
        'image_url',
        'categorie',
        'description',
        'a_la_une',
    ];
    public function commentaire(){
        return $this->hasMany(Commentaire::class);
    }
}
