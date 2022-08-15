//For Item-list.html
$(".full-screen-btn").click(function(){
    let current = $(this).closest(".card");

    $(this).closest(".card").toggleClass("full-screen-card");
    $("#example").toggleClass("example");

    if(current.hasClass("full-screen-card")){
        $(this).html(`<i class="fa-solid fa-down-left-and-up-right-to-center"></i>`)
    }else{
         $(this).html(`<i class="fa-solid fa-up-right-and-down-left-from-center"></i>`)
    }
});

//scrollTop For Menu Bar
// let screenHeight = $(window).height();
// let currentMenuHeight = $(".nav-menu .Active").offset().top;
//
// if(currentMenuHeight> screenHeight*0.8){
//     $(".sidebar").animate({
//         scrollTop:currentMenuHeight-100,
//     },1000);
// };




//for template.html
$(".show-sidebar").click(function(){
   $(".sidebar").animate({marginLeft : 0 } )
  
});

$(".hide-sidebar").click(function(){
    $(".sidebar").animate({marginLeft : "-100%"} , 1000)
   
 });

 $(".counter-up").counterUp({
   delay: 20,
   time: 2000
});

function go(url){
   setTimeout(function(){
      location.href = `${url}`;
   } , 500);
}





// $(".full-screen-btn").click(function(){
//         console.log("hello");
// });