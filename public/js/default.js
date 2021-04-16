$(function(){

  $(document).ready(function () { 
        $("#loaded").show(); 
        
  });
var tabOpen = false;
  $(".sobreItens").click(function (e) { 
    e.preventDefault();
    tabOpen = !tabOpen;
    var open = $(this).data("target");
    $(open).toggle();
  });

  });