<section>

    <div class="container">
        <?php $validation = \Config\Services::validation(); ?>
        <div class="card shadow-lg bg-white rounded mt-4">
            <div class="card-header">
                <div class="col-md-6 offset-md-3 text-center">
                    <h4 class="text-info">Add Branch Data</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="col-md-8 offset-md-2">
                    <form action="<?php echo base_url('/branches/save_branch')?>" method="post">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label for="bank_name" class="font-weight-bold">Choose a Bank*</label>
                                <select class="form-control form-control-sm" name="banks_id" >
                                    <option value="">Bank Name</option>
                                    <?php foreach ($banks as $bank): ?> 
                                        <option value="<?= $bank['bank_id']?>"><?= $bank['bank_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php
                                    if($validation->getError('banks_id')){
                                        echo '<div class="alert alert-danger mt-2">'
                                            .$validation->getError('banks_id'). 
                                            '</div>';
                                    }
                                ?>
                        </div>

                        <div class="form-group">
                            <label for="bank" class="font-weight-bold">Branch Name*</label>
                            <input type="text" class="form-control form-control-sm" name="branch_name" placeholder="Enter Bank Branch Name">
                            <?php 
                                if($validation->getError('branch_name')){
                                    echo '<div class="alert alert-danger mt-2">'
                                           .$validation->getError('branch_name'). 
                                          '</div>';
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="branch" class="font-weight-bold">Branch Code*</label>
                            <input type="text" class="form-control form-control-sm" name="branch_code" placeholder="Enter branch code">
                            <?php
                                if($validation->getError('branch_code')){
                                    echo '<div class="alert alert-danger mt-2">'
                                           .$validation->getError('branch_code'). 
                                          '</div>';
                                }
                            ?>
                        
                        </div>
                        <div class="form-group" style="float:right;">
                            <button type="submit" class="btn btn-primary">Save Branch</button>
                            <a href="<?php echo base_url('/') ?>" class="btn btn-danger">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    
    </div>

</section>