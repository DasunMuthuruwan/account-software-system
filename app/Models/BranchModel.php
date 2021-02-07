<?php namespace App\Models;

use CodeIgniter\Model;

class BranchModel extends Model{

    protected $table = 'tbl_branches';
    protected $primaryKey = 'branch_id';
    protected $allowedFields = ['branch_name','branch_code','bank_id'];

    public function delete_branch($id){
        return $this->db->table('tbl_branches')->where('branch_id',$id)->delete();
    }

}