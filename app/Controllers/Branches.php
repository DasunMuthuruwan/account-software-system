<?php

namespace App\Controllers;
use App\Models\BankModel;
use App\Models\BranchModel;
class Branches extends BaseController
{
	public function index()
	{

        $branch = new BankModel();
        
        $details['branches'] = $branch->details();

		echo view('partials/header',$details);
        echo view('branch/list_branch');
        echo view('partials/footer');
	}
    
    public function add_branch(){
        $model = new BankModel();
        $data['banks'] = $model->getBankDetails();

        echo view('partials/header',$data);
        echo view('branch/add_branch');
        echo view('partials/footer');
    }

    public function save_branch(){

        helper(['form','url']);

        $error = $this->validate([
            'branch_name' => 'required',
            'branch_code' => 'required|numeric',
            'banks_id' => 'required'
        ]);

        $model = new BankModel();
        $data['banks'] = $model->getBankDetails();

        if(!$error){
            echo view('partials/header',$data);
            echo view('branch/add_branch');
            echo view('partials/footer');
        }
        else{
            $branch = new BranchModel();

            $branch->save([
                'branch_name' => $this->request->getVar('branch_name'),
                'branch_code' => $this->request->getVar('branch_code'),
                'bank_id' => $this->request->getVar('banks_id')
            ]);

            $session = \Config\Services::session();

            $session->setFlashdata('success','Branch Data Added Successfully');

            return redirect()->to('/')->with('data',$data);
        }

    }

    public function fetch_branch_data($id=null){

        $branch_data = new BranchModel();
       
        $branch['branch'] = $branch_data->where('branch_id',$id)->first();
        $bank_data = new BankModel();
        
        $data['banks'] = $bank_data->getBankDetails();
    
        echo view('partials/header',$data);
        echo view('branch/edit_branch',$branch);
        echo view('partials/footer');

    }

    public function update_branch(){

        helper(['form','url']);
        
        $error = $this->validate([
            'branch_name' => 'required',
            'branch_code' => 'required|numeric',
            'banks_id' => 'required'
        ]);

        $model = new BankModel();
        $data['banks'] = $model->getBankDetails();
        $id = $this->request->getVar('id');
        $branch_data = new BranchModel();
        $branch['branch'] = $branch_data->where('branch_id',$id)->first();

        if(!$error){
            echo view('partials/header',$data);
            echo view('branch/edit_branch',$branch);
            echo view('partials/footer');
        }
        else{
            
            $update_branch = new BranchModel();
            
            $update = [
                'branch_name'=>$this->request->getVar('branch_name'),
                'branch_code'=>$this->request->getVar('branch_code'),
                'bank_id'=>$this->request->getVar('banks_id')
            ];
            

            $update_branch->update($id,$update);
        
            $session = \Config\Services::session();

            $session->setFlashdata('success','Branch data upadated successfully');

            return redirect()->to('/')->with('data',$data);
        }

    }
    public function delete_branch_data($id=null){

            $branch = new BranchModel();
            $branch->delete_branch($id);

            $session = \Config\Services::session();
            $session->setFlashdata('success','Branch data deleted successfully');

            return redirect()->to('/');

    }
}
