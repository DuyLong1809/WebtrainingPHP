<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Img_slide;
use App\Service\CategoryService;
use App\Service\ManufacturerService;
use App\Service\ProductService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;


class ProductController extends Controller
{
    protected $productService;
    protected $categoryService;
    protected $ManuService;
    protected $img_slide;

    public function __construct
    (
        ProductService $productService,
        CategoryService $categoryService,
        ManufacturerService $ManuService,
        Img_slide $img_slide,
    ) {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
        $this->ManuService = $ManuService;
        $this->img_slide = $img_slide;
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
        $Manufacturers = $this->ManuService->GetAll();
        $manu_id = $request->input('id_manu');
        if ($cate_id) {
            $products = $this->productService->getCategoryById($cate_id);
        }
        if ($manu_id) {
            $products = $this->productService->getManufactureById($manu_id);
        }
        $perpage = 12;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentPageItems = $products->slice(($currentPage - 1) * $perpage, $perpage);
        $paginator = new LengthAwarePaginator($currentPageItems, count($products), $perpage);
        $paginator->setPath(request()->url());
        return view(
            'admin/product',
            compact(
                'paginator',
                'products',
                'categories',
                'Manufacturers',
            ));
    }

    public function getAllproduct()
    {
        $products = $this->productService->getAllProduct();
        $categories = $this->categoryService->getAllCategory();
        $Manufacturers = $this->ManuService->GetAll();
        $perpage = 12;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentPageItems = $products->slice(($currentPage - 1) * $perpage, $perpage);
        $paginator = new LengthAwarePaginator($currentPageItems, count($products), $perpage);
        $paginator->setPath(request()->url());
        return view(
            'index',
            compact(
                'Manufacturers',
                'categories',
                'paginator',
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
        $product = $this->productService->getProductById($id);
        $categories = $this->categoryService->getAllCategory();
        $Manufacturers = $this->ManuService->GetAll();
        $id_cate = $product->id_cate;
        $products = $this->productService->getAllProduct()->where('id_cate', $id_cate)->take(3);
        return view(
            'detail',
            compact(
                'Manufacturers',
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
        $product = $this->productService->getProductById($id);
        $img_slide = $this->img_slide->where('id_product', $id)->get();
        $categories = $this->categoryService->getAllCategory();
        $Manufacturers = $this->ManuService->GetAll();
        return view(
            'admin/product-update',
            compact(
                'product',
                'categories',
                'Manufacturers',
                'img_slide',
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
        $product_imgslide = $this->productService->UpdateImgSlide($id, $request);
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
        $Manufacturers = $this->ManuService->GetAll();
        $query = $request->get('search');

        $perpage = 12;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $products = $this->productService->SearchProduct($query);
        $paginator = new LengthAwarePaginator($products, count($products), $perpage, $currentPage);
        return view(
            'admin/product',
            compact(
                'paginator',
                'products',
                'categories',
                'Manufacturers',
            ));
    }
}
