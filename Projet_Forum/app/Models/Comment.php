<?php

namespace App\Models;
use App\Models\Publication;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['content','user_id','publication_id','parent_id'];


    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }

    public function delete()
    {
        // Supprimez également les réponses imbriquées
        // $this->replies()->delete();

        parent::delete();
    }

        public function parseContent()
        {
            preg_match_all("/\[link='(.*?)'\]/", $this->content, $matchesLinks);
            preg_match_all("/\[image='(.*?)'\]/", $this->content, $matchesImages);
    
            $links = $matchesLinks[1];
            $images = $matchesImages[1];
    
            return [
                'links' => $links,
                'images' => $images,
            ];
        }
    

}
