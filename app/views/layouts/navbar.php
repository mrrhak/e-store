<!-- Main Navigation -->

<nav class="navbar-expand-lg navbar">
    <div class="container-fluid header">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse container m-auto navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item" style=" font-size : 25px ; color:#0d47a1">
                    <a class="nav-link" href="#">E-STORE</a>
                </li>

            </ul>
            <form class="me-auto search-header">
                <input class="form-control me-2 input" type="search" placeholder="Search item" aria-label="Search">
                <button class="btn" type="submit">Search</button>
            </form>
            <ul class="mb-2 mb-lg-0" style="display: flex">
                <button class="btn">
                    <i class="fa fa-shopping-cart">
                        <span class="bage"> 0</spa>
                    </i>
                    Shoping Cart
                </button>
                <button class="btn">
                    <i class="fa fa-user" style="margin-right:8px"></i>
                    Login Or Create
                </button>
            </ul>
        </div>
    </div>
</nav>
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