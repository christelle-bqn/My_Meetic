$(document).ready(function(){
    $('.menu li').hover(function(){
        $('ul:first', this).stop().slideDown();
    },function(){
        $('ul:first', this).stop().slideUp();
    });
});