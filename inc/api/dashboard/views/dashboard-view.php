<??>
<div class="row">
 <div class="col-md-12 col-xs-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4> Companies Stocks </h4>
      </div>
      <div class="panel-body">

        <div class="row">
          <? if(isset($companies_grouped)) : ?>
            <? foreach($companies_grouped as $company_name => $group) : ?>
              <? foreach($group as $stock_type => $group_type) : ?>
                <div class="col-md-3">
                  <div class="panel panel-success">
                      <div class="panel-heading">
                          <div class="row">
                              <div class="col-xs-3">
                                  <i class="fa fa-comments fa-5x"></i>
                              </div>
                              <div class="col-xs-9 text-right"><b><?= $company_name ?></b></div>
                                  <div><?= $stock_type ?></div>
                              </div>
                          </div>
                      </div>
                      <? foreach($group_type as $t) : ?>
                        <a href="/exchange-market/edit-exchange?id=<?= $t->exchange_id ?>">
                            <div class="panel-footer">
                                <span class="pull-left"><?= $t->exchange_name ?></span>
                                <span class="pull-right"><?= $t->price ?> €</span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                      <? endforeach; ?>
                  </div>
              <? endforeach ;?>
             
            <? endforeach ;?>
          <? else : ?>
            <div class="alert alert-warning">
                  No Company stocks found. 
                </div>
          <? endif; ?>
          </div>
        </div>
      </div>
  </div>
</div>
<div class="row">
    <div class="col-md-5 col-xs-12 high-price-col">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4>Highest market prices</h4>
        </div>
        <div class="panel-body">
          <div class="row">
            
             <? $count = 0; ?>
             <? foreach($companies_high_price as $high_price) : ?>
             
                  <div class="col-md-6 col-xs-12 ">
                      <div class="panel <?= $count == 0 ? 'panel-primary' : 'panel-orange'?>">
                          <div class="panel-heading">

                            <div><b><?= $high_price->company_name ?></b></div>
                            <div><?= $high_price->stock_type_name ?></div>
                         
                            <div>
                              <span class=""><?= $high_price->price ?> €</span>
                            </div>
                          </div>
                          <a href="/exchange-market/edit-exchange?id=<?= $high_price->exchange_id ?>">
                              <div class="panel-footer">
                                  <span class="pull-left"><?= $high_price->exchange_name ?></span>
                                  <div class="clearfix"></div>
                              </div>
                          </a>

                      </div>
                  </div>
              
              <?$count++;?>
            <? endforeach;?>
          </div>
        </div>
      </div>
    </div>
    <div id="graphicsDiv" class="col-md-7 col-xs-12">
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <br>
          <h5>Stock price per company/Stock type</h5>
            <div id="chart_div"></div>
        </div>
        <div class="col-md-12 col-xs-12">
         <br>
          <h5>% Companies/Exchange Market</h5>
          <div id="chart_pie_div"></div>
        </div>
      </div>
    </div>

</div>