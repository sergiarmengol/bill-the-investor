<?
?>

<div class="">
	<div class="row">
		<div class="col-md-8 col-xs-12 markets-list">
			<div class="panel panel-default">
			    <div class="panel-heading">
		  			<h3>Stocks</h3>
			    </div>
	    		<div class="panel-body">
    
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
					      </tr>
					    </thead>
					    <tbody>
					    	<? foreach ($stocks as $key => $stock) : ?>
						      <tr>
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
	  		<h4> Create new Stock </h4>
  			 <form id="newExchange" action="" method='POST'>
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
			    <button id="newStockButton" type="submit" class="btn btn-primary">Submit</button>
			  </form>
	  	</div>
	</div>
</div>
