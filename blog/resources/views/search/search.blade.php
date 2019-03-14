    <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary">ค้นหาข้อมูล</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample" style="">
                  <div class="card-body">
            <form autocomplete="off" id="form_search" onsubmit="return false">
            <table width="100%" border="0"  class="table_top">
                <tr>
                    <td width="15%" class="caption" > <div class="float-right">คณะ : </div></td>
                    <td width="35%"><div class="col-md-6 float-left"> {{form_select_faculty()}}  </div> </td>

                    <td width="15%" class="caption"><div class="float-right">เลขที่ ศธ. :</div> </td>
                    <td width="35%" ><div class="col-md-6 float-left"> <input id="DOCUMENT_ST_NUMBER" type="text" class="form-control" name="DOCUMENT_ST_NUMBER">  </div>  </td>
                </tr>

                      <tr>
                    <td width="15%" class="caption" > <div class="float-right">{{ Lang::get('master.DOCUMENT_NOTATION.LABEL') }} :</div></td>
                    <td width="35%"><div class="col-md-6 float-left"> {{form_select_document_notation()}}  </div> </td>

                    <td width="15%" class="caption"><div class="float-right">เรื่อง :</div> </td>
                    <td width="35%" ><div class="col-md-6 float-left"> <input id="DOCUMENT_NAME" type="text" class="form-control" name="DOCUMENT_NAME">  </div>  </td>
                </tr>
                
                          <tr>
                    <td width="15%" class="caption" > <div class="float-right">{{ Lang::get('master.DOCUMENT_TO.LABEL') }} : </div></td>
                    <td width="35%"><div class="col-md-6 float-left"> {{form_select_document_to()}}  </div> </td>

                    <td width="15%" class="caption"><div class="float-right">control code  :</div> </td>
                    <td width="35%" ><div class="col-md-6 float-left"> <input id="DOCUMENT_NUMBER" type="text" class="form-control"  name="DOCUMENT_NUMBER">  </div>  </td>
                </tr>


                <tr>
                    
                    
                    <td   align="center" colspan="4" height="40" >
                        <div class="col-md-6"></div>
                        <button type="submit" class="btn btn-primary btn-sm" id="btn_search"><span class="glyphicon glyphicon-search"></span> <strong>ค้นหา</strong></button>
                        <button type="reset" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-remove"></span> <strong>ยกเลิก</strong></button>
                   
                    </td>
                </tr>
            </table>
        </form>
                  </div>
                </div>
              </div>