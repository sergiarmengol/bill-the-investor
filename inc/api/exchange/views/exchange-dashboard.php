
<div class="">
	<div class="row">
		<div class="col-md-6 col-xs-12 markets-list">
		  	<div class="panel panel-default">
			    <div class="panel-heading">
			      <h3>Exchange markets</h3>  
			    </div>
	    		<div class="panel-body table-col">
		    
				 	<? if(isset($success) && $success == true) : ?>
					    <div class="alert alert-success">
					      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					      <strong>Success!</strong> Exchange market created correctly
					    </div>
				  	<? endif; ?> 

				  	<? if(isset($exchange_markets)) : ?>
					  <table class="table">
					    <thead>
					      <tr>
					        <th width="75%">Market name</th>
					        <th width="15%">State</th>
					        <th width="10%"></th>
					      </tr>
					    </thead>
					    <tbody>
					    	<? foreach ($exchange_markets as $key => $exchange) : ?>
						      <tr id="exchange_<?= $exchange->id ?>">
						        <td width="75%">
						        	<a href="/exchange-market/edit-exchange?id=<?= $exchange->id ?>">
						        		<?= $exchange->name ? $exchange->name : ''?>    			
					        		</a>
					    		</td>
					    		
						        <td width="15%">
						        	<? 
						        	if($exchange->state == 0) {
						    			$label="danger";
						    			$state="Desactive";
						        	} else if($exchange->state == 1) {
						    			$label="success";
						    			$state="Active";
						        	}
						        	?>
						        	<span class="label label-<?= $label ?>"><?= $state ?></span>
						        </td>
						        <td width="10%" data-toggle="modal" data-target="#deleteExchangeModal" class="remove-exchange" data-id="<?= $exchange->id ?>"><span class="glyphicon glyphicon-remove tick-remove"></span></td>
						      </tr>
					  		<? endforeach; ?>
					     
					    </tbody>
					  </table>
				  	<? else : ?>
						<div class="alert alert-warning">
					     	No exchange markets found. 
					    </div>
				  	<?endif;?>
			  	</div>
	  		</div>
  		</div>

	  	<div class="col-md-6 col-xs-12">
	  	<br>
	  		<h4> Create new Exchange Market </h4>
  			 <form id="newExchange" action="" method='POST'>
			    <div class="row">
			      <div class="col-md-8 col-xs-12">
			          <div class="form-group">
			            <label for="exchangeNewName">Name</label>
			            <input type="text" class="form-control" id="exchangeNewName" name="name"  placeholder="Company name">
			          </div>
			        </div>
			        <div class="col-md-4 col-xs-12">
			        <label for="exampleInputEmail1">State</label><br>
			          <div class="btn-group" data-toggle="buttons">
			              <label class="btn btn-primary active">
			                <input value="1" type="radio" name="state" id="active" autocomplete="off" checked="" > Active
			              </label>
			              <label class="btn btn-primary">
			                <input value="0" type="radio" name="state" id="desactive" autocomplete="off"> Desactive
			              </label>
			          </div>
			      </div>
			    </div>
			    <button id="newExchangeButton" type="button" class="btn btn-primary">Submit</button>
			  </form>
	  	</div>
	</div>
</div>

<div id="deleteExchangeModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Are you sure to delete this Exchange Market ?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button id="deleteExchangeButton" data-id="" type="button" class="btn btn-primary">Yes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
