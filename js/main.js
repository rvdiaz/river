/* change link slider shop title */
if(document.getElementsByClassName("slider-shop-product")[0]){
const slider=jQuery('.slider-shop-product .kt-post-grid-layout-carousel-wrap')
slider.attr("data-columns-xs",1);
slider.attr("data-columns-ss",1);
}

function findItemByTitle(title,array){
    for(let i=0;i<array.length;i++){
        if(array[i].children[0].children[0].children[1].children[0].children[0].children[0].innerHTML==title)
    return array[i].children[0].children[0].children[1].children[0].children[0].children[0];
    }
    return null;
}

// footer date years
var date = new Date();
var year = date.getFullYear()
if(document.getElementsByClassName("copy-right-footer")[0]){
document.getElementsByClassName('copy-right-footer')[0].innerHTML = "©"+" "+ year +" "+"Rivers Spencer";
}

/* image click meet rivers section */
jQuery('.meet-rivers-image').click(function(){
    window.open(jQuery('.link-button-meet-rivers a').prop('href'),'_blanck');
});

/* change view grid content page blog */
if(document.getElementsByClassName("first-blog-grid")[0]){
const firstBlogGridArticles=jQuery('.first-blog-grid .kt-blocks-post-grid-item');
changeGridContentView(firstBlogGridArticles); 
}
if(document.getElementsByClassName("second-blog-grid")[0]){
    const secondBlogGridArticles=jQuery('.second-blog-grid .kt-blocks-post-grid-item');
    secondBlogGridArticles.each(function(){
        changeGridContentView(jQuery(this));
    }
);
}
function changeGridContentView(gridObject){
    const contentInfo=gridObject.find('.entry-content');
    const title=gridObject.find('.entry-title');
    gridObject.find('header').append(gridObject.find('.kt-blocks-post-readmore-wrap'));
    gridObject.find('header .kt-blocks-above-categories a').removeAttr('href');
    title.find('a').text(title.find('a').text()+"/"+contentInfo.text());
    contentInfo.remove();
}

// Service Post
if(document.getElementsByClassName("post-service-js")[0]){
const forPost = document.getElementsByClassName("post-service-js")[0].children[0].children[0].children[0].children;

let last = forPost.length - 1;
    if (forPost) {    
    for (let i = 0; i < last; i++) {   
        forPost[i].appendChild(getPostService()); 
        }
    }
}
function getPostService() {
   let separator = document.createElement('div');
   separator.classList.add("separator");
   let line1 =  document.createElement('div');
   line1.classList.add("line");
   let logo = document.createElement('div');
   logo.classList.add("logo");
   let line2 =  document.createElement('div');
   line2.classList.add("line");
   separator.appendChild(line1);
   separator.appendChild(logo);
   separator.appendChild(line2);
   return separator;
}

/* menu filter blogs */
function toggleNav() {
    const sideMenu= document.getElementById("sideNavigation");
    if(sideMenu.style.width==""){
        if(window.screen.width < 1000)
            sideMenu.style.width="100%";
        else
        sideMenu.style.width="45%";
    }
    else 
    sideMenu.style.width="";
}

/* menu categories single blog */
function openCategories(){
    const catMenu=document.getElementById("single-blog-cat-menu");
    if(catMenu.style.width==""){
        catMenu.style.width="100%";
    }
    else{
        catMenu.style.width="";
    }
}

/* form search blogs */
function toggleSearch(){
    if(window.screen.width < 1000){
    const searchInput= document.getElementsByClassName("searchBlog")[0];
    if(searchInput.style.display=="block"){
    searchInput.style.display="none";  
    }
    else {
    searchInput.style.display="block";
    searchInput.focus(); 
    }
}
else filterByCharacter();
}

/* methods blog filters */
function filterByCategory(event){
    toggleNav();
    const category_name=event.currentTarget.innerHTML;
    jQuery.ajax({
        type:"post",
        url:ajax_var.url,
        data:{
            action:"blog-list-byCategory",
            category_name:category_name
        },
        beforeSend:function(){
            jQuery("#gridBlogs").html(`
            <div class="loadingContainer">
                <div class="loadingGift"></div>
            </div>`);
        },
        success:function(result){
            jQuery("#gridBlogs").html(result);
        }
    });
}
function filterByCharacter(){
    const searchName=document.getElementsByClassName("searchBlog")[0].value;
    jQuery.ajax({
        type:"post",
        url:ajax_var.url,
        data:{
            action:"blog-list-bySearch",
            search_name:searchName
        },
        beforeSend:function(){
            jQuery("#gridBlogs").html(`
            <div class="loadingContainer">
                <div class="loadingGift"></div>
            </div>`);
        },
        success:function(result){
            jQuery("#gridBlogs").html(result);
        }
    });
}    

/* see more button blog landing */
jQuery('.see-more-button').click(()=>{
    const sliderShop=jQuery('.slider-shop-title')[0];
    sliderShop.scrollIntoView({
        behavior: "smooth"
    });
})

jQuery(document).ready(function(){
    if(window.screen.width < 1000){
        if(document.getElementsByClassName("title-single-service-movil")[0]){
            const movilTitleServices=document.getElementsByClassName("title-single-service-movil")[0].children[0];
            if(document.getElementsByClassName('titulo-single-service')[0]){
            const titleServices=document.getElementsByClassName('titulo-single-service')[0];
            movilTitleServices.appendChild(titleServices);}
        }
    }
});

/* hide modal suscribe */
function hideModal(){
    document.getElementById("openModal").classList.add("hideModal");
    jQuery('body').css('overflow','scroll');
}

/* popup portfolio*/
function show_portfolio_popup(event){
    jQuery('body').css('overflow','hidden');
    let html='';
    const portfolio_id= event.currentTarget.parentElement.children[1].value;
    jQuery.ajax({
        type:"post",
        url:ajax_var.url,
        data:{
            action:"show_portfolio_popup",
            portfolio_id:portfolio_id
        },
        beforeSend:function(){
            jQuery("#portfolio_modal").html(`
            <div id="openModal" class="modalPorftolio">
                <div class="loadingContainerPortfolioGalery">
                    <div class="loadingGift"></div>
                </div>
            </div>`);
        },
        success:function(result){
            if(eval(result)[1]!=""){
            html+=`<div id="openModal" class="modalPorftolio">
                <a onClick="hideModal()" class="closePortfolioModal">X</a>
                <div class="modalPortfolioGalery">
                <div class="main_portfolio_image">`+eval(result)[0]+`</div>
                <div class="carousel carouselPortfolio">`+eval(result)[1]+`</div></div>
            </div>`; 
            jQuery("#portfolio_modal").html(html);
            jQuery(".carousel").flickity({
                cellAlign:'left',
                contain: true,
                wrapAround: false,
                freeScroll: true,
                prevNextButtons: false,
                pageDots: false
            });
        }else{
        html+=`<div id="openModal" class="modalPorftolio">
        <a onClick="hideModal()" class="closePortfolioModal">X</a>
        <h1 class="notFoundPorfolio">Not found porftolio images </h1>
        </div>`;
        jQuery("#portfolio_modal").html(html);
        }
        }
    });
}

function update_portfolio_image(event){
    jQuery("#principal_portfolio_img").attr("src",event.currentTarget.children[0].src);
}

