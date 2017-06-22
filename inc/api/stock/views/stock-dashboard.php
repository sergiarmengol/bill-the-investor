<?
?>

<div class="">
	<div class="row">
		<div class="col-md-8 col-xs-12 markets-list">
			<div class="panel panel-default">
			    <div class="panel-heading">
		  			<h3>Stocks</h3>
			    </div>
	    		<div class="panel-body stock-list">
    
				 	<? if(isset($success) && $success == true) : ?>
					    <div class="alert alert-success">
					      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					      <strong>Success!</strong> Exchange market created correctly
					    </div>
				  	<? endif; ?> 

				  	<? if(!empty($stocks)) : ?>
					  <table class="table">
					    <thead>
					      <tr>
					      	<th width="20%">Company</th>
					        <th width="30%">Exchange Market</th>
					        <th width="25%">Stock type</th>
					        <th width="15%">Date</th>
					        <th width="10%">Time</th>
					        <th width="5%">Price</th>
					        <th></th>
					      </tr>
					    </thead>
					    <tbody>
					    	<? foreach ($stocks as $key => $stock) : ?>
						      <tr id="stock_<?= $stock->id ?>">
						      	<td width="20%">
						        	<a href="/companies/edit-company?id=<?= $stock->company_id ?>">
						        		<?= $stock->company_name ? $stock->company_name : ''?>    			
					        		</a>
					    		</td>
						        <td width="30%">
						        	<a href="/exchange-market/edit-exchange?id=<?= $stock->exchange_id ?>">
						        		<?= $stock->exchange_name ? $stock->exchange_name : ''?>    			
					        		</a>
					    		</td>
					    		
						        <td width="20%">
					        		<?= $stock->stock_type_id ? $stock_types[$stock->stock_type_id]: ''?>    				        		
					    		</td>
				    		 	<td width="15%">
				                	<?= $stock->date ? $stock->date : ''?>   
				               	</td>
				               	<td width="10%">
				                	<?= $stock->time ? $stock->time : ''?>   
				               	</td>
					    		<td width="5%">
					        		<?= $stock->price ? $stock->price. '€' : ''?> 		
					    		</td>
					    		<td data-toggle="modal" data-target="#deleteStockModal" class="remove-stock" data-id="<?= $stock->id ?>"><span class="glyphicon glyphicon-remove tick-remove"></span></td>
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

	  	<div class="col-md-4 col-xs-12">
	  	<br>
	  		<h4> Create /Update  Stock </h4>
  			 <form id="newStock" action="" method='POST'>
			    <div class="row">
			      	<div class="col-md-6 col-xs-12">
			          <div class="form-group">
					    <label for="companySelect">Company</label>
					    <select name="company_id" class="form-control" id="companySelect">
					    <? foreach($companies as $company) : ?>
					    	<option value="<?= $company->id?>"><?= $company->name ?></option>
						<? endforeach; ?>
					    </select>
					  </div>
			        </div>
			        <div class="col-md-6 col-xs-12">
			          <div class="form-group">
					    <label for="exchangeSelect">Exchange Market</label>
					    <select name="exchange_id" class="form-control" id="exchangeSelect">
					    <? foreach($exchange_markets as $exchange) : ?>
					    	<option value="<?= $exchange->id?>"><?= $exchange->name ?></option>
						<? endforeach; ?>
					    </select>
					  </div>
			        </div>
			        <div class="col-md-6 col-xs-12">
			          <div class="form-group">
					    <label for="stockTypeSelect">Stock type</label>
					    <select name="stock_type_id" class="form-control" id="stockTypeSelect">
					    <? foreach($stock_types as $id => $stock_type) : ?>
					    	<option value="<?= $id?>"><?= $stock_type ?></option>
						<? endforeach; ?>
					    </select>
					  </div>
			        </div>
			       	<div class="col-md-6 col-xs-12">
			          <div class="form-group">
					    <label for="inputPrice">Price</label><br>
					    <input id="inputPrice" class="form-control" type="number" step="0.01" name="price" value="" placeholder="€">
					  </div>
			        </div>
			    </div>
			    <button id="newStockButton" type="button" class="btn btn-primary">Submit</button>
			  </form>
	  	</div>
	</div>
</div>


<div id="deleteStockModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Are you sure to delete this stock ?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button id="deleteStockButton" data-id="" type="button" class="btn btn-primary">Yes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

