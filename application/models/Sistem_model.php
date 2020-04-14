<?php 

class Sistem_model extends CI_Model {


	public function getAllData()
	{
		$this->db->order_by('tp','asc');
		return $this->db->get('data');
	}

	// Pagination //
	public function getData($limit, $start, $i=null,$flag=null, $data=null, $tgl_awal=null, $tgl_akhir=null, $waktu_awal=null, $waktu_akhir=null )
	{	
		if($i) {
			$this->db->like('i', $i);	
		}

		if($data) {
			$this->db->like('data', $data);	
		}

		if($tgl_awal != "" && $tgl_akhir != ""){
			$this->db->where('tp >=',$tgl_awal);
			$this->db->where('tp <=',$tgl_akhir);
		} elseif($tgl_awal == "" && $tgl_akhir != ""){
			$this->db->where('tp <=',$tgl_akhir);
		}elseif ($tgl_awal != "" && $tgl_akhir == "") {
			$this->db->where('tp >=',$tgl_awal );
		}

		if($waktu_awal != "" && $waktu_akhir != ""){
			$this->db->where('ts >=',$waktu_awal);
			$this->db->where('ts <=',$waktu_akhir);
		} elseif($waktu_awal == "" && $waktu_akhir != ""){
			$this->db->where('ts <=',$waktu_akhir);
		}elseif ($waktu_awal != "" && $waktu_akhir == "") {
			$this->db->where('ts >=',$waktu_awal );
		}	
		
		if($flag == "on"){
			$checked = "checked";
			$checkedsatu = "unchecked";
			$checkednol = "unchecked";
		}else if ($flag == "1") {
			$checked = "unchecked";
			$checkednol = "unchecked";
			$checkedsatu = "checked";
		}else{
			$checkedsatu = "unchecked";
			$checked = "unchecked";
			$checkednol = "checked";
		}

		if(isset($flag)){

			if ($flag == "on") {
				$flag = '';
			}else{
				$flag = $this->db->like('f',$flag);
			}

		}

		$this->db->order_by('tp','asc');
		return $this->db->get('data',$limit,$start)->result_array(); 
	}

	public function countAllData($limit, $start)
	{
		$this->db->order_by('tp','asc');
		return $this->db->get('data',$limit,$start)->result_array(); 	}
		
	}
