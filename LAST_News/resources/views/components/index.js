var pages =document.querySelectorAll('.templatepage')
var l = 0;
hideall(l)

function hideall(index){
    pages.forEach((element,index) =>{
        if(index != l){
            pages.style.display = "block"
        }else   
            pages.style.display = "none"
    })
}

document.querySelector('.switcher').addEventListener((event) =>{
    l++;
    if(l == pages.length){
        l = 0
    }
    hideall(l)
})