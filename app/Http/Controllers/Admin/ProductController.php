<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Img_slide;
use App\Service\CategoryService;
use App\Service\HangsanxuatService;
use App\Service\ProductService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;


class ProductController extends Controller
{
    protected $productService;
    protected $categoryService;
    protected $HangsxService;
    protected $img_slide;

    public function __construct(ProductService $productService, CategoryService $categoryService, HangsanxuatService $HangsxService, Img_slide $img_slide)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
        $this->HangsxService = $HangsxService;
        $this->img_slide = $img_slide;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productService->getAllProduct();
        $categories = $this->categoryService->getAllCategory();
        $Hangsxs = $this->HangsxService->GetAll();
        $perpage = 12;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentPageItems = $products->slice(($currentPage - 1) * $perpage, $perpage);
        $paginator = new LengthAwarePaginator($currentPageItems, count($products), $perpage);
        $paginator->setPath(request()->url());
        return view('admin/product', compact('paginator','products','categories','Hangsxs'));
    }

    public function getAllproduct()
    {
        $products =$this->productService->getAllProduct();
        $categories = $this->categoryService->getAllCategory();
        $Hangsxs = $this->HangsxService->GetAll();
        $perpage = 12;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentPageItems = $products->slice(($currentPage - 1) * $perpage, $perpage);
        $paginator = new LengthAwarePaginator($currentPageItems, count($products), $perpage);
        $paginator->setPath(request()->url());
        return view('index', compact('Hangsxs','categories','paginator','products'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = $this->productService->createProduct($request);
        return redirect()->route('product.index')->with('success','Thêm Thành Công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
