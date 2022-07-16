<?php
namespace App\Repositories;
use App\Models\Languages;
use App\Repositories\BaseRepository;

class LanguageRepository extends BaseRepository{


    protected function model(){
            return new Languages();
    }

    public function query($request){
        return $this->model()->when($request->term, function ($query, $term) {
            $query->where('en', 'LIKE', '%' . $term . '%')->orwhere('vn', 'LIKE', '%' . $term . '%')->orwhere('key', 'LIKE', '%' . $term . '%');
        })->paginate(10)->appends(['term' => $request->term]);
    }
}