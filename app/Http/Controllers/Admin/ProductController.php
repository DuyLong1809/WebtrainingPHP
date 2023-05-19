<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Service\CategoryService;
use App\Service\ManufacturerService;
use App\Service\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;
    protected $categoryService;
    protected $manuService;
    protected $img_slide;

    public function __construct
    (
        ProductService $productService,
        CategoryService $categoryService,
        ManufacturerService $manuService,
    ) {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
        $this->manuService = $manuService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = $this->productService->getAllProduct();
        $categories = $this->categoryService->getAllCategory();
        $cate_id = $request->input('id_cate');
        $manufacturers = $this->manuService->GetAll();
        $manu_id = $request->input('id_manu');
        if ($cate_id) {
            $products = $this->productService->getCategoryById($cate_id);
        }
        if ($manu_id) {
            $products = $this->productService->getManufactureById($manu_id);
        }
        return view(
            'admin/product',
            compact(
                'products',
                'categories',
                'manufacturers',
            ));
    }

    public function getAllproduct()
    {
        $products = $this->productService->getAllProduct();
        $categories = $this->categoryService->getAllCategory();
        $manufacturers = $this->manuService->GetAll();
        return view(
            'index',
            compact(
                'manufacturers',
                'categories',
                'products',
            ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = $this->productService->createProduct($request);
        return redirect()->route('product.index')->with('success', 'Thêm Thành Công');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->productService->getProductIdDetail($id);
        $categories = $this->categoryService->getAllCategory();
        $manufacturers = $this->manuService->GetAll();
        $id_cate = $this->productService->getProductId($id)->getIdCate();
        $products = $this->productService->AllProduct()->where('id_cate', $id_cate)->take(3);
        return view(
            'detail',
            compact(
                'manufacturers',
                'categories',
                'product',
                'products',
            ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->productService->getProductId($id);
        $categories = $this->categoryService->getAllCategory();
        $manufacturers = $this->manuService->GetAll();
        return view(
            'admin/product-update',
            compact(
                'product',
                'categories',
                'manufacturers',
            ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = $this->productService->UpdateProduct($request, $id);
        return redirect()->route('product.index', $id)->with('update_success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->productService->DeleteProduct($id);
        return redirect()->route('product.index')->with('delete_success', 'Xóa Thành Công');
    }

    public function search_admin(Request $request)
    {
        $categories = $this->categoryService->getAllCategory();
        $manufacturers = $this->manuService->GetAll();
        $query = $request->get('search');
        $products = $this->productService->SearchProduct($query);
        return view(
            'admin/product',
            compact(
                'products',
                'categories',
                'manufacturers',
            ));
    }
}
