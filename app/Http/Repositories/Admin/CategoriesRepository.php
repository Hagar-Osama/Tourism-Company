<?php
namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\CategoriesInterface;
use App\Http\Traits\CategoriesTrait;
use App\Models\Category;
use Illuminate\Support\Facades\Session;

class CategoriesRepository implements CategoriesInterface
{
    use CategoriesTrait;

    private $categoryModel;

    public function __construct(Category $category)
    {
        $this->categoryModel = $category;
    }

    public function index()
    {
        $categories = $this->show_all_categories();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store($request)
    {
        $this->categoryModel::create([
            'name' => $request->name
        ]);
        Session::flash('done', 'Category Added Success');
        return redirect(route('admin.category.index'));
    }

    public function edit($id)
    {
        $category = $this->get_category_by_id($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update($request)
    {
        $category = $this->get_category_by_id($request->category_id);

        $category->update([
            'name' => $request->name
        ]);
        Session::flash('done', 'Category Name Has Been Updated');
        return redirect(route('admin.category.index'));
    }

    public function destroy($request)
    {
        $category = $this->get_category_by_id($request->category_id);

        if ($category)
        {
            $category->delete();
            Session::flash('done', 'Category Has Been Deleted Success');
            return redirect()->back();
        }
        return abort('404');
    }
}
