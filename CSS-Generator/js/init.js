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
 
