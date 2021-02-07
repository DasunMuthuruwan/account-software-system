<?php namespace App\Models;

use CodeIgniter\Model;

class BankModel extends Model{

    protected $table = 'tbl_banks';
    protected $primaryKey='bank_id';
    protected $allowedFields=['bank_name','bank_code'];

    public function getBankDetails(){
    
        return $this->OrderBy('bank_id','DESC')->findAll();
    }

    public function details(){

        return $this->db->table('tbl_banks')
                ->join('tbl_branches','tbl_branches.bank_id = tbl_banks.bank_id')
                ->orderBy('branch_id','DESC')->get()->getResultArray();
    }

}