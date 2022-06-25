<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="row">
		<div class="col-12">
			<div class="container-fluid">
				<center><h5>Administrasi - Master - Data Kategori</h5></center>
			</div>
        </div>
      </div>
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-8" style="margin: auto;">
          <div class="card">
			<div class="card-header">
              <h3 class="card-title">Tambah/ Update Kategori</h3>
              <div class="card-tools">
					<a href="<?php echo $go['back']; ?>" type="button" class="btn btn-sm btn-danger">
						<i class="fa fa-caret-left" style="color: white"></i></a>
              </div>
            </div>		  
            <div class="card-body">
				<input type="hidden" class="form_data" id="id" value="<?php echo $model['id']; ?>">
				<!-- Form Input -->								
				<div class="form-group row">
					<label class="col-sm-3 text-right">Kode<sup style="color:red">*</sup></label>
					<div class="col-sm-4">
						<input type="text" class="form-control form_data" 
							placeholder="Auto Kode" id="idkategori" 
							value="<?php echo $model['idkategori']; ?>" disabled>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 text-right">Nama<sup style="color:red">*</sup></label>
					<div class="col-sm-9">
						<input type="text" class="form-control form_data" 
							placeholder="Nama Kategori" id="nama" 
							value="<?php echo $model['nama']; ?>">
					</div>
				</div>
				<!-- END Form Input -->			
            </div>
			<div class="card-footer">
				<div class="float-right">
					<button onclick="Simpan()" type="button" class="btn btn-sm btn-warning">
						<i class="fa fa-disk" style="color: white"> SIMPAN</i></button>
				</div>		  			
            </div>		  			
          </div>
          <!-- /.card -->
        </section>
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
	function Simpan() {
		var id   = $('#id').val();
		var kode = $('#idkategori').val();
		var nama = $('#nama').val();
		
		if (id!=0 && kode.trim()=='') {
			swal("Warning!", 'Kode Kosong', "warning"); 
			return false;
		} else if (nama.trim()=='') {
			swal("Warning!", 'Nama Harus Diisi', "warning"); 
			return false;
		} else {
			var data = new Object();
			data['id']		   = id;
			data['idkategori'] = kode;
			data['nama']	   = nama;
			data = JSON.stringify;
			$.post( "<?php echo CController::createUrl('CheckInput'); ?>", {data:data, aksi:"edit"})
				.done(function( dCheck ) { 
				if (dCheck==1) {
					swal("Warning!", "Nama Kategori Sudah Terdaftar", "warning");
				} else { 
					$.post( "<?php echo CController::createUrl('SimpanData'); ?>", {data:data})
						.done(function( dMsg ) {
					
						swal({
							html: true,
							title: 'Informasi',
							text: dMsg,
							type: 'info',									
							confirmButtonClass: "btn-info"
						}, function(){
							window.location = "<?php echo $go['back']; ?>"; 
						});
					});
				}	
			});			
		}
	}
</script>