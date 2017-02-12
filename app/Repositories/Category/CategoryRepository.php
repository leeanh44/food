<?php
namespace App\Repositories\Category;

use Auth;
use App\Models\Category;
use Input;
use App\Repositories\BaseRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use Hash;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function __construct(Category $category)
    {
        $this->model = $category;
    }
    public function getCategory()
    {
    	return $this->model->pluck('name', 'id')->toArray();
    }
}
