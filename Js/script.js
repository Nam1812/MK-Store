// menu-item
const toP = document.querySelector(".top")
window.addEventListener("scroll", function(){
    const X = this.pageYOffset;
    if(X>1) {
        toP.classList.add("active")
    }
    else {
        toP.classList.remove("active");
    }
})


// cartegorry
const itemsliderbar = document.querySelectorAll(".cartegory-left-li");
itemsliderbar.forEach(function(menu,index){
    menu.addEventListener("click",function(){
        menu.classList.toggle("block")
    })
})



// loading
