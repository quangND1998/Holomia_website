<?php

namespace App\Repositories;

use App\Models\CategoryCourese;
use App\Models\CategoryNew;


class CategoryCourseRepository extends BaseRepository
{

    protected function model()
    {
        return new CategoryCourese();
    }

    public function get()
    {
        return  $this->model()->get();
    }
}
