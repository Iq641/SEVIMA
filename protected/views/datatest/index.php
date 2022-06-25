<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="row">
		<div class="col-12">
			<div class="container-fluid">
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
        <section class="col-lg-12">
          <div class="card">
			<div class="card-header">
              <h3 class="card-title">Master Kategori</h3>
              <div class="card-tools">
					<a href="<?php echo $go['home']; ?>" type="button" class="btn btn-sm btn-danger">
						<i class="fa fa-home" style="color: white"></i></a>
              </div>
            </div><!-- /.card-header -->		  
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
							<th class="thcss">Nama</th>							
							<th class="thcss">Jml Soal</th>							
							<th class="thcss">Aksi</th>							
						</tr>
					</thead>
					<tbody>
					<?php
						$no = 0;
						foreach($data as $data) {
							$no++;
							
							$linked  = Controller::createUrl('TestSoal',array('id'=>$data['id']));
							
							$test   = '<a href="'. $linked .'" type="button" class="btn btn-xs btn-warning">
										<i class="fa fa-play" aria-hidden="true"> Mulai Test</i></a>';
						
							echo '<tr>
									<td class="alignR">'. $no .'</td>
									<td class=" alignC">'. $data['idkategori'] .'</td>
									<td class="">'. $data['nama'] .'</td>
									<td class=" alignR">'. $data['jml_soal'] .'</td>
									<td class="alignC"><div>'. $test .'</div></td>
								  </tr>';
						}
					?>	
					</tbody>
				</table>
              </div>
            </div><!-- /.card-body -->
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
	//$(function() {
	//	$('#TblData').DataTable({
	//		responsive: true,
	//		"searching": true,
	//		"autowidth": true,
	//		"columnDefs": [
	//			{"width": "15%", "targets": 2 }
	//		],
	//		orderCellsTop: true,
	//	});
	//});

</script>