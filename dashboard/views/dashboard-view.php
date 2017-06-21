<??>
<div class="row">
 <div class="col-md-8">
    <h4> Companies Stocks </h4>
    <div class="row">
      <? $count= 0; ?>
      <? if(isset($companies_grouped)) : ?>
        <? foreach($companies_grouped as $company_name => $group) : ?>
          <? foreach($group as $stock_type => $group_type) : ?>
            <div class="col-md-4">
              <div class="panel <?= $count == 0 ? 'panel-primary' : 'panel-success' ?>">
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
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left"><?= $t->exchange_name ?></span>
                            <span class="pull-right"><?= $t->price ?> €</span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                  <? endforeach; ?>
              </div>
               <? $count++; ?>
          <? endforeach ;?>
         
        <? endforeach ;?>
      <? else : ?>
        <div class="alert alert-warning">
              No Company stocks found. 
            </div>
      <? endif; ?>
      </div>
    </div>
    <div class="col-md-4">
     <h4>Highest market prices</h4>
      <div class="row"></div>
      
    </div>
</div>