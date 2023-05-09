<div id="header">
    <div class="navigation">
        <div class="logo_header">
            <img src="/img/image 5.png">
            <img src="/img/NCC.png">
        </div>
{{--        <a href="{{route('trangchu')}}">Sản Phẩm</a>--}}
        <a href="{{route('product.index')}}">Products</a>
        <form action="{{route('logout_success')}}" method="post">
            @csrf
            <button style="cursor: pointer;color: white;width: 70px;height: 30px;background: #ff8666;border: none;border-radius: 10px;margin-left: 870px;" type="submit">Logout</button>
        </form>
    </div>
</div>

