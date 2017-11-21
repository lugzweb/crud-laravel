<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    private $rules = [
        'price' => 'required|numeric|min:1|max:100000000',
        'title' => 'required|string|min:6|max:90'
    ];

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $products = Product::paginate();
        return view('admin.products.products', ['products' => $products]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.product', ['product' => $product]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->only(['price', 'title']), $this->rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages());
        }

        $product = new Product();
        $product->fill($request->only(['price', 'title']));
        $product->save();

        return view('admin.products.product', ['product' => $product]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->only(['price', 'title']),
            $this->rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages());
        }

        $product = Product::findOrFail($id);
        $product->fill($request->only(['price', 'title']));
        $product->save();
        return view('admin.products.product', ['product' => $product]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function products(Request $request)
    {
        $key = 'products_' . http_build_query($request->input());
        if (Cache::has($key)) {
            return view('welcome', ['products' => unserialize(Cache::get($key))]);
        }

        $query = new Product();
        if ($request->input('query')) {
            $query = $query->where('title', 'ilike', '%' . $request->input('query') . '%');
        }
        if ($request->input('order')) {
            $query = $query->orderBy('price', $request->input('order'));
        }
        $products = $query->paginate();
        Cache::put($key, serialize($products), 60);
        return view('welcome', ['products' => $products]);
    }

}