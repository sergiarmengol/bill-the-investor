

<div class="">
  <div class="row">
    <div class="col-md-6 col-xs-12">
      <h4>Edit - <?= $exchange->name ?> </h4>

     <? if(isset($success) && $success == true) : ?>
      <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> Changes saved correctly.
      </div>
    <? endif; ?>
      <form action="/exchange-market/edit-exchange?id=<?= $exchange->id ?>" method='POST'>
        <input type="hidden" name="id" value="<?= $exchange->id ?>">
        <div class="row">
          <div class="col-md-8 col-xs-12">
              <div class="form-group">
                <label for="companyName">Name</label>
                <input type="text" class="form-control" id="companyName" name="name"  value="<?= $exchange->name ?>" placeholder="Company name">
              </div>
            </div>
            <div class="col-md-4 col-xs-12">
            <label>State</label><br>
              <div class="btn-group" data-toggle="buttons">
                  <label class="btn btn-primary <?= $exchange->state == 1 ? 'active' : ''?>">
                    <input value="1" type="radio" name="state" id="active" autocomplete="off" <?= $exchange->state == 1 ? 'checked' : ''?> > Active
                  </label>
                  <label class="btn btn-primary <?= $exchange->state == 0 ? 'active' : ''?>">
                    <input value="0" type="radio" name="state" id="desactive" autocomplete="off" <?= $exchange->state == 0 ? 'checked' : ''?>> Desactive
                  </label>
              </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary pull-left">Save Changes</button>

      </form>
    </div>
    <div class="col-md-6 col-xs-12 markets-list">
      <h4>Exchange market Stocks</h4>    

        <? if(!empty($exchange_stocks)) : ?>
        <table class="table">
          <thead>
            <tr>
              <th width="30%">Company name</th>
              <th width="30%">Stock type</th>
              <th width="15%">Date</th>
              <th width="15%">Time</th>
              <th width="10%">Price</th>
            </tr>
          </thead>
          <tbody>
            <? foreach ($exchange_stocks as $key => $stock) : ?>
              <tr>
                <td width="30%">
                  <a href="/companies/edit-company?id=<?= $stock->company_id ?>">
                    <?= $stock->company_name ? $stock->company_name : ''?>          
                  </a>
              </td>
              <td width="30%">
                  <?= $stock->stock_type_id ? $stock_types[$stock->stock_type_id]: ''?>                       
              </td>
               <td width="15%">
                <?= $stock->date_created ? date('d.m.Y',strtotime($stock->date_created)) : ''?>   
               </td>
               <td width="15%">
                <?= $stock->date_created ? date('H:i:s',strtotime($stock->date_created)) : ''?>   
               </td>
              
              <td width="30%">
                  <?= $stock->price ? $stock->price. '€' : ''?>     
              </td>
              </tr>
            <? endforeach; ?>
           
          </tbody>
        </table>
        <? else : ?>
        <div class="alert alert-warning">
            No stocks found. 
          </div>
        <?endif;?>
      </div>
  </div>
</div>
