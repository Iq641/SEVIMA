<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="row">
		<div class="col-12">
			<div class="container-fluid">
				<center><h5>Administrasi - Master - Data User</h5></center>
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
        <section class="col-lg-6">
          <div class="card">
			<div class="card-header">
              <h3 class="card-title">Tambah/ Update User</h3>
              <div class="card-tools">
					<a href="<?php echo $go['back']; ?>" type="button" class="btn btn-sm btn-danger">
						<i class="fa fa-caret-left" style="color: white"></i></a>
              </div>
            </div>		  
            <div class="card-body">
				<input type="hidden" class="form_data" id="id" value="<?php echo $model['id']; ?>">
				<!-- Form Input -->								
				<div class="form-group row">
					<label class="col-sm-3 text-right">UserID<sup style="color:red">*</sup></label>
					<div class="col-sm-4">
						<input type="text" class="form-control form_data" 
							placeholder="Auto IDUser" id="iduser" 
							value="<?php echo $model['iduser']; ?>" disabled>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 text-right">Nama<sup style="color:red">*</sup></label>
					<div class="col-sm-9">
						<input type="text" class="form-control form_data" 
							placeholder="Nama Lengkap" id="nama" 
							value="<?php echo $model['nama']; ?>">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 text-right">Status<sup style="color:red">*</sup></label>
					<div class="col-sm-3">
						<select id="aktif" class="form-control" value="<?php echo $model['aktif']; ?>">
							<option value="0">Non Aktif</option>
							<option value="1">Aktif</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 text-right">Status<sup style="color:red">*</sup></label>
					<div class="col-sm-7">
						<select id="idkategori" class="form-control" value="<?php echo $model['idkategori']; ?>" style="width:100%">
						<?php 
							$arr  = explode(',',$model['idkategori']); 
							$deta = array();
							
							foreach($dft as $dt) {
								foreach($arr as $arr) { 
									if($arr==$dt['idkategori']) {
										$deta[]   = array('id'=>$dt['idkategori'], 
															  'nama'=>$dt['nama']); 
										break;
									}
								}
								
								echo '<option value="'. $dt['idkategori'] .'">'. $dt['nama'] .	
									 '</option>';
							}
						?>
						</select>
					</div>
					<div class="col-sm-2">
						<button onclick="Pilih()" type="button" class="btn btn-sm btn-warning">PILIH</button>
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
        <section class="col-lg-6">
          <div class="card">
            <div class="card-body">
				<style>
					table.dFix {width: 100%; font-size: 15px; white-space: nowrap;}
					th,td {padding-left: 5px; padding-right: 5px;}
					
					.alignR {text-align: right;}
					.alignC {text-align: center;}
					.alignL {text-align: left;}
					
					.thcss {text-align: center; color: white; background: gray;}
					.hvr   {color: white; background: red;}
				</style>
              <div>
				<table id="TblData" class="dFix table-bordered table-hover">
					<thead>
						<tr>
							<th class="thcss">No.</th>
							<th class="thcss">Kode</th>							
							<th class="thcss">Nama Kategori</th>							
							<th class="thcss">Aksi</th>							
						</tr>
					</thead>
					<tbody id="ListKat">
					<?php 
						$urut=1;
						foreach($deta as $deta) { 
							echo '<tr>
								  	<td class="alignR">'. $urut++ .'</td>
								  	<td>'. $deta['id'] .'</td>
								  	<td>'. $deta['nama'] .'</td>
								  	<td class="alignC"><a onclick="doDelData(this)" type="button" class="btn btn-xs btn-danger">
								  		<i class="fa fa-times" aria-hidden="true"></i></a></td>
								  </tr>';
						}
					?>
					</tbody>
				</table>			
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
	function Pilih() { 
		var idkat = $('#idkategori').val();	
		var urut  = 0;
		var ok    = true;
		$("#ListKat > tr").each(function () {
			urut  = $(this).find('td').eq(0).text();
			cekid = $(this).find('td').eq(1).text();
			if (cekid==idkat) {
				alert ('IDKategori Sudah Terdaftar');
				ok = false;
				return false;
			}
		});			
		if(!ok) { return; }
		urut = parseInt(urut) + 1;

		var sel      = document.getElementById("idkategori");
		var namakat  = sel.options[sel.selectedIndex].text;	
		var linkdel  = "delKat('"+ idkat +"')";
		
		var cHtml    = '<tr>';
			cHtml	+= '	<td class="alignR">' + urut + '</td>';
			cHtml	+= '	<td>'+ idkat +'</td>';
			cHtml	+= '	<td>'+ namakat +'</td>';
			cHtml	+= '	<td class="alignC"><a onclick="doDelData(this)" type="button" class="btn btn-xs btn-danger">';
			cHtml	+= '		<i class="fa fa-times" aria-hidden="true"></i></a></td>';
			cHtml	+= '</tr>';
		
		$('#ListKat').append(cHtml);
	}
	
	function doDelData(btn) {
		var row = btn.parentNode.parentNode;
		row.closest("tr").remove();
	}
	
	function Simpan() {
		var id    = $('#id').val();
		var kode  = $('#iduser').val(); 
		var nama  = $('#nama').val(); 
		var aktif = $('#aktif').val(); 
		
		if (id!=0 && kode.trim()=='') {
			swal("Warning!", 'UserID Kosong', "warning"); 
			return false;
		} else if (nama.trim()=='') {
			swal("Warning!", 'Nama Harus Diisi', "warning"); 
			return false;
		} else {
			var idkat = '';
			$("#ListKat > tr").each(function () {
				if (idkat!='') { idkat += ','; }
				idkat += $(this).find('td').eq(1).text();
			});			
						
			var data = new Object();
			data['id']	       = id;
			data['nama']       = nama;
			data['aktif']      = aktif;
			data['idkategori'] = idkat;
			data = JSON.stringify(data);
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
	}	
</script>