<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #235555;">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
              aria-expanded="false" aria-label="Toggle navigation"></button>

          <div class="collapse navbar-collapse" id="collapsibleNavId">
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                  <li class="nav-item active">
                      <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#">Link</a>
                  </li>
                  
              </ul>
              <div class="form-inline my-2 my-lg-0">
                <span class="text-white pr-2">Wellcom <?php echo $_SESSION[ 'user_name' ] ?></span>
                <a name="" id="" class="btn  btn-outline-success" href="logout.php" role="button">Logout</a>
              </div>
          </div>
      </nav>
      
        