const slider=document.getElementsByClassName("slider-shop-product")[0];
if(slider){
slider.children[0].setAttribute("data-columns-xs",1);
slider.children[0].setAttribute("data-columns-ss",1);
}
function findItemByTitle(title,array){
    for(let i=0;i<array.length;i++){
        if(array[i].children[0].children[0].children[1].children[0].children[0].children[0].innerHTML==title)
    return array[i].children[0].children[0].children[1].children[0].children[0].children[0];
    }
    return null;
}
