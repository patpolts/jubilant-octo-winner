$(function(){
  var tabOpen = false;
  var loading = true;


  //when page has loaded
    $(document).ready(function () { 
      //changes on states
      loading = false;

      //methods
      isLoading();
      metasButtons();
      loadGrafico();
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
function loadGrafico() {
  var tabs = $(".grafico");
  var total = tabs.length;
  for (let index = 0; index < total; index++) {
    const element = tabs[index];
    let arr = $(element).data("grafico");
    let id = $(element).attr("id");
    
    renderChart(id,arr);
    // console.log();
    
  }
}
  function metasButtons() {

    $(".card.details").show();
    $(".notify").hide();
    $(".meta-buttons > div > a").click(function (e) { 
      e.preventDefault();

      var tab     = $(this).data("target");
      var content = $(this).data("content");

      // console.log(tab);
      if(content == "notify"){
        $(".tab-"+tab+"  .card.details").hide();
        $(".tab-"+tab+"  .card.notify").show();
      }else{
        $(".tab-"+tab+"  .card.details").show();
        $(".tab-"+tab+"  .card.notify").hide();
      }
    });

  }
 
});

function renderChart(chartId,chartData) {
  //rgba(164, 75, 58, 1)
  var chart = "homeChart-"+chartId;
  var ctx = document.getElementById(chart).getContext('2d');
  chartData.push(100);
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['% META', '% AÇÔES'],
        datasets: [{
          label: '',
          data: chartData,
          backgroundColor: [
              'rgba(164, 75, 58, 0.4)',
              'rgba(195, 126, 107, 0.4)'
          ],
          borderColor: [
              'rgba(164, 75, 58, 1)',
              'rgba(195, 126, 107, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
  });

}