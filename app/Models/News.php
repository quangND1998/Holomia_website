<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;

    protected $table = "news";
    protected $fillable = ['id', 'title', 'slug', 'content', 'image', 'outstanding', 'state', 'view', 'category_id', 'created_at', 'updated_at'];

    /**
     * Tin hiển thị trên site (khác private / nháp nội bộ).
     */
    public function scopePublicState(Builder $query): Builder
    {
        return $query->where('state', 'public');
    }

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
     * URL ảnh đại diện (public) — dùng form admin / Inertia, tránh lệch thư mục gốc so với nối chuỗi tay.
     */
    public function getImageUrlAttribute(): ?string
    {
        $raw = $this->attributes['image'] ?? null;
        if ($raw === null || $raw === '') {
            return null;
        }
        if (! is_string($raw)) {
            return null;
        }
        $path = str_replace('\\', '/', trim($raw));
        if ($path === '') {
            return null;
        }
        if (Str::startsWith($path, ['http://', 'https://'])) {
            return $path;
        }

        return asset(ltrim($path, '/'));
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
