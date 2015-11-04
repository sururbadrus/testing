<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Master Data</a>
        </li>
        <li>
            <a href="#">Jabatan</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-star-empty"></i> Jabatan</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
               
               
               <div class="table_">
                
                <div class="row_">
                    <div class="left_"><span>Nama Jabatan</span></div>
                    <div class="middle_">:</div>
                    <div class=""><input class="form-control" id="txtNama" type="text"/></div>
                </div>
                <div class="row_">
                    <div class="left_"><span>Status</span></div>
                    <div class="middle_">:</div>
                    <div class="right_"><input id="cbStatus" type="checkbox" class="txtinput" checked/> Aktif</div>
                </div>
            </div>

            <div class="table_">
                <div class="row_">
                    <div class="kolom_">
                        <input id="btTambah" type="button"  value="Tambah" class="btn btn-success"/>
                        <input id="btHapus" type="button"  value="Hapus" class="btn btn-danger"/>
                        <input id="btBatal" type="button"  value="Batal"  class="btn btn-info" />
                    </div>
                </div>
             </div>

            <div class="table_">
           	<div class="row_">
              <div class="kolom_">
                    <table id="grid_kuman"></table>
                           <div class="clear"> </div>
                           <div id="pageKuman" ></div> 
                </div>
            </div>
            </div>
			<script type="text/javascript"src="jabatan.js"></script>
               
               
               

               
               
               
            </div>
        </div>
    </div>
</div><!--/row-->
