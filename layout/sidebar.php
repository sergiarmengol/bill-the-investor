
<div class="col-md-12">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="/" class="site_title">
                <img class="logo-lg" src='images/logo_bill.png' />
            </a>
        </div>
        <div class="clearfix"></div>

        <br/>

        <!-- sidebar menu -->
        <nav class="navbar navbar-inverse"> 
            <div class="container-fluid"> 
               <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9"> 
                   <ul class="nav navbar-nav"> 
                        <li class="<?= (empty($route) || $route == 'dashboard') ? 'active' : '' ?>">
                            <a href="/"><i class="fa fa-dashboard"></i> Dashboard</a>
                        </li>
                        
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Companies <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                              <li><a href="/companies">Companies</a></li>
                              <li class="divider"></li>
                              <li><a href="/new-company">New company</a></li>
                              
                            </ul>
                      </li>
                       
                   </ul> 
               </div> 
            </div> 
        </nav>
        <!-- /sidebar menu -->

    </div>
</div>