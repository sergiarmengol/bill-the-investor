
$(document).ready(function(){
  google.charts.load('current', {packages: ['corechart', 'bar']});
  google.charts.setOnLoadCallback(drawDualY);
  $(window).resize(function(){
    drawDualY();

  });
});

// Add new Exchange market to the list via ajax
$('#newExchangeButton').click(function(){
  data = $('#newExchange').serialize();
  if(data !== "") {
    $.ajax({
      data:  data,
      url:   '/ajax/newExchange/',
      type:  'post',
      beforeSend: function () {
              $("#newExchangeButton").html("Sending...");
      },
      success:  function (response) {
        if(response) {
            var res = JSON.parse(response)
            console.log(res);
            var content = '<tr><td width="50%">'+res.data.name+'</td><td width="10%">';
            if(res.data.state == 1) {
              content += '<span class="label label-success">Active</span></td></tr>';
            } else {
              content += '<span class="label label-danger">Desactive</span></td></tr>';
            }

            if($('.markets-list table').length) {
              
             $('.markets-list table tbody:last-child').append(content);
            } else {

              $('.unit-col').html('<table class="table "><thead><tr><th width="50%">Market name</th><th width="10%">State</th></tr></thead><tbody class="body-table unit-table">'+content+'</tbody>');
            }
            $("#newExchangeButton").html("Submit.");
        }
              
      }
    });
  }
});



function drawDualY() {

    var jsonData = $.ajax({
          url: "/ajax/getChartData/",
          dataType: "json",
          async: false
          }).responseText;
    console.log(JSON.parse(jsonData));
      
      var data = new google.visualization.arrayToDataTable(JSON.parse(jsonData).company_by_price);
      var data_pie = new google.visualization.arrayToDataTable(JSON.parse(jsonData).company_by_market);
      var options = {
        colors: ['#1b9e77','#7570b3'],

      };
      var options_pie = {
        is3D: true,
      };

      var materialChart = new google.charts.Bar(document.getElementById('chart_div'));
      materialChart.draw(data,options);

      var piechart = new google.visualization.PieChart(document.getElementById('chart_pie_div'));

      piechart.draw(data_pie,options_pie);
}

