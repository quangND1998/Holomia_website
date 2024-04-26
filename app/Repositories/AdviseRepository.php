<?php
namespace App\Repositories;

use App\Models\Advise;
use App\Repositories\BaseRepository;

class AdviseRepository extends BaseRepository{


    protected function model(){
            return new Advise();
    }

    public function query($request){
        return $this->model()->when($request->term, function ($query, $term) {
            $query->where('name', 'LIKE', '%' . $term . '%')->orwhere('email', 'LIKE', '%' . $term . '%')->orwhere('phone', 'LIKE', '%' . $term . '%');
        })->paginate(10)->appends(['term' => $request->term]);
    }
}