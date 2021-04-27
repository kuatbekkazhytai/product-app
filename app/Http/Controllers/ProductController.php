<?php

namespace App\Http\Controllers;

use App\Http\Helpers\ProductHelper;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Jobs\SendProductCreatedJob;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $products = Product::available()->latest()->get();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $colors = ProductHelper::getColors();
        $cities = ProductHelper::getCities();

        return view('products.create', compact('colors', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductCreateRequest $request) : RedirectResponse
    {
        $product = Product::create($request->only('name', 'art', 'status', 'data'));
        $this->dispatch(new SendProductCreatedJob($product));

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * * Display the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Product $product)
    {
        return view ('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Product $product)
    {
        $colors = ProductHelper::getColors();
        $cities = ProductHelper::getCities();

        return view ('products.edit', compact('product','colors', 'cities'));
    }

    /**
     * * Update the specified resource in storage.
     *
     * @param ProductUpdateRequest $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProductUpdateRequest $request, Product $product) : RedirectResponse
    {
        $product->update($request->only('name', 'art', 'status', 'data'));

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product) : RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
