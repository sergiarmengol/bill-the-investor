

<div class="container">
 
  <h3>Edit - <?= $company->name ?> </h3>

   <? if(isset($success) && $success == true) : ?>
    <div class="alert alert-success">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Success!</strong> Changes saved correctly.
    </div>
  <? endif; ?>
  <form action="/companies/edit-company?id=<?= $company->id ?>" method='POST'>
    <input type="hidden" name="id" value="<?= $company->id ?>">
    <div class="row">
      <div class="col-md-8 col-xs-12">
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" id="companyName" name="name"  value="<?= $company->name ?>" placeholder="Company name">
          </div>
        </div>
        <div class="col-md-4 col-xs-12">
        <label for="exampleInputEmail1">State</label><br>
          <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-primary <?= $company->state == 1 ? 'active' : ''?>">
                <input value="1" type="radio" name="state" id="active" autocomplete="off" <?= $company->state == 1 ? 'checked' : ''?> > Active
              </label>
              <label class="btn btn-primary <?= $company->state == 0 ? 'active' : ''?>">
                <input value="0" type="radio" name="state" id="desactive" autocomplete="off" <?= $company->state == 0 ? 'checked' : ''?>> Desactive
              </label>
          </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 col-xs-12 pull-left">
          <div class="form-group">
            <label for="companyAddress">Address</label>
            <input type="text" class="form-control" id="companyAddress" name="address"  placeholder="Company address" value="<?= $company->address ?>">
          </div>
      </div>
      <div class="col-md-8 col-xs-12">
          <div class="form-group">
            <label for="companyAddress">Description</label>
            <textarea class="form-control" rows="5" id="comment" name="description" ><?= $company->description ?></textarea>          
          </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary pull-left">Save Changes</button>

  </form>
</div>
