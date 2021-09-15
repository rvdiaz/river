/* change link slider shop title */
if(document.getElementsByClassName("slider-shop-product")[0]){
const slider=document.getElementsByClassName("slider-shop-product")[0];
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

/* image click meet rivers section */
jQuery('.meet-rivers-image').click(function(){
    window.open(jQuery('.link-button-meet-rivers a').prop('href'),'_blanck');
});

/* change view grid content page blog */
if(document.getElementsByClassName("first-blog-grid")[0]){
const firstBlogGridArticles=document.getElementsByClassName("first-blog-grid")[0].children[0].children[0];
changeGridContentView(firstBlogGridArticles);
}
if(document.getElementsByClassName("second-blog-grid")[0]){
const secondBlogGridArticles=document.getElementsByClassName("second-blog-grid")[0].children[0].children;
for(let i=0;i<secondBlogGridArticles.length;i++)
changeGridContentView(secondBlogGridArticles[i]);
}
function changeGridContentView(gridObject){
    const contentInfo=gridObject.children[0].children[1].children[1];
    const title=gridObject.children[0].children[1].children[0].children[1].children[0];
    gridObject.children[0].children[1].children[0].appendChild(contentInfo.children[0]);
    gridObject.children[0].children[1].children[0].children[0].children[0].removeAttribute('href');
    title.innerHTML=title.innerHTML+"/"+contentInfo.innerHTML;
    gridObject.children[0].children[1].removeChild(contentInfo);
}

// Service Post
if(document.getElementsByClassName("service-post-separator")[0]){
const forPost = document.getElementsByClassName("service-post-separator")[0].children[0].children[0].children[0].children;

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
//titulo single service 
var title = document.querySelector(".title-single-service");
console.log(title);

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
else
filterByCharacter();
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
