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
        <div class="detail-back">
            <div class="icon-back">
                <img src="/img/LeftArrow.png">
            </div>
            <a class="detail-back-text" href="{{route('product.index')}}">Back</a>
        </div>
        <div class="detail-content-image">
            <div class="detail-content">
                <h3 class="detail-title">{{$product->getName()}}</h3>
                <p class="detail-content-1">Category: {{$cate_id}}</p>
                <p class="detail-content-1">Manufacturer: {{$manu_id}}</p>
                <p class="detail-content-1">Price: {{$product->getPrice()}}</p>
                <div class="detail-des">
                    <p class="detail-des-1">Product Description:</p>
                    <p class="detail-des-text">{{$product->getMota()}}</p>
                </div>
            </div>
            <div class="detail-image-1">
                <img class="detail-image-2" src="{{asset('/images/'.$product->getImage())}}">
            </div>
        </div>
        <div class="detail-goi-y">
            <h4 class="detail-goi-y-1">Suggestions For You:</h4>
        </div>
        <div class="all-product">
            @foreach($products as $item)
            <div class="product">
                <div class="product-img">
                    <img class="product-img-1" src="{{asset('/images/'.$item->image)}}">
                </div>
                <div class="product-name-price">
                    <div class="product-name">
                        <a class="product-name-1" href="{{route('product.show', $item->id)}}">{{$item->name}}</a>
                    </div>
                    <div class="product-price">
                        <p class="product-price-1">{{$item->price}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</div>
<script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
