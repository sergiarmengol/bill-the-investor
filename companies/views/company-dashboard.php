<div class="">
  <h3>Companies</h3>    
  <div class="row">
    
    <div class="col-md-12">
    <table class="table">
      <thead>
        <tr>
          <th width="30%">Company name</th>
          <th width="30%">Address</th>
          <th width="30%">Description</th>
          <th width="30%">State</th>
        </tr>
      </thead>
      <tbody>
        <? foreach ($companies as $key => $company) : ?>
          <tr>
            <td width="30%">
              <a href="/companies/edit-company?id=<?= $company->id ?>">
                <?= $company->name ? $company->name : ''?>          
              </a>
            </td>
            <td width="30%">
              <a href="/companies/edit-company?id=<?= $company->id ?>">
                <?= $company->address ? $company->address : ''?>          
              </a>
            </td>
            <td width="30%">
              <a href="/companies/edit-company?id=<?= $company->id ?>">
                <?= $company->description ? $company->description : ''?>          
              </a>
            </td>

            <td width="10%">
                  <? 
                  if($company->state == 0) {
                    $label="danger";
                    $state="Desactive";
                  } else if($company->state == 1) {
                    $label="success";
                    $state="Active";
                  }
                  ?>
                  <span class="label label-<?= $label ?>"><?= $state ?></span>
              </td>
          </tr>  
        <? endforeach; ?>
       
      </tbody>
    </table>
    </div>
  </div>
