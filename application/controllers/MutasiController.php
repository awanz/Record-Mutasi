<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MutasiController extends CI_Controller {

	public function index()
	{       
        // data Session
		$userdata = $this->session->userdata('users');

		// data Master Bank
		$dataMutasi = $this->Mutasi->getAllMutasi()->result();

		if(isset($userdata)){
			$data['userdata'] = $userdata;
			$data['breadcrumb'] = "Record Mutasi";
			$data['dataMutasi'] = $dataMutasi;
			$data['bank_name'] 	= 'ALL';
			$data['start_date'] = NULL;
			$data['end_date'] 	= NULL;
			return view('mutasi.index', $data);
        }else{
			redirect('auth/login','refresh');
		}
    }
    
	public function detail($id)
	{       
        // data Session
		$userdata = $this->session->userdata('users');

		// data Master Bank
		$dataMutasi = $this->Mutasi->getMutasiById($id)->row_array();
		// print_r($dataMutasi);die();
		if(isset($userdata)){
			$data['userdata'] = $userdata;
			$data['breadcrumb'] = "Record Mutasi";
			$data['dataMutasi'] = $dataMutasi;
			return view('mutasi.detail', $data);
        }else{
			redirect('auth/login','refresh');
		}
	}
	
	public function run()
	{  
		$bank_aktif =  $this->Bank->getMasterBankStatusAktif()->result(); 
		$hitungData = 0;
		if(!empty($bank_aktif)) {
			foreach ($bank_aktif as $bank) {
				$url = $bank->scrape_url;
				$url = str_replace("{bank_name}",$bank->bank_name, $url);
				$url = str_replace("{account_id}",$bank->account_id, $url);
				$url = str_replace("{username}",$bank->username, $url);
				$url = str_replace("{password}",$bank->password, $url);
				$url = str_replace("{day_interval}",$bank->mutasi_interval, $url);
				
				// get data json
				$get_url = file_get_contents($url);
				$data = json_decode($get_url);

				// update last scrape + status
				$last_scrape = $this->Bank->updateScrapeBank($bank->master_bank_id, $data->valid);
				
				// simpan di database
				foreach ($data->data as $mutasi) {
					$arrayTemp = [];
					$arrayTemp = $mutasi;
					if($bank->bank_name == "BCA"){
						if($arrayTemp->waktu == 'PEND'){
							$arrayTemp->waktu = date("Y-m-d");
						}else{
							$datez = $arrayTemp->waktu;
							$tgl = substr($datez, 0, 2) ;
							$bln = substr($datez, 3, 2) ;
							$bln_skrg = date("m");
							$thn = date("Y") ;

							if($bln > $bln_skrg){
								$thn = $thn - 1;
							}

							$time = strtotime($bln.'/'.$tgl.'/'.$thn);
							$newformat = date('Y-m-d',$time);
							$arrayTemp->waktu = $newformat;
						}
					}else{
						$datez = $arrayTemp->waktu;
						$tgl = substr($datez, 0, 2) ;
						$bln = substr($datez, 3, 2) ;
						$thn = substr($datez, 6, 4) ;
						$time = strtotime($bln.'/'.$tgl.'/'.$thn);
						$newformat = date('Y-m-d',$time);
						$arrayTemp->waktu = $newformat;
					}
					
					$arrayTemp->bank_name = $bank->bank_name;
					$arrayTemp->account_id = $bank->account_id;
					$cekDuplikatData = $this->Mutasi->cekDuplikatData(json_decode(json_encode($arrayTemp), true));
					
					if(empty($cekDuplikatData)){
						$addMutasi = $this->Mutasi->addMutasi($arrayTemp);
						$hitungData++;
					}
				}
			}
			echo "Run Selesai, ";
			echo $hitungData;
			echo " Data tersimpan.";
		}else{
			echo "Tidak ada bank yang aktif";
		}
		
	}

	public function fillter()
	{       
        // data Session
		$userdata = $this->session->userdata('users');

		$bank_name = $_GET['bank_name'];
		$start_date = $_GET['start_date'];
		$end_date = $_GET['end_date'];
		
		if($start_date != ''){
			$start_date = strtotime($start_date);
			$start_date = date('Y-m-d',$start_date);

			$end_date = strtotime($end_date);
			$end_date = date('Y-m-d',$end_date);
		}

		$dataMutasi = $this->Mutasi->getOlahData($bank_name, $start_date, $end_date)->result();
		
		if(isset($userdata)){
			$data['userdata'] 	= $userdata;
			$data['breadcrumb'] = "Record Mutasi";
			$data['dataMutasi'] = $dataMutasi;
			$data['bank_name'] 	= $_GET['bank_name'];
			$data['start_date'] = $_GET['start_date'];
			$data['end_date'] 	= $_GET['end_date'];
			return view('mutasi.index', $data);
        }else{
			redirect('auth/login','refresh');
		}
	}
}