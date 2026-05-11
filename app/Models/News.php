<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = "news";
    protected $fillable = ['id', 'title', 'slug', 'content', 'image', 'outstanding', 'view', 'category_id', 'created_at', 'updated_at'];
    public function category()
    {
        return $this->belongsTo(CategoryNew::class, 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_new', 'new_id', 'tag_id');
    }

    public function languages()
    {
        return $this->morphMany(Languages::class, 'languageable');
    }

    /**
     * Slug đưa vào URL /new/{slug} — lấy từ DB (cột en/vn của dòng languages có key = news.slug),
     * trùng logic với chitiet_tintuc, tránh lệch với __() đọc từ file JSON.
     */
    public function detailSlug(): string
    {
        $slugKey = $this->getAttribute('slug');
        if (! $slugKey) {
            return '';
        }

        if (! $this->relationLoaded('languages')) {
            $this->load('languages');
        }

        $row = $this->languages->firstWhere('key', $slugKey);
        if (! $row) {
            return '';
        }

        $locale = session('locale', app()->getLocale());
        $preferVn = $locale === 'vn';
        $primary = $preferVn ? trim((string) $row->vn) : trim((string) $row->en);
        $fallback = $preferVn ? trim((string) $row->en) : trim((string) $row->vn);

        return $primary !== '' ? $primary : $fallback;
    }

    /**
     * Tin có đủ bản dịch EN + VN cho title, slug và content (3 bản ghi languages, mỗi bản ghi en/vn không rỗng sau trim).
     */
    public function scopeWithCompleteTranslations(Builder $query): Builder
    {
        $type = static::class;

        return $query
            ->whereExists(function ($sub) use ($type) {
                $sub->selectRaw('1')
                    ->from('languages as lt')
                    ->whereColumn('lt.languageable_id', 'news.id')
                    ->where('lt.languageable_type', '=', $type)
                    ->whereColumn('lt.key', 'news.title')
                    ->whereRaw("TRIM(COALESCE(lt.en, '')) <> '' AND TRIM(COALESCE(lt.vn, '')) <> ''");
            })
            ->whereExists(function ($sub) use ($type) {
                $sub->selectRaw('1')
                    ->from('languages as ls')
                    ->whereColumn('ls.languageable_id', 'news.id')
                    ->where('ls.languageable_type', '=', $type)
                    ->whereColumn('ls.key', 'news.slug')
                    ->whereRaw("TRIM(COALESCE(ls.en, '')) <> '' AND TRIM(COALESCE(ls.vn, '')) <> ''");
            })
            ->whereExists(function ($sub) use ($type) {
                $sub->selectRaw('1')
                    ->from('languages as lc')
                    ->whereColumn('lc.languageable_id', 'news.id')
                    ->where('lc.languageable_type', '=', $type)
                    ->whereColumn('lc.key', 'news.content')
                    ->whereRaw("TRIM(COALESCE(lc.en, '')) <> '' AND TRIM(COALESCE(lc.vn, '')) <> ''");
            });
    }
}
