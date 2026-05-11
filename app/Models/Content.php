<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $table = 'contents';
    protected $fillable = ['id', 'id_priority', 'title', 'description', 'page_id', 'created_at', 'updated_at'];


    public function contentable()
    {
        return $this->morphTo();
    }

    public function languages()
    {
        return $this->morphMany(Languages::class, 'languageable');
    }

    /**
     * Giống Section: title bắt buộc đủ EN+VN; description và sub_title không được lệch một nửa.
     */
    public function scopeWithCompleteTranslations(Builder $query): Builder
    {
        $type = static::class;

        return $query
            ->whereExists(function ($sub) use ($type) {
                $sub->selectRaw('1')
                    ->from('languages as lt')
                    ->whereColumn('lt.languageable_id', 'contents.id')
                    ->where('lt.languageable_type', '=', $type)
                    ->whereColumn('lt.key', 'contents.title')
                    ->whereRaw("TRIM(COALESCE(lt.en, '')) <> '' AND TRIM(COALESCE(lt.vn, '')) <> ''");
            })
            ->whereExists(function ($sub) use ($type) {
                $sub->selectRaw('1')
                    ->from('languages as ld')
                    ->whereColumn('ld.languageable_id', 'contents.id')
                    ->where('ld.languageable_type', '=', $type)
                    ->whereColumn('ld.key', 'contents.description')
                    ->whereRaw("(TRIM(COALESCE(ld.en, '')) <> '' AND TRIM(COALESCE(ld.vn, '')) <> '') OR (TRIM(COALESCE(ld.en, '')) = '' AND TRIM(COALESCE(ld.vn, '')) = '')");
            })
            ->whereExists(function ($sub) use ($type) {
                $sub->selectRaw('1')
                    ->from('languages as ls')
                    ->whereColumn('ls.languageable_id', 'contents.id')
                    ->where('ls.languageable_type', '=', $type)
                    ->whereColumn('ls.key', 'contents.sub_title')
                    ->whereRaw("(TRIM(COALESCE(ls.en, '')) <> '' AND TRIM(COALESCE(ls.vn, '')) <> '') OR (TRIM(COALESCE(ls.en, '')) = '' AND TRIM(COALESCE(ls.vn, '')) = '')");
            });
    }

    public function images()
    {
        return $this->hasMany(Images::class, 'content_id')->orderBy('id_priority', 'asc')->orderBy('id', 'asc');
    }
}
