$(function(){
  var tabOpen = false;
  var loading = true;


  //when page has loaded
    $(document).ready(function () { 
      //changes on states
      loading = false;

      //methods
      isLoading();
    });

  //SOBRE page
  $(".sobreItens").click(function (e) { 
    e.preventDefault();
    tabOpen = !tabOpen;
    var open = $(this).data("target");
    $(open).toggle();
  });

  function isLoading() {
    if(loading){
      $("#loading").show();  
      $("#loaded").hide(); 
    }else{
      $("#loading").hide();  
      $("#loaded").show(); 
    }
  }
 
});