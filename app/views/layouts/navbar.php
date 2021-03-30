<!-- Main Navigation -->
<header class="container-fluid" >


<nav class="navbar navbar-expand-lg navbar-light shadow-md">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php
      APPROOT
    ?>/e-store">
    <img  src="<?php echo URLROOT ?>/img/logo.png" style="height: 50px">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        
      </ul>
      <ul class="navbar-nav  mb-2 mb-lg-0">
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Cart</a>
      </li>
  
          <a class="nav-item my-2" aria-current="page" href="#">
          <i class="fas fa-user pull-right icon-chevron-right"></i>
          <span> Log In</span>
         
          </a>
     
      
      </ul>
    </div>
  </div>
</nav>
</header>
<!-- Main Navigation -->

<!--<header>
  <!--<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li>

          <li class="nav-item">
            <?php if(isLoggedIn()) : ?>
            <a class="nav-link" href="<?= URLROOT ?>/users/logout" tabindex="-1" aria-disabled="true">Log out</a>
            <?php  else : ?>
            <a class="nav-link" href="<?= URLROOT ?>/users/login" tabindex="-1" aria-disabled="true">Log in</a>
               <?php  endif; ?>
            
          </li>
          <li class="nav-item">
           
            <a class="nav-link" href="<?= URLROOT ?>/products" tabindex="-1" aria-disabled="true">Products</a>
            
            
          </li>
          
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
    
  
  </nav>-->
  
 
<!--</header>-->