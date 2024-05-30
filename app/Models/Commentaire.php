<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commentaire extends Model
{
    use HasFactory;

    protected $table = 'commentaires';
    protected $primaryKey = 'id';
    protected $fillable = [
        'article_id',
        'contenu',
        'nom_complet_auteur',
    ];

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
