// PRODUCT 
const thongtin = document.querySelector(".thongtin")
const thongso = document.querySelector(".thongso")
if (thongso) {
    thongso.addEventListener("click", function() {
        document.querySelector(".product-content-right-bottom-content-thongtin").style.display = "none"
        document.querySelector(".product-content-right-bottom-content-thongso").style.display = "block"
    })
}

if (thongtin) {
    thongtin.addEventListener("click", function() {
        document.querySelector(".product-content-right-bottom-content-thongtin").style.display = "block"
        document.querySelector(".product-content-right-bottom-content-thongso").style.display = "none"
    })
}

const butTom = document.querySelector(".product-content-right-bottom-top")
if (butTom) {
    butTom.addEventListener("click", function() {
        document.querySelector(".product-content-right-bottom-content-big").classList.toggle("activeB")
    })
}




// ------ hieu ung chuyển ảnh
const bigImg = document.querySelector(".product-content-left-big-img img")
const smallImg = document.querySelectorAll(".product-content-left-small-img img")
smallImg.forEach(function(imgItem, X) {
    imgItem.addEventListener("click", function() {
        bigImg.src = imgItem.src
    })
})


//zoom ảnh
$(function() {
    $(".product-content-left-big-img, .product-content-left-small-img ").xzoom({
        zoomWidth: 400,
        tint: "#333",
        Xoffset: 15,
    });
});
const header = document.querySelector("header");
window.addEventListener("scroll", function() {
    x = window.pageYOffset;
    if (x > 0) {
        header.classList.add("sticky");
    } else {
        header.classList.remove("sticky");
    }
})

// product
const productContainers = [...document.querySelectorAll('.product-container')];
const nxtBtn = [...document.querySelectorAll('.nxt-btn')];
const preBtn = [...document.querySelectorAll('.pre-btn')];

productContainers.forEach((item, i) => {
    let containerDimensions = item.getBoundingClientRect();
    let containerWidth = containerDimensions.width;

    nxtBtn[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth;
    })

    preBtn[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth;
    })
})

const imgPosition = document.querySelectorAll(".aspect-ratio-169 img");
const imgContainer = document.querySelector('.aspect-ratio-169');
const dotItem = document.querySelectorAll(".dot");
let imgNumber = imgPosition.length;
let index = 0;
imgPosition.forEach(function(image, index) {
    image.style.left = index * 100 + "%";
    dotItem[index].addEventListener("click", function() {
        slider(index);
    })
})

function imgSlide() {
    index++;
    if (index >= imgNumber) {
        index = 0;
    }
    slider(index);
}

function slider(index) {
    imgContainer.style.left = "-" + index * 100 + "%"
    const dotActive = document.querySelector('.active');
    dotActive.classList.remove("active");
    dotItem[index].classList.add("active");
}
setInterval(imgSlide, 4000)