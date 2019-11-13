<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ProductCreateRequest;
use App\Http\Requests\Admin\ProductUpdateRequest;
use App\Model\DetailProduct;
use App\Model\Product;
use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    protected $product;
    protected $category;


    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [];
        $sidebar = [
            'parent' => 'product',
            'child' => 'index'
        ];
        $data['sidebar'] = $sidebar;

        $products = $this->product;

        // search with book name
        $search_product_name = null;
        if ($request->search_product_name) {
            $search_product_name = $request->search_product_name;
            $products = $products->where('name', 'like', '%' . $search_product_name. '%');
        }
        $data['search_product_name'] = $search_product_name;

        // search with category_id
        $category_id = null;
        if ($request->category_id) {
            $category_id = $request->category_id;
            $products = $products->where('category_id', $category_id);
        }
        $data['category_id'] = $category_id;

        $products = $products
            ->orderBy('id', 'desc')
            ->paginate(5);
        $data['products'] = $products;

        // get data of categories table
        $categories = $this->category->pluck('name', 'id')->toArray();
        $data['categories'] = $categories;


        return view('backend.products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $sidebar = [
            'parent' => 'product',
            'child' => 'add'
        ];
        $data['sidebar'] = $sidebar;

        //get data for category
        $categories = $this->category->pluck('name', 'id')->toArray();
        $data['categories'] = $categories;




        return view('backend.products.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {
        if ($request->hasFile('image')) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $this->product->image = $request->file('image')->storeAs(
                'public/product_images', time() . '.' . $ext
            );
        }

        $params = $request->all();
        $this->product->name = $params['name'];
        $this->product->description = $params['description'];
        $this->product->unit_price = $params['unit_price'];
        $this->product->promotion_price = $params['promotion_price'];
        $this->product->unit = $params['unit'];
        $this->product->category_id = $params['category_id'];
//        $this->product->detail_id = $params['detail_id'];



        $check = $this->product->save();
        if ($check) {
            // insert OK
            return redirect(route('admin-product-index'))->with('success', 'Insert product successful.');
        }

        // insert fail
        return redirect(route('admin-product-index'))->with('fail', 'Insert Product fail.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [];
        $sidebar = [
            'parent' => 'product',
            'child' => 'index'
        ];
        $data['sidebar'] = $sidebar;

        $product = $this->product->find($id);
        $data['product'] = $product;
        return view('backend.products.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [];
        $sidebar = [
            'parent' => 'product',
            'child' => 'index'
        ];
        $data['sidebar'] = $sidebar;

        $categories = $this->category->pluck('name', 'id')->toArray();
        $data['categories'] = $categories;


        $products = $this->product->find($id);
        $data['product'] = $products;
        return view('backend.products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCreateRequest $request, $id)
    {


        $params = $request->all();
        $this->product->name = $params['name'];
        $this->product->description = $params['description'];
        $this->product->unit_price = $params['unit_price'];
        $this->product->promotion_price = $params['promotion_price'];
        $this->product->unit = $params['unit'];
        $this->product->category_id = $params['category_id'];
//        $this->product->detail_id = $params['detail_id'];

        if ($request->hasFile('image')) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $this->product->image = $request->file('image')->storeAs(
                'public/product_images', time() . '.' . $ext
            );
        }

        $check = $this->product->save();
        if ($check) {
            // update OK
            return redirect(route('admin-product-index'))->with('success', 'Update product successful.');
        }

        // update fail
        return redirect(route('admin-product-index'))->with('fail', 'Update product fail.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = $this->product->find($id)->delete();
        if ($check) {
            // delete OK
            return redirect(route('admin-product-index'))->with('success', 'Delete product successful.');
        }

        // delete fail
        return redirect(route('admin-product-index'))->with('fail', 'Delete product fail.');
    }
}

