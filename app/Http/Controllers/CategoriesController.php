<?php

namespace App\Http\Controllers;

use App\Http\Requests\category\CategoryRequest;
use App\Http\Requests\post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    /**
     * @param CategoryRequest $request
     * @return string
     */
    public function store(CategoryRequest $request)
    {
        $category = $request->validated();
        if ($category) {
            $categoryCreated = Category::create($category);
            if ($categoryCreated) {
                return 'good';
            } else {
                return $categoryCreated->getErrors()->all();
            }
        }
    }

    /**
     * @param CategoryRequest $request
     * @param Category $category
     * @return string
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $updatedCategory = $request->validated();
        if ($updatedCategory) {
            $categoryUpdated = $category->update($updatedCategory);
            if ($categoryUpdated) {
                return 'good';
            } else {
                return $categoryUpdated->getErrors()->all();
            }
        }
    }

    /**
     * @param $id
     * @return string
     */
    public function delete($id)
    {
        $category = Category::find($id);
        if ($category->delete()) {
            return 'successfully deleted';
        } else {
            return 'not deleted';
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Category::all();
    }

    public function restoreCategory()
    {
        $categories = Category::withTrashed()->get();
        foreach ($categories as $category) {
            if ($category) {
                $category->restore();
            };
        }
    }

    /**
     * @param $id
     * @return string
     */
    public function productsByCategory($id)
    {
        $category = Category::find($id);
        return $category ? $category->products : 'ошибка';
    }

    public function getInfo()
    {
//        $product = Product::find(1);
//        return $product->client;

        $data = DB::table('orders')
            ->select(
                'clients.last_name_doc',
                'clients.first_name_doc',
                'products.name AS product',
                'categories.name AS category',)
            ->leftJoin('clients', 'clients.id', '=', 'orders.client_id')
            ->leftJoin('products', 'products.id', '=', 'orders.product_id')
            ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
            ->where('categories.name', '=', 'Milk')
            ->get();

        return $data;
    }
}
