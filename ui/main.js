jQuery(document).ready(function($){
  var context = $("#table-recherche");
  var input = $("#color_recherche").attr('atr');
  //console.log(input);

  context.removeHighlight();
  context.highlight(input);

});
