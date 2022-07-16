<?php
namespace App\Repositories;
use App\Models\Contact;
use App\Repositories\BaseRepository;

class ContactRepository extends BaseRepository{


    protected function model(){
            return new Contact();
    }

    public function query($request){
        return $this->model()->when($request->term, function ($query, $term) {
            $query->where('name', 'LIKE', '%' . $term . '%')->orwhere('email', 'LIKE', '%' . $term . '%')->orwhere('phone', 'LIKE', '%' . $term . '%');
        })->paginate(10)->appends(['term' => $request->term]);
    }
}