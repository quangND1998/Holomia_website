<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $table = 'sections';
    protected $fillable = ['id', 'title', 'sub_title', 'description','active', 'id_priority', 'page_id', 'theme_id', 'created_at', 'updated_at'];

    public function contents()
    {
        return $this->morphMany(Content::class, 'contentable')->orderBy('id_priority', 'asc')->orderBy('id', 'asc');;
    }
    public function category_contents()
    {

        return $this->hasMany(CategoryContent::class, 'section_id');
    }
    public function theme()
    {
        return $this->belongsTo(Themes::class);
    }
    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function languages()
    {
        return $this->morphMany(Languages::class, 'languageable');
    }

    /**
     * Section hiển thị công khai: tiêu đề bắt buộc đủ EN+VN; mô tả / sub_title: hoặc cả hai rỗng hoặc cả hai có nội dung (không được lệch một nửa).
     */
    public function scopeWithCompleteTranslations(Builder $query): Builder
    {
        $type = static::class;

        return $query
            ->whereExists(function ($sub) use ($type) {
                $sub->selectRaw('1')
                    ->from('languages as lt')
                    ->whereColumn('lt.languageable_id', 'sections.id')
                    ->where('lt.languageable_type', '=', $type)
                    ->whereColumn('lt.key', 'sections.title')
                    ->whereRaw("TRIM(COALESCE(lt.en, '')) <> '' AND TRIM(COALESCE(lt.vn, '')) <> ''");
            })
            ->whereExists(function ($sub) use ($type) {
                $sub->selectRaw('1')
                    ->from('languages as ld')
                    ->whereColumn('ld.languageable_id', 'sections.id')
                    ->where('ld.languageable_type', '=', $type)
                    ->whereColumn('ld.key', 'sections.description')
                    ->whereRaw("(TRIM(COALESCE(ld.en, '')) <> '' AND TRIM(COALESCE(ld.vn, '')) <> '') OR (TRIM(COALESCE(ld.en, '')) = '' AND TRIM(COALESCE(ld.vn, '')) = '')");
            })
            ->whereExists(function ($sub) use ($type) {
                $sub->selectRaw('1')
                    ->from('languages as ls')
                    ->whereColumn('ls.languageable_id', 'sections.id')
                    ->where('ls.languageable_type', '=', $type)
                    ->whereColumn('ls.key', 'sections.sub_title')
                    ->whereRaw("(TRIM(COALESCE(ls.en, '')) <> '' AND TRIM(COALESCE(ls.vn, '')) <> '') OR (TRIM(COALESCE(ls.en, '')) = '' AND TRIM(COALESCE(ls.vn, '')) = '')");
            });

    }

    public function cate_contents()
    {
        return $this->hasManyThrough(Content::class, CategoryContent::class, 'section_id', 'contentable_id')->where('contentable_type', "App\Models\CategoryContent");
    }
}
