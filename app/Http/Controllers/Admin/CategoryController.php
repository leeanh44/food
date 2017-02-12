<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepository;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Session;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
     public function index()
    {
        $categories = $this->categoryRepository->paginate(trans('category.limit'));

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $input = $request->only('name', 'description');
        $category = $this->categoryRepository->create($input);
        Session::flash('msg', trans('category.create_category_successfully'));

        return redirect(route('category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $category = $this->categoryRepository->find($id);
        if (empty($category)) {
            Session::flash('msg', trans('category.category_not_found'));
            return redirect(route('category.index'));
        }

        return view('admin.category.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->find($id);
        if (empty($category)) {
            Session::flash('msg', trans('category.category_not_found'));
            return redirect(route('category.index'));
        }

        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, UpdateCategoryRequest $request)
    {
        $category = $this->categoryRepository->find($id);
        if (empty($category)) {
            Session::flash('msg', trans('category.category_not_found'));
            return redirect(route('category.index'));
        }
        $input = $request->only('name', 'description');
        $category = $this->categoryRepository->update($input, $id);
        Session::flash('msg', trans('category.update_category_successfully'));

        return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $category = $this->categoryRepository->find($id);
        if (empty($category)) {
            Session::flash('msg', trans('category.category_not_found'));
            return redirect(route('category.index'));
        }
        $this->categoryRepository->delete($id);
        Session::flash('msg', trans('category.delete_category_successfully'));

        return redirect(route('category.index'));
    }
}
