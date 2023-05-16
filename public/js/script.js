
var clk = document.querySelector(".category_click_danhmuc")
var shw = document.querySelector(".subcategory_danhmuc")
clk.addEventListener('click', function () {
    shw.style.display = shw.style.display === 'none' ? 'block' : 'none';
})

var clk2 = document.querySelector(".category_click_sanxuat")
var shw2 = document.querySelector(".subcategory_sanxuat")
clk2.addEventListener('click', function () {
    shw2.style.display = shw2.style.display === 'none' ? 'block' : 'none';
})


// -------------------Dong popup-------------------
function close_popup() {
    document.querySelector('.close_popup').style.display = 'none';
}

function close_addsuccess_popup() {
    document.querySelector('.close_addsuccess_popup').style.display = 'none';
}

function back_popup() {
    document.querySelector('.delete-popup').style.display = 'none';
}


function open_popup_delete(deleteProduct) {
    var id_pro = $(deleteProduct).parents('.button-update-delete').find('.id-pro').attr('data-id');
    var current_url = window.location.href;
    var url_parts = current_url.split('?'); // Tách URL thành phần đường dẫn và phần truy vấn
    var path = url_parts[0]; // Lấy phần đường dẫn của URL
    var new_url = path + '/' + id_pro; // Thêm đoạn '/id_pro' vào cuối đường dẫn
    console.log(new_url);
    $('.up_link').attr('action', new_url); // Cập nhật thuộc

    var nameProduct = $(deleteProduct).parents('.product').find('.product-name-1').text();
    var popup = document.querySelector('.delete-popup');
    if (popup) {
        popup.style.display = 'block';
    }
    $('.text-1').html(nameProduct)
}

// ----------------------Mo popup-------------------
function open_popup() {
    document.querySelector('.close_popup').style.display = 'block';
}

function click_addsuccess() {
    document.querySelector('.addsuccess').style.display = 'block';
    document.querySelector('.close_popup').style.display = 'none';
}

function goToPage(url) {
    window.location = url;
}

var click_image = document.querySelector('.title-product-addimg');
var chon_anh = document.querySelector('.input-img');
if (click_image != null) {
    click_image.addEventListener('click', function () {
        chon_anh.click();
    });
}

function loadImage(input, output) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $(output).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$('.update-img').click(function () {
    $('#image').click();
})

$('#image').change(function () {
    loadImage(this, '.update_image');
})

$('#image_slide').change(function () {
    loadImage(this, '.slide-img');
})

function updateTitle() {
    var fileInput = document.querySelector('.input-img');
    var filename = fileInput.files[0].name;
    var titleElement = document.querySelector('.title-product-addimg');
    titleElement.innerText = filename;
}

var fileInput = document.querySelector('.input-img');
if (fileInput != null) {
    fileInput.addEventListener('change', updateTitle);
}


// -------------loai bo ki tu dac biet o search---------------

var search_box = document.getElementById('search_box');
if (search_box !== null && search_box.addEventListener) {
    search_box.addEventListener('input', function (event) {
        var input = event.target.value;
        var sanitizedInput = input.replace(/[^\w\s]/gi, '');

        if (sanitizedInput !== input) {
            event.target.value = sanitizedInput;
        }
    });
}

// Lấy element của progress bar
// const progressBar = document.getElementById("progress");
//
// // Hiển thị progress bar khi tải trang
// window.onload = () => {
//     progressBar.style.width = "100%";
//     setTimeout(() => {
//         progressBar.style.display = "none";
//     }, 500);
// };
//
// // Hiển thị progress bar khi Ajax request được gọi
// $(document).ajaxSend(() => {
//     progressBar.style.width = "50%";
// });
//
// // Ẩn progress bar khi Ajax request hoàn thành
// $(document).ajaxComplete(() => {
//     progressBar.style.width = "100%";
//     setTimeout(() => {
//         progressBar.style.display = "none";
//     }, 500);
// });

// Lấy phần tử HTML chứa nút "Thêm ảnh"
var uphtml = '<div class="img-slide imgframe" hidden>';
uphtml += '<div class="img-and-text-slide">';
uphtml += '<div class="text-slide">Ảnh 1</div>';
uphtml += '<div class="img-slide-small">'
uphtml += '<input type="text" hidden name="idImgSlider[]" value="" id="idImage">';
uphtml += '<img class="slide-img" src="">';
uphtml += '<div class="update-delete-img-sub">';
uphtml += '<div class="update-img-sub" onclick="image_upload(this)">Cập nhật</div>';
uphtml += '<input type="file" name="image_slide[]" id="image_slide" class="input-update-img" hidden>';
uphtml += '<div class="delete-img-sub" onclick="image_delete(this)">Xóa</div>';
uphtml += '<input type="text" name="idImageDelete[]" hidden value="" id="getIdImage">';
uphtml += '</div>';
uphtml += '</div>';
uphtml += '</div>';
uphtml += '</div>';

function add_imgslide(imgslide) {
    var save = $(imgslide).closest('.img-slide');
    save.before(uphtml);

    var save_img_input = $(imgslide).parents('.img-slide-all').find('.input-update-img').last();
    var save_img = $(imgslide).parents('.img-slide-all').find('.slide-img').last();
    save_img_input.click();

    save_img_input.on('change', function (){
        if($(".imgframe").length === 4 && $(".imgframe").css('display', 'block')){
            $(".imgframe1").hide();
        }

        if (this.files.length > 0) {
            $(".imgframe").show();
        }
        loadImage(this, save_img);
    })
}

$(".imgframe").each(function(){
    if($(".imgframe").length === 4){
        $(".imgframe1").remove();
    }
})

function image_upload(update_imageslide) {
    var slideItemImage = update_imageslide.closest('.img-slide-small');
    var inputElement = slideItemImage.querySelector('.input-update-img');

    $(inputElement).off('change').on('change', function(){
        var imgElement = slideItemImage.querySelector('.slide-img');
        loadImage(inputElement, imgElement);
    });
    inputElement.click();
}

function image_delete(delete_image){

    var idImage = $(delete_image).parents('.img-slide-small').find("#idImage").val();
    if (idImage  !== "") {
        $(delete_image).parents('.img-slide-small').find("#getIdImage").attr('value', idImage);
    }

    $(delete_image).parents(".imgframe").hide();

    if($(".imgframe").length !== 4){
        $(".imgframe1").show();
    }else{
        $(".imgframe1").hide();
    }
}
