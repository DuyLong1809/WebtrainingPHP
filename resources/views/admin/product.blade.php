<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('../css/style.css') }}" rel="stylesheet">
    <title>Admin-Product</title>
</head>

<body>
@include('master/header')

<div id="content">

    @include('master/filter')

    <div class="filter1">
        <form action="{{ route('product.search') }}" method="GET">
            <div class="search_icon_input">
                <div class="product-add-button" onclick="open_popup()">
                    <div class="product-add-button-1">Add Product</div>
                </div>
                <div class="input_timkiem">
                    <input class="search_content" id="search_box" value="" type="text" name="search"
                           placeholder="Search....">
                    <img class="icon-search-filter1" src="/img/icon-search/Box/Combined Shape.png">
                    <button type="submit" class="icon_search"></button>
                </div>
            </div>
        </form>
        <div class="filter2">
            @if(count($products) > 0)
                <div class="all-product">
                    @foreach($products as $item)
                        <div class="product">
                            <div class="product-img">
                                <img class="product-img-1" src="{{ asset('/images/'.$item->getImage()) }}">
                            </div>
                            <div class="product-name-price">
                                <div class="product-name">
                                    <a class="product-name-1 elipsis1" href="{{route('product.show', $item->getId() )}}">{{$item->getName()}}</a>
                                </div>
                            </div>
                            <div class="button-update-delete">
                                <div class="id-pro" data-id="{{$item->getId()}}" hidden></div>
                                <div class="product-update">
                                    <div class="product-update-button">
                                        <a class="product-update-button-1" href="{{route('product.edit', $item->getId())}}">Update</a>
                                    </div>
                                </div>
                                <div class="product-delete">
                                    <div class="product-delete-button">
                                        <button class="product-delete-button-1" onclick="open_popup_delete(this)">Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="pagi">
{{--                    {{ $paginator->links('custom-pagination', ['pagination' => $paginator]) }}--}}
                </div>
            @else
                <div id="no-products">Không có sản phẩm</div>
            @endif
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('js/script.js') }}"></script>
@include('admin/product-add')
</body>
</html>
