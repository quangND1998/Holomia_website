<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryContent extends Model
{
    use HasFactory;
    protected $table = 'category_contents';
    protected $fillable = ['id', 'title', 'id_priority', 'section_id',  'created_at', 'updated_at'];


    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function contents()
    {
        return $this->morphMany(Content::class, 'contentable')->orderBy('id_priority', 'asc')->orderBy('id', 'asc');
    }
    public function languages()
    {
        return $this->morphMany(Languages::class, 'languageable');
    }

    public function scopeWithCompleteTranslations(Builder $query): Builder
    {
        $type = static::class;

        return $query->whereExists(function ($sub) use ($type) {
            $sub->selectRaw('1')
                ->from('languages as lt')
                ->whereColumn('lt.languageable_id', 'category_contents.id')
                ->where('lt.languageable_type', '=', $type)
                ->whereColumn('lt.key', 'category_contents.title')
                ->whereRaw("TRIM(COALESCE(lt.en, '')) <> '' AND TRIM(COALESCE(lt.vn, '')) <> ''");
        });
    }
}
