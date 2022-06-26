<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="row">
		<div class="col-12">
			<div class="container-fluid">
				<center><h5>User - Test</h5></center>
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
        <section class="col-lg-7">
          <div class="card">
			<div class="card-header">
              <h3 class="card-title"><?php echo $data['idkategori'] .' '. $data['nama_kategori']; ?></h3>
              <div class="card-tools">
					<a href="<?php //echo $go['back']; ?>" type="button" class="btn btn-sm btn-danger">
						<i class="fa fa-times" style="color: white"></i></a>
              </div>
            </div>		  
            <div class="card-body">
				<input type="hidden" class="form_data" id="idjawab" value="<?php echo $data['idjawab']; ?>" >
				<input type="hidden" class="form_data" id="iduser" value="<?php echo $data['iduser']; ?>" >
				<input type="hidden" class="form_data" id="idkategori" value="<?php echo $data['idkategori']; ?>" >
				<input type="hidden" class="form_data" id="tgl_mulai" value="<?php echo $data['tgl_mulai']; ?>" >
				<input type="hidden" id="urutL" value="0">
				<style>
					table.dFix {width: 100%; font-size: 15px; white-space: nowrap;}
					th,td {padding-left: 5px; padding-right: 5px;}
					
					.alignR {text-align: right;}
					.alignC {text-align: center;}
					.alignL {text-align: left;}
					
					.wJwb1 {width: 10%; height:25px;}
					.wJwb2 {width: 2%; height:25px;}

					.wSoal {width: 5%;}

					.cbJ   {color: white; background: info;}
					.csJ   {color: white; background: gray;}
					
					.btnblue {background: blue;}
					.btnred {background: red;}
				</style>
				<div>
					<table id="TblData" class="dFix">
						<thead>
							<tr>
								<th class="wSoal"></th>
								<th class="wSoal"></th>
								<th></th>
							</tr>
						</thead>
						<tbody id="ListSoal">
						</tbody>
					</table>			
				</div>
            </div>
			<div class="card-footer">
				<font style='color: yellow'>Perhatian: Jawaban Tidak Dapat Dirubah</font>
				<div class="float-right" hidden>
					<button onclick="Simpan()" type="button" class="btn btn-sm btn-warning">
						<i class="fa fa-disk" style="color: white"> SIMPAN</i></button>
				</div>		  			
            </div>		  			
          </div>
          <!-- /.card -->
        </section>
        <section class="col-lg-5">
          <div class="card">
			<div class="card-header">
              <h3 class="card-title">Lembar Jawaban</h3>
              <div class="card-tools">
					<?php echo $data['nama_user']; ?>
              </div>
            </div>		  
            <div class="card-body">
              <div>
				<table id="TblData" class="dFix">
					<tbody id="ListJwb">
					<?php
						$no    = 0;
						$arrNo = $data['no']; 
						for($i=1; $i<=10; $i++) {
							$tmp = '<tr>';
							for($j=0; $j<12; $j++) {
								$no++;
								$cj = '<td class="wJwb1 alignC"></td>';
								if ($no<=count($data['soal'])) {
									$s = $no - 1;
									$cj = '<td class="wJwb1 alignC cbJ"><button id="btn'. $no .'" 
											onclick="Pilih('. $no .','. $s .')" type="button" class="btn btn-sm btnblue" style="color: white">'. $no .'</button></td>';
								}
								
								$tmp .= $cj;
							}
							$tmp .= '</tr>';
							
							echo $tmp;
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
	var arrSoal = <?php echo json_encode($data['soal']); ?>
	
	function Pilih(urut,idx) { 
		var urutL = $('#urutL').val(); 
		if (urutL>0 && urutL!=urut) {
			$("#btn"+ urutL ).removeClass('btnred');
			$("#btn"+ urutL ).addClass('btnblue');
		}
		
		$("#btn"+ urut ).removeClass('btnblue');
		$("#btn"+ urut ).addClass('btnred');
		$('#urutL').val(urut);   
		
		var soal  = arrSoal[idx]; 
		var infok = soal.jwb_a;
		if (soal.jwb_kunci=='B') { infok = soal.jwb_b;
		} else if (soal.jwb_kunci=='C') { infok = soal.jwb_c; }
		
		var jwba = "Jawab("+ urut +","+ idx +",'a','"+ soal.jwb_kunci +"','"+ infok +"')";
			jwba = '<button id="btna" '+
				   '	onclick="'+ jwba +'" type="button" class="btn btn-sm btnblue" '+
				   '	style="color: white">A</button>';
		var jwbb = "Jawab("+ urut +","+ idx +",'b','"+ soal.jwb_kunci +"','"+ infok +"')";
			jwbb = '<button id="btnb" '+
				   '	onclick="'+ jwbb +'" type="button" class="btn btn-sm btnblue" '+
				   '	style="color: white">B</button>';
		var jwbc = "Jawab("+ urut +","+ idx +",'c','"+ soal.jwb_kunci +"','"+ infok +"')";
			jwbc = '<button id="btnc" '+
				   '	onclick="'+ jwbc +'" type="button" class="btn btn-sm btnblue" '+
				   '	style="color: white">C</button>';
		
		var cHtml    = '<tr>';
			cHtml	+= '	<td class="alignR">' + urut + '.</td>';
			cHtml	+= '	<td colspan=2>'+ soal.ket_soal +'</td>';
			cHtml	+= '</tr>';
			cHtml   += '<tr><td style="height: 10px;"></td></tr>';
			cHtml   += '<tr>';
			cHtml	+= '	<td></td>';
			cHtml	+= '	<td class="alignR">'+ jwba +'</td>';
			cHtml	+= '	<td>'+ soal.jwb_a +'</td>';
			cHtml	+= '</tr>';
			cHtml   += '<tr>';
			cHtml	+= '	<td></td>';
			cHtml	+= '	<td class="alignR">'+ jwbb +'</td>';
			cHtml	+= '	<td>'+ soal.jwb_b +'</td>';
			cHtml	+= '</tr>';
			cHtml   += '<tr>';
			cHtml	+= '	<td></td>';
			cHtml	+= '	<td class="alignR">'+ jwbc +'</td>';
			cHtml	+= '	<td>'+ soal.jwb_c +'</td>';
			cHtml	+= '</tr>';

		$('#ListSoal').empty();
		$('#ListSoal').append(cHtml);
	}

	function Jawab(urut,idx,jwb,jwbk,infok) { 		
		$("#btn"+ urut).removeClass('btnblue');
		$("#btn"+ urut).addClass('btngrey');
		$("#btn"+ urut).disabled = true;;
		$('#urutL').val(0); 

		$("#btn"+ jwb).removeClass('btnblue');
		$("#btn"+ jwb).addClass('btnred');

		var soal   	   = arrSoal[idx];
		var idjwb 	   = $('#idjawab').val();
		var iduser     = $('#iduser').val();
		var idkategori = $('#idkategori').val();
		var tglm  	   = $('#tgl_mulai').val();
		
		var data = new Object();
		data['id']	       = soal.id;
		data['idjawab']    = idjwb;
		data['iduser']     = iduser;
		data['idkategori'] = idkategori;
		data['tgl_mulai']  = tglm;
		data['jwb']        = jwb;
		data['jwb_kunci']  = jwbk;
		data = JSON.stringify(data); 
		$.post( "<?php echo CController::createUrl('SimpanJawaban'); ?>", {data:data})
			.done(function( dMsg ) {
				
			if(jwb!=jwbk) {
				alert('Jawaban Yang Benar adalah '+ jwbk +'. '+ infok);
			}	
		});
	}
	
	function Simpan() {
		var id    = $('#id').val();
		var kode  = $('#iduser').val(); 
		var nama  = $('#nama').val(); 
		var aktif = $('#aktif').val(); 
		
		if (id!=0 && kode.trim()=='') {
			alert('UserID Kosong'); 
			return false;
		} else if (nama.trim()=='') {
			alert('Nama Harus Diisi'); 
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
			});
		}
	}	
</script>