<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="row">
		<div class="col-12">
			<div class="container-fluid">
				<center><h5>Administrasi - Master - Data Soal</h5></center>
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
              <h3 class="card-title">Kategori: <?php echo $kategori['id'] .' '. $kategori['nama']; ?><br>Tambah/ Update Soal </h3>
              <div class="card-tools">
					<a href="<?php echo $go['back']; ?>" type="button" class="btn btn-sm btn-danger">
						<i class="fa fa-caret-left" style="color: white"></i></a>
              </div>
            </div>		  
            <div class="card-body">
				<input type="hidden" class="form_data" id="id" value="<?php echo $model['id']; ?>">
				<input type="hidden" class="form_data" id="idkategori" value="<?php echo $kategori['id']; ?>">
				<!-- Form Input -->								
				<div class="form-group row">
					<label class="col-sm-3 text-right">No. Soal<sup style="color:red">*</sup></label>
					<div class="col-sm-1">
						<input type="text" class="form-control form_data" 
							placeholder="Nomor Soal" id="no_soal" 
							value="<?php echo $model['no_soal']; ?>">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 text-right">Pertanyaan Soal<sup style="color:red">*</sup></label>
					<div class="col-sm-9">
						<textarea class="form-control form_data"  id="ket_soal" rows="3"><?php echo $model['ket_soal']; ?></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 text-right">Jawaban A<sup style="color:red">*</sup></label>
					<div class="col-sm-9">
						<textarea class="form-control form_data"  id="jwb_a" rows="1"><?php echo $model['jwb_a']; ?></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 text-right">Jawaban B<sup style="color:red">*</sup></label>
					<div class="col-sm-9">
						<textarea class="form-control form_data"  id="jwb_b" rows="1"><?php echo $model['jwb_b']; ?></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 text-right">Jawaban C<sup style="color:red">*</sup></label>
					<div class="col-sm-9">
						<textarea class="form-control form_data"  id="jwb_c" rows="1"><?php echo $model['jwb_c']; ?></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 text-right">Kunci Jawaban<sup style="color:red">*</sup></label>
					<div class="col-sm-9">
						<select id="jwb_kunci">
							<option value="a">A</option>
							<option value="b">B</option>
							<option value="c">C</option>
						</select>
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
		var id      = $('#id').val();
		var idkat   = $('#idkategori').val();
		var nosoal  = $('#no_soal').val();		nosoal = parseInt(nosoal);
		var ketsoal = $('#ket_soal').val(); 
		var jwba    = $('#jwb_a').val(); 
		var jwbb    = $('#jwb_b').val(); 
		var jwbc    = $('#jwb_c').val(); 
		var kunci   = $('#jwb_kunci').val(); 
		
		if (nosoal<=0) {
			swal("Warning!", 'No. Soal Harus Diisi Integer', "warning"); 
			return false;
		} else if (ketsoal.trim()=='') {
			swal("Warning!", 'Pertanyaan Soal Harus Diisi', "warning"); 
			return false;
		} else if (jwba.trim()=='') {
			swal("Warning!", 'Jawaban A Harus Diisi', "warning"); 
			return false;
		} else if (ketsoal.trim()=='') {
			swal("Warning!", 'Jawaban B Harus Diisi', "warning"); 
			return false;
		} else if (ketsoal.trim()=='') {
			swal("Warning!", 'Jawaban C Harus Diisi', "warning"); 
			return false;
		} else {
			var data = new Object();
			data['id']		   = id;
			data['idkategori'] = idkat;
			data['no_soal']	   = nosoal;
			data['ket_soal']   = ketsoal;
			data['jwb_a']	   = jwba;
			data['jwb_b']	   = jwbb;
			data['jwb_c']	   = jwbc;
			data['jwb_kunci']	   = kunci;
			data = JSON.stringify(data);
			$.post( "<?php echo CController::createUrl('CheckInput'); ?>", {data:data, aksi:"edit"})
				.done(function( dCheck ) { 
				if (dCheck==1) {
					alert("No. Soal Sudah Ada");
//					swal("Warning!", "Nama Kategori Sudah Terdaftar", "warning");
				} else if (dCheck==2) {
					alert("Pertanyaan Soal Sudah Ada");
//					swal("Warning!", "Nama Kategori Sudah Terdaftar", "warning");
				} else { 
					$.post( "<?php echo CController::createUrl('SimpanData'); ?>", {data:data})
						.done(function( dMsg ) {
							
						alert(dMsg);
						window.location = "<?php echo $go['back']; ?>";

						//swal({
						//	html: true,
						//	title: 'Informasi',
						//	text: dMsg,
						//	type: 'info',									
						//	confirmButtonClass: "btn-info"
						//}, function(){
						//	window.location = "<?php echo $go['back']; ?>"; 
						//});
					});
				}	
			});			
		}
	}	
</script>