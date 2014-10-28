//Visualisation at MenuBAr

//SlideDown:

$('#ul_for_li > ul > li.my_row')
 .find('li')
 .wrapInner('<div style="display: none;" />')
 .parent()
 .find('li > div')
 .slideDown(700, function(){

  var $set = $(this);
  $set.replaceWith($set.contents());

 });
 
// SlideUp:
/*
$('#my_table > tbody > tr.my_row')
 .find('td')
 .wrapInner('<div style="display: block;" />')
 .parent()
 .find('td > div')
 .slideUp(700, function(){

  $(this).parent().parent().remove();

 });*/


/*Функции обработващи заявките, които пристигат от Menu Bar-a.

$('#MulCol').on('click', function () {
    $('.opp').attr('src', 'php/MulCol.php ');
});

$('#BorRad').on('click', function () {
    $('$enterData').attr('src', '../php/ ');
    document.getElementById("BorRad").style.color = "green";
});

$('#TexSha').on('click', function () {
    $('.enterData').attr('src', '../php/ ');
});

$('#BoxSha').on('click', function () {
    $('.enterData').attr('src', '../php/ ');
});

$('#BoxRes').on('click', function () {
    $('.enterData').attr('src', '../php/ ');
});

$('#BoxSiz').on('click', function () {
    $('.enterData').attr('src', '../php/ ');
});

$('#Transit').on('click', function () {
    $('.enterData').attr('src', '../php/ ');
});

$('#Transfo').on('click', function () {
    $('.enterData').attr('src', '../php/ ');
});

$('#FontFace').on('click', function () {
    $('.enterData').attr('src', '../php/ ');
});

$('#Outline').on('click', function () {
    $('.enterData').attr('src', '../php/ ');
});

$('#RGBA').on('click', function () {
    $('.enterData').attr('src', '../php/ ');
});
*/
