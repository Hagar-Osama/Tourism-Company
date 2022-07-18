<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\CategoriesInterface;
use App\Http\Requests\Admin\Category\AddCategoryRequest;
use App\Http\Requests\Admin\Category\DeleteCategoryRequest;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    private $categoryInterface;

    public function __construct(CategoriesInterface $categories)
    {
        $this->categoryInterface = $categories;
    }

    public function index()
    {
        return $this->categoryInterface->index();
    }

    public function create()
    {
        return $this->categoryInterface->create();
    }

    public function store(AddCategoryRequest $request)
    {
        return $this->categoryInterface->store($request);
    }

    public function edit($id)
    {
        return $this->categoryInterface->edit($id);
    }

    public function update(UpdateCategoryRequest $request)
    {
        return $this->categoryInterface->update($request);
    }

    public function delete(DeleteCategoryRequest $request)
    {
        return $this->categoryInterface->destroy($request);
    }
}
