<section>
    <div class="container"> 
        <?php $session = \Config\Services::session(); ?>
        <?php if(isset($session->success)): ?>
            <div class="alert alert-success mt-4 text-center">
                    <?= $session->getFlashdata('success') ?>
                    </div>
        <?php endif; ?>
    <div class="card mt-4 shadow-lg bg-white rounded">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6 offset-md-3 text-center">
                        <h4 class="text-info">Branch Details List</h4>
                    </div>
                    <div class="float-right ml-5">
                        <a class="nav-link btn btn-primary ml-auto" href="<?php echo base_url('branches/add_branch') ?>">Add Branch</a>
                    </div>
                </div>
                <div class="card-body">
                    <?php if(!empty($branches)):?>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th>Bank</th>
                                    <th>Bank Code</th>
                                    <th>Branch</th>
                                    <th>Branch Code</th>
                                    <th></th>
                                </tr>
                                    <?php if($branches){ ?>
                                        <?php foreach ($branches as $list) { ?>
                                            <tr>
                                                <td><?= esc($list['bank_name']) ?></td>
                                                <td><?= esc($list['bank_code']) ?></td>
                                                <td><?= esc($list['branch_name']) ?></td>
                                                <td><?= esc($list['branch_code']) ?></td>
                                                <td><a href="/branches/fetch_branch_data/<?= $list['branch_id']?>" class="btn btn-danger btn-sm" >Edit</a>
                                                    <a href="/branches/delete_branch_data/<?= $list['branch_id']?>" class="btn btn-dark btn-sm" >Delete</a></td>
                                            </tr>
                                        <?php }?>
                                    <?php } ?>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-danger text-center">
                            Branch data not found.
                        </div>
                    <?php endif;?>
                </div>
            </div>
    </div>
</section>
