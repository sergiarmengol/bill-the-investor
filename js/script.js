
$(document).ready(function(){
  // Just if the page has the google charts graphics
  if($("#graphicsDiv").length !== 0) {
    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawDualY);
    $(window).resize(function(){
      drawDualY();

    });
  }
});

/************ Add new  Stock  via ajax ***********/

$('#newStockButton').click(function(){
  data = $('#newStock').serialize();
  if(data !== "") {
    $.ajax({
      data:  data,
      url:   '/ajax/newStock/',
      type:  'post',
      dataType:'json',
      beforeSend: function () {
            $("#newStockButton").html("Sending...");
      },
      success:  function (response) {
        if(response) {
            console.log(response);
            stock = response.data;
            content = '<tr id="stock_'+stock.id+'"><td width="20%">'+stock.company_name+'</td><td width="30%">'+stock.exchange_name+'</td><td width="25%">'+stock.stock_type_name+'</td><td width="15%">'+stock.date+'</td><td width="10%">'+stock.time+'</td><td width="5%">'+stock.price+'€</td><td data-toggle="modal" data-target="#deleteStockModal" class="remove-stock" data-id="'+stock.id+'"><span class="glyphicon glyphicon-remove tick-remove"></span></td></tr>';
            console.log($('#stock_'+stock.id).length);
            if($('#stock_'+stock.id).length){
              $('#stock_'+stock.id).replaceWith(content);
            }else {
              if($('.stock-list table').length) {
                
               $('.stock-list table tbody:last-child').append(content);
              } else {

                $('.stock-list').html('<table class="table"><thead><tr><th width="20%">Company</th><th width="30%">Exchange Market</th><th width="25%">Stock type</th><th width="15%">Date</th><th width="10%">Time</th><th width="5%">Price</th><th></th></tr></thead><tbody>'+content+'</tbody>');
              }
            }
            $("#newStockButton").html("Submit.");
        }
              
      }
    });
  }
});
/********************************************************/


/****** Delete stock via AJAX *****/
$(document.body).on('click','.remove-stock',function(){
  stock_id = $(this).attr('data-id');
  console.log(stock_id);
  $('#deleteStockButton').attr('data-id',stock_id);
});

$('#deleteStockButton').click(function(){
  stock_id = $(this).attr('data-id');
  data = {"id":stock_id};
  if(stock_id !== "") {
    $.ajax({
      data:  data,
      url:   '/ajax/deleteStock/',
      type:  'post',
      dataType:'json',
      beforeSend: function(){

      },
      success:  function (response) {
        if(response.response == "success") {
       
            $('#stock_'+stock_id).remove();
            $('#deleteStockModal').modal('hide');
          } else {
            console.log("error removing stock");
          }
        
              
      }
    });
  }
});
/*************************************/

/************ Add new Exchange market to the list via ajax ***********/
$('#newExchangeButton').click(function(){
 
  data = $('#newExchange').serialize();

  if(data !== "") {
    $.ajax({
      data:  data,
      url:   '/ajax/newExchange/',
      type:  'post',
      dataType:'json',
      beforeSend: function () {
              $("#newExchangeButton").html("Sending...");
      },
      success:  function (response) {
        if(response) {
            console.log(response);
            var content = '<tr><td width="50%">'+response.data.name+'</td><td width="10%">';
            if(response.data.state == 1) {
              content += '<span class="label label-success">Active</span></td></tr>';
            } else {
              content += '<span class="label label-danger">Desactive</span></td></tr>';
            }

            if($('.markets-list table').length) {
              
             $('.markets-list table tbody:last-child').append(content);
            } else {

              $('.markets-list').html('<table class="table "><thead><tr><th width="50%">Market name</th><th width="10%">State</th></tr></thead><tbody class="body-table unit-table">'+content+'</tbody>');
            }
            $("#newExchangeButton").html("Submit.");
        }
              
      }
    });
  }
});

/********************************************************/


/**
*   Google charts function 
**/
function drawDualY() {

    var jsonData = $.ajax({
          url: "/ajax/getChartData/",
          dataType: "json",
          async: false
          }).responseText;
      
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


/**
* Strip html tags from string 
**/



