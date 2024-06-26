<?php

use App\Models\Content;
use App\Repositories\BaseRepository;

class ContentRepository extends BaseRepository{


    protected function model()
    {
        return new Content();
    }


    
}