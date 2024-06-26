<?php

namespace App\Repositories;

use App\Models\Themes;

class ThemeRepository extends BaseRepository
{

    protected function model()
    {
        return new Themes();
    }

    public function get()
    {
        return $this->model()->get();
    }
}
