<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>Details</title>
</head>

<body>
@include('master/header')

<div id="content">

    @include('master/filter')

    <div class="filter-detail">
        <form method="POST" action="{{route('product.update',$product->getId())}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="update-product-detail">
                <div class="update-product">
                    <div class="update-product-content">
                        <div class="update-product-title">
                            <h4 class="update-product-title-1">
                                THÔNG TIN SẢN PHẨM
                            </h4>
                        </div>
                        <div class="tilte-input">
                            <div class="title-product-and-icon-star">Tên Sản Phẩm
                                <span class="icon-star">*</span>
                            </div>
                            <div class="input-product">
                                <input type="text" value="{{$product->getName()}}" placeholder="" name="name" >
                            </div>
                            @error('name')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="tilte-input">
                            <div class="title-product-and-icon-star">Danh Mục Sản Phẩm <span class="icon-star">*</span>
                            </div>
                            <div class="select_cate">
                                <select name="id_cate" id="" class="">
                                    @foreach($categories as $category)
                                        <option
                                            value="{{$category->id}}" {{$product->getIdCate() == $category->id ? 'selected':""}}>{{$category->name_cate}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('id_cate')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="tilte-input">
                            <div class="title-product-and-icon-star">Hãng Sản Xuất
                                <span class="icon-star">*</span>
                            </div>
                            <div class="select_cate">
                                <select name="id_manufact" id="" class="">
                                    @foreach($manufacturers as $manu)
                                        <option
                                            value="{{$manu->id}}" {{$product->getIdManufact() == $manu->id ? 'selected':""}}>{{$manu->name_manufact}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('id_manufact')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="tilte-input">
                            <div class="title-product-and-icon-star">Giá
                                <span class="icon-star">*</span>
                            </div>
                            <div class="input-product">
                                <input type="text" value="{{$product->getPrice()}}" placeholder="" name="price">
                            </div>
                            @error('price')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="tilte-input">
                            <div class="title-product-and-icon-star"><p class="title-product">Mô Tả</p></div>
                            <div>
                                <textarea class="input-product-textarea1" name="mota" id="">{{$product->getMota()}}</textarea>
                            </div>
                            @error('mota')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="button-huy-and-update">
                            <div class="button-huy1 " onclick="goToPage('{{route('product.index')}}')">Hủy</div>
                            <button class="button-update" type="submit">Lưu</button>
                        </div>
                    </div>
                </div>
                <div class="image-detail-update">
                    <div class="image-detail-update-and-text-1">
                        <div class="image-detail-update-text">Ảnh minh họa
                            <span class="icon-star">*</span>
                        </div>
                        <div class="image-detail-update1">
                            <img class="update_image" src="{{asset('/images/'.$product->getImage())}}">
                            <div class="update-delete-img">
                                <div class="update-img">Cập nhật</div>
                                <input type="file" name="image" id="image" class="input-update-img" hidden>
                            </div>
                        </div>
                    </div>
                    <div class="image-detail-update-and-slide">
                        <div class="text-slide">
                            Ảnh slide
                        </div>
                        <div class="img-slide-all">
{{--                            @foreach($img_slide as $index => $productimgslide)--}}
{{--                            <div class="img-slide imgframe">--}}
{{--                                <div class="img-and-text-slide">--}}
{{--                                    <div class="text-slide">Ảnh {{$index + 1}}</div>--}}
{{--                                    <div class="img-slide-small">--}}
{{--                                        <input type="text" hidden name="idImgSlider[]" value="{{$productimgslide->id}}" id="idImage">--}}
{{--                                        <img class="slide-img" src="{{asset('/image_slide/'.$productimgslide->name_imgslide)}}">--}}
{{--                                        <div class="update-delete-img-sub">--}}
{{--                                            <div class="update-img-sub" onclick="image_upload(this)">Cập nhật</div>--}}
{{--                                            <input type="file" value="{{$productimgslide->id}}" name="image_slide[]" id="image_slide" class="input-update-img" hidden>--}}
{{--                                            <div class="delete-img-sub" onclick="image_delete(this)">Xóa</div>--}}
{{--                                            <input type="text" name="idImageDelete[]" hidden value="" id="getIdImage">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            @endforeach--}}
                            <div class="img-slide imgframe1">
                                <div class="img-and-text-slide">
                                    <div class="text-slide">
                                        Ảnh
                                    </div>
                                    <div class="img-slide-plus" onclick="add_imgslide(this)">
                                        <div class="img-slide-vector-plus">
                                            <img src="/img/Vector-plus.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('js/script.js') }}"></script>
</body>

</html>

