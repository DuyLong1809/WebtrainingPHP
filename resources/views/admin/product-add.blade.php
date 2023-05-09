<div class="popup_add close_popup">
    <div class="add-product">
        <div class="add-product-title-and-icon">
            <div class="add-product-title">
                <h4 class="add-product-title-1">
                    THÊM SẢN PHẨM
                </h4>
            </div>
            <div class="add-product-icon" onclick="close_popup()">
                <img src="/img/X.png">
            </div>
        </div>
        <form method="Post" action="{{route('product.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="add-product-content">
                <div class="tilte-input">
                    <div class="title-product-and-icon-star">Tên Sản Phẩm
                        <span class="icon-star">*</span>
                    </div>
                    <div class="input-product">
                        <input type="text" placeholder="Nhập tên sản phẩm" name="name" >
                    </div>
                    @error('name')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="tilte-input">
                    <div class="title-product-and-icon-star">Danh Mục Sản Phẩm <span class="icon-star">*</span></div>
                    <div class="select_cate">
                        <select name="id_cate" id="" class="">
                            <option>Chọn danh mục sản phẩm</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name_cate}}</option>
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
                            <option value="0">Chọn hãng sản xuất</option>
                            @foreach($Hangsxs as $Hangsanxuat)
                                <option value="{{$Hangsanxuat->id}}">{{$Hangsanxuat->name_manufact}}</option>
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
                        <input type="text" placeholder="Nhập giá sản phẩm" name="price" >
                    </div>
                    @error('price')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="tilte-input">
                    <div class="title-product-and-icon-star"><p class="title-product">Mô Tả</p></div>
                    <div>
                        <textarea class="input-product-textarea" name="mota" id="" ></textarea>
                    </div>
                    @error('mota')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="tilte-input">
                    <div class="title-product-and-icon-star">
                        <p class="title-product-addimg">Thêm ảnh minh họa
                            <span class="icon-star">*</span>
                        </p>
                        <p class=""></p>
                        <input type="file" class="input-img" name="image" hidden>
                    </div>
                </div>
                <div class="button-huy-and-add">
                    <div class="button-huy " onclick="close_popup()" type="">Hủy</div>
                    <button class="button-them click_addsuccess" type="submit">Thêm</button>
                </div>
            </div>
        </form>
    </div>
</div>
@if(session()->has('success'))
    <div class="addsuccess_add close_addsuccess_popup">
        <div class="addsuccess-popup">
            <div class="addsuccess-popup-1">
                <div class="add-product-icon-1" onclick="close_addsuccess_popup()">
                    <img src="/img/X.png">
                </div>
                <div class="img-popup-and-text">
                    <div class="img-popup-and-text-1">
                        <img src="/img/adsuccess1.png">
                        <h4>
                            {{session()->get('success')}}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
<script>
    $(function () {
// Hiển thị popup nếu có thông báo thành công trong session
        if ($('.addsuccess_add').length && $('.addsuccess_add').is(':visible')) {
            $('.addsuccess_add').fadeIn();
            setTimeout(function () {
                $('.addsuccess_add').fadeOut(function () {
                    @if(isset($product_id))
                        window.location.href = "{{ route('product.show', $product_id) }}";
                    @endif
                });
            }, 1500);
        }
    });
</script>
@if(session()->has('update_success'))
    <div class="addsuccess_update close_addsuccess_popup">
        <div class="addsuccess-popup">
            <div class="addsuccess-popup-1">
                <div class="add-product-icon-1" onclick="close_addsuccess_popup()">
                    <img src="/img/X.png">
                </div>
                <div class="img-popup-and-text">
                    <div class="img-popup-and-text-1">
                        <img src="/img/adsuccess1.png">
                        <h4>
                            {{session()->get('update_success')}}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
<script>
    $(function () {
// Hiển thị popup nếu có thông báo thành công trong session
        if ($('.addsuccess_update').length && $('.addsuccess_update').is(':visible')) {
            $('.addsuccess_update').fadeIn();
            setTimeout(function () {
                $('.addsuccess_update').fadeOut(function () {
                    @if(isset($updateproduct))
                        window.location.href = "{{ route('product.show', $updateproduct ) }}";
                    @endif
                });
            }, 1500);
        }
    });
</script>
@if(session()->has('delete_success'))
    <div class="addsuccess close_addsuccess_popup">
        <div class="addsuccess-popup">
            <div class="addsuccess-popup-1">
                <div class="add-product-icon-1" onclick="close_addsuccess_popup()">
                    <img src="/img/X.png">
                </div>
                <div class="img-popup-and-text">
                    <div class="img-popup-and-text-1">
                        <img src="/img/delete.png">
                        <h4>
                            {{session()->get('delete_success')}}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
<div class="delete-popup">
    <div class="popup-delete">
        <div class="delete-popup-1">
            <div class="add-product-icon-1">
            </div>
            @if(isset($item))
                <div class="img-popup-and-text">
                    <div class="img-popup-and-text-delete">
                        <img src="/img/delete.png">
                        <p class="text-delete-1">
                            Bạn có chắc muốn xóa sản phẩm <span class="text-dele text-1"></span>?
                        </p>
                        <p class="text-delete-2">
                            Sản phẩm sẽ bị <span class="text-dele">xóa vĩnh viễn</span>.
                        </p>
                    </div>
                    <div class="button-popup-delete">
                        <div class="button-popup-delete-huy" onclick="back_popup()">Hủy</div>
                        <form action="" method="post" class="up_link">
                            @csrf
                            @method('Delete')
                            <div class="button-popup-delete-1">
                                <div class="product-delete-button">
                                    <button class="product-delete-button-1" type="submit">Xóa</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
<script src="{{ asset('js/script.js') }}"></script>


