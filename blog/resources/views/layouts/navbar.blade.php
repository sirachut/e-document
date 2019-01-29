<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-custom" >
    <a class="navbar-icon" href="{{ URL('') }}"><img src="{{url('/images/UPLogo.png')}}" alt="" style="width: auto ; height: 35px;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ URL('/') }}">ระบบสารบัญเอกสาร <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ URL('/document') }}"><i class="fas fa-align-left"></i> &nbsp; ดูรายการเอกสาร</a>
        </li>  <li class="nav-item">
          <a class="nav-link" href="{{ URL('/barcode') }}"><i class="fas fa-align-left"></i> &nbsp; Barcode</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-address-card"></i> &nbsp; เกี่ยวกับเรา
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#"><img src="{{url('/images/morpor.png')}}" style="width: 30px ; height: 15px;"> &nbsp; ติดต่อกองบริการการศึกษา</a>
            <a class="dropdown-item" href="#"> &nbsp;<i class="fas fa-question-circle"></i> &nbsp;&nbsp; คำถามที่พบเจอบ่อย ๆ</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">โครงสร้างหน่วยงาน</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><i class="fas fa-tools"></i> &nbsp; ติดต่อ admin</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
