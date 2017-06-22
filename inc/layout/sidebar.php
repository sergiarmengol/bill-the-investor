<br>
<nav class="navbar-inverse">
  <div class="">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Bill the investor</a>
    </div>

        <!-- sidebar menu -->
   <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
          <li class="<?= ($app->url[0] == "/" || $app->url[0] == 'dashboard') ? 'active' : '' ?>">
              <a href="/"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          
          <li class="dropdown <?= ($app->url[0] == 'companies') ? 'active' : '' ?>">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Companies <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="/companies/">Companies</a></li>
              <li class="divider"></li>
              <li><a href="/companies/new-company">New company</a></li>
              
            </ul>
          </li>
          <li class="<?= ($app->url[0] == 'exchange-market') ? 'active' : '' ?>">
              <a href="/exchange-market/"><i class="fa fa-dashboard"></i> Exchange Markets</a>
          </li>
          <li class="<?= ($app->url[0] == 'stocks') ? 'active' : '' ?>">
              <a href="/stocks/"><i class="fa fa-dashboard"></i>Stocks</a>
          </li>
         
     </ul> 
  </div> 

        <!-- /sidebar menu -->

 </div><!-- /.container-fluid -->
</nav>