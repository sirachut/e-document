<div class="table-responsive-lg table-hover container " style="margin-top: 70px">
    <table class="table table-borderless">

        <caption>List of document</caption>
        <div>
          <div class="row">
            <div class="col-sm-2">
                <h4>รายการเอกสาร</h4>
            </div>
            <div class="col-sm-10">
                <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" placeholder="ค้นหาเอกสาร" aria-label="Search">
                </form>
            </div>
            <div class="col-sm-1"></div>
          </div>
        </div>

        <hr>
      
        <thead>
          <tr >
            <th class="col-md-1 th-grid">#</th>
            <th class="col-md-1 th-grid">เลขที่ ศธ.</th>
            <th class="col-md-3 th-grid long" class="text-nowrap">เรื่อง</th>
            <th class="col-md-3 th-grid">เลขที่รับส่ง</th>
            <th class="col-md-4 th-grid"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="td-grid">doc_id</td>
            <td class="td-grid">doc_priority</td>
            <td class="td-grid sub_str">ขอส่งคำสั่งคณะเทคโนโลยีสารสนเทศและการสื่อสาร ที่ ๐๕๐/๒๕๖๐ เรื่องแต่งตั้งอาจารย์ที่ปรึกษานิสิต ประจำปี ๒๕๖๐ เพื่อบัน</td>
            <td class="td-grid">doc_name</td>
            <td><button type="button" class="btn btn-warning" style="color:white;">เพิ่มเติม</button></td>
          </tr>
        </tbody>
      </table>
  </div>

  <style>
      h3{
        font-weight: bold;
      }
      .th-grid {
        width: auto !important;
      }
      .long {
        width: 40% !important;
      }
      @media only screen and (max-width: 600px) {
        .long {
        width: auto !important;
        }
        .th-grid:nth-child(even) {
          display: none;
        }
        .td-grid:nth-child(even) {
          display: none;
        }
        .btn-warning {
          display: none;
        }
      }
  </style>

  <script>
    
  </script>

 