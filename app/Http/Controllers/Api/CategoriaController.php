<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoriaResource;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $orderColumn = request('order_column', 'created_at');
        if (!in_array($orderColumn, ['id', 'name', 'created_at'])) {
            $orderColumn = 'created_at';
        }
        $orderDirection = request('order_direction', 'desc');
        if (!in_array($orderDirection, ['asc', 'desc'])) {
            $orderDirection = 'desc';
        }
        $categories = Category::
            when(request('search_id'), function ($query) {
                $query->where('id', request('search_id'));
            })
            ->when(request('search_title'), function ($query) {
                $query->where('name', 'like', '%'.request('search_title').'%');
            })
            ->when(request('search_global'), function ($query) {
                $query->where(function($q) {
                    $q->where('id', request('search_global'))
                        ->orWhere('name', 'like', '%'.request('search_global').'%');

                });
            })
            ->orderBy($orderColumn, $orderDirection)
            ->paginate(50);
        return CategoryResource::collection($categories);
    }

    //public function store(StoreCategoryRequest $request)
    //{
    //    $this->authorize('category-create');
    //    $category = Category::create($request->validated());
//
    //    return new CategoryResource($category);
    //}
//
    //public function show(Category $category)
    //{
    //    $this->authorize('category-edit');
    //    return new CategoryResource($category);
    //}
//
    //public function update(Category $category, StoreCategoryRequest $request)
    //{
    //    $this->authorize('category-edit');
    //    $category->update($request->validated());
//
    //    return new CategoryResource($category);
    //}
//
    //public function destroy(Category $category) {
    //    $this->authorize('category-delete');
    //    $category->delete();
//
    //    return response()->noContent();
    //}
//
    public function getList()
    {
        return CategoriaResource::collection(Categoria::all());
    }
}
