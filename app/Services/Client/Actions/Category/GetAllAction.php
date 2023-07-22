<?php

namespace App\Services\Client\Actions\Category;

use App\Services\Client\Contracts\GetAllCategories;
use App\Services\Client\Resources as Resources;

use App\Tasks\Category as Category;

class GetAllAction implements GetAllCategories
{
    public function execute()
    {
        return app(Category\GetListTask::class)->run();
    }
}
