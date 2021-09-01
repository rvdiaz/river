
const url=document.getElementsByClassName("link-portfolio-slider")[0];
const imagesSliderHome=document.getElementsByClassName("slider-home-item");
for(let i=0;i<imagesSliderHome.length;i++)
imagesSliderHome[i].onclick=function(){
    window.open(url,'_blanck');
}