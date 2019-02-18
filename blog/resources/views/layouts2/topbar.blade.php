 <?php
$userdata = Session::get('userdata');
//dd($userdata);
      ?>
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>



          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{$userdata['username']}}</span>
                <img class="img-profile rounded-circle" src="{{url('/images/personlogin.png')}}">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              
                <a class="dropdown-item" href="<?= url('').'/logout'; ?>" >
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
  <script src="{{URL('')}}/bootstrap-sb-admin-2/js/sb-admin-2.js"></script>
    <script>
    $("#desktopToggle").on('click', function(e) {
      e.preventDefault();
      $(".iframe-preview").removeClass("iframe-preview-mobile");
    });
    $("#mobileToggle").on('click', function(e) {
      e.preventDefault();
      $(".iframe-preview").addClass("iframe-preview-mobile");
    });
  </script>
        <!-- End of Topbar -->