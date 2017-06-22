
<div class="">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>New company</h3>
    </div>
    <div class="panel-body">
      
      
        <? if(isset($success) && $success == true) : ?>
          <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Company created correctly
          </div>
        <? endif; ?> 
      <form action="" method='POST'>
        <div class="row">
          <div class="col-md-8 col-xs-12">
              <div class="form-group">
                <label for="companyName">Name</label>
                <input type="text" class="form-control" id="companyName" name="name"  placeholder="Company name">
              </div>
          </div>
          <div class="col-md-4 col-xs-12">
            <label for="exampleInputEmail1">State</label><br>
              <div class="btn-group" data-toggle="buttons">
                  <label class="btn btn-primary active">
                    <input value="1" type="radio" name="state" id="active" autocomplete="off" checked="checked" > Active
                  </label>
                  <label class="btn btn-primary">
                    <input value="0" type="radio" name="state" id="desactive" autocomplete="off"> Desactive
                  </label>
              </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-xs-12 pull-left">
              <div class="form-group">
                <label for="companyAddress">Address</label>
                <input type="text" class="form-control" id="companyAddress" name="address"  placeholder="Company address">
              </div>
          </div>
          <div class="col-md-8 col-xs-12">
              <div class="form-group">
                <label for="companyAddress">Description</label>
                <textarea class="form-control" rows="5" id="comment" name="description" ></textarea>          
              </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
      </form>
    </div>
  </div>
</div>