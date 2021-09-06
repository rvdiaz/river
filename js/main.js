/* change link slider shop title */
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
const forPost = document.getElementsByClassName("service-post-separator")[0].children[0].children[0].children[0].children;

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
let last = forPost.length - 1;
if (forPost) {    
 for (let i = 0; i < last; i++) {   
    forPost[i].appendChild(getPostService()); 
 }
}
