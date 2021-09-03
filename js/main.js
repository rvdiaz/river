
const url=document.getElementsByClassName("link-portfolio-slider")[0];
const imagesSliderHome=document.getElementsByClassName("slider-home-item");
for(let i=0;i<imagesSliderHome.length;i++)
imagesSliderHome[i].onclick=function(){
    window.open(url,'_blanck');
}

const slider=document.getElementsByClassName("slider-shop-product")[0];
slider.children[0].setAttribute("data-columns-xs",1);
slider.children[0].setAttribute("data-columns-ss",1);