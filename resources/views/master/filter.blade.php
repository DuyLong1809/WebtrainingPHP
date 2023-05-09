<div class="filter">
    <div class="category_up">
        <div class="category_click_danhmuc">
            <a class="color_filter">Category</a>
            <img class="img_category_danhmuc" src="/img/ic-arrow/Rectangle 195.png">
        </div>
        <div class="subcategory_danhmuc">
            <div class="subcategory_filter"><a href="{{route('product.index')}}" class="color_filter">All</a></div>
            @foreach($categories as $category)
                <div class="subcategory_filter"><a  href="{{route('product.index', ['id_cate'=> $category->id])}}" class="color_filter">{{$category->name_cate}}</a></div>
            @endforeach

        </div>
    </div>
    <div class="category_down">
        <div class="category_click_sanxuat">
            <a class="color_filter">Manufacturer</a>
            <img class="img_category_sanxuat" src="/img/ic-arrow/Rectangle 195.png">
        </div>
        <div class="subcategory_sanxuat">
            <div class="subcategory_filter"><a href="{{route('product.index')}}" class="color_filter">All</a></div>
            @foreach($Hangsxs as $hangsx)
                <div class="subcategory_filter"><a  href="{{route('product.index', ['id_manu'=> $hangsx->id])}}" class="color_filter">{{$hangsx->name_manufact}}</a></div>
            @endforeach
        </div>
    </div>
</div>
