<div class="container">		
	<?php 

		if(isset($tgl_awal) && ($tgl_akhir) ){
			$waktu_awal = "";
		} else {
			$waktu_awal;
			}
		if(isset($tgl_awal) && ($tgl_akhir) ){
			$waktu_akhir = "";
		} else {
			$waktu_akhir;
		}

		if(isset($tgl_akhir) && ($tgl_awal) ){
			$waktu_awal = "";
		} else {
			$waktu_awal;
		}

		if(isset($tgl_akhir) && ($tgl_awal) ){
			$waktu_akhir = "";
		} else {
			$waktu_akhir;
		}

	 ?>
	<form action="<?= base_url('Sistem/dashboard') ?>" method="GET">
		<div class="form-row">
	       	<div class="col-sm-3">
	   		  	<div class="form-group">	
			      	<label><b>Serial Number</b></label><br>
			        <input type="text" autocomplete="off" name="i" value="<?= $i ?>" class="form-control">
		      	</div>
	       </div>
			<div class="col-sm-6">
	   		  	<div class="form-group">	
			      	<label><b>Data GET</b></label><br>
			        <input type="text" autocomplete="off" value="<?= $get  ?>" name="data" class="form-control">	
		      	</div>
	   		</div>

	   		<?php
	   			

	   			$flag = $this->input->get('f');
		   		if($flag == "0"){
					$checked = "unchecked";
					$checkedsatu = "unchecked";
					$checkednol = "checked";
				}else if ($flag == "1") {
					$checked = "unchecked";
					$checkednol = "unchecked";
					$checkedsatu = "checked";
				}else{
					$checked = "checked";
					$checkedsatu = "unchecked";
					$checkednol = "unchecked";
				}

	   		?>

	   		<div class="col-sm-2 ml-1">
	   			<div class="form-group">
			      	<label><b>Data Flag</b></label><br>
	   				<div class="form-check form-check-inline">
					  <input class="form-check-input checkmark" type="radio"  name="f" value="0" <?= $checkednol ?> > 
					  <label class="form-check-label" >0</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input checkmark" type="radio" name="f" value="1" <?= $checkedsatu ?>  >
					  <label class="form-check-label"   >1</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input checkmark" type="radio" name="f" value="" onclick="submit();" <?= $checked ?> >
					  <label class="form-check-label" >All</label>
					</div>
	   			</div>
	   		</div>

	   		<div class="col-sm-3">
	   		  	<div class="form-group">	
			      	<label>Tanggal Awal <b>(TimeStamp)</b></label><br>
		      		<div class="form-group">
						<div class="input-group flex-nowrap ">
							<div class="input-group-prepend ">
								<span class="input-group-text" id="addon-wrapping"><i class="ti ti-calendar"></i></span>
							</div>
			        		<input type="text" autocomplete="off" value="<?= $tgl_awal ?>" class="form-control " name="tgl_awal">	
						</div>
					</div>
		      	</div>
		    </div>
		    <div class="col-sm-3"> 	
		     	<div class="form-group">
		     		<label> Tanggal Akhir <b>(TimeStamp)</b></label><br>
		      		<div class="form-group">
						<div class="input-group flex-nowrap">
							<div class="input-group-prepend">
								<span class="input-group-text" id="addon-wrapping"><i class="ti ti-calendar"></i></span>
							</div>
							<input type="text" class="form-control" autocomplete="off" value="<?= $tgl_akhir ?>" name="tgl_akhir" >
						</div>
					</div>
		      	</div>
	       </div>

	   		<div class="col-sm-3">
	   		  	<div class="form-group">	
			      	<label>Waktu Awal <b>(Epochtime)</b></label><br>
		      		<div class="form-group">
						<div class="input-group flex-nowrap">
							<div class="input-group-prepend">
								<span class="input-group-text" id="addon-wrapping"><i class="ti ti-time"></i></span>
							</div>
			        		<input type="number" maxlength="13" autocomplete="off" value="<?= $waktu_awal ?>" class="form-control" name="waktu_awal" >	
						</div>
					</div>
		      	</div>
		    </div>
		    <div class="col-sm-3"> 	
		     	<div class="form-group">
		     		<label> Waktu Akhir <b>(Epoctime)</b></label><br>
		      		<div class="form-group">
						<div class="input-group flex-nowrap">
							<div class="input-group-prepend">
								<span class="input-group-text" id="addon-wrapping"><i class="ti ti-time"></i></span>
							</div>
		        			<input type="number" autocomplete="off" value="<?= $waktu_akhir ?>" class="form-control" name="waktu_akhir" >
						</div>
					</div>
		      	</div>
	       </div>



	   		<div class="col-sm-11">
		      	<div class="form-group">
		          	<input class="btn btn-primary mr-2 rounded-0 w-25 mb-0" value="Search" type="submit" name="submit">                
				</div>
		    </div>

	  	</div>
	</form>		

	<span class="float-right mt-3"><b>Jumlah Data :</b> <?= $total_rows ?></span>
	<table class="table" >
	  	<thead>
	      	<tr>
				<th scope="col" class="text-center">No</th>
				<th scope="col">Serial Number </th>
				<th scope="col">Flag</th>
				<th scope="col">Epochtime</th>
				<th scope="col">Timestamp</th>
				<th scope="col">Server Time</th>
				<th scope="col">Data</th>
			</tr>
	  	</thead>
	  	<tbody class="text-sm-left">
	  	<?php if (empty($data)) : ?>
	  		<tr>
	  			<td colspan="12">
	  				<div class="alert alert-danger mb-0" role="alert">
	  					<center>
	  						<b>Data Not Found :(</b>
	  					</center>
	  				</div>
	  			</td>
	  		</tr>
	  	<?php endif; ?>
		
		<?php 
			$no = 1;
		  	foreach($data as $data){ 
		?>
			<tr>
			  	<td class="text-center"><?= ++$start ?></td>
			  	<td><?= $data['i']; ?></td>
			  	<td><?= $data['f']; ?></td>
			  	<td><?= $data['ts']; ?></td>
			  	<td><?= $data['tp']; ?></td>
			  	<td><?= $data['server_time']; ?></td>
			  	<td class="align-middle">
			  		<textarea class="form-control bg-white" readonly><?= $data['data']; ?></textarea>
			  	</td>
			 </tr>

		<?php }  ?>

	 	</tbody>
	</table>

	<?= $this->pagination->create_links(); ?>

</div>