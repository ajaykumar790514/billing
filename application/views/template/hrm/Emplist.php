
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Employee List</h5>
                                            <!-- <p class="m-b-0">Lorem Ipsum is simply dummy text of the printing</p> -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="<?php echo base_url().'dashboard';?>"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Employee List</a>
                                            </li>
                                            <!-- <li class="breadcrumb-item"><a href="#!">Basic Tables</a>
                                            </li> -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                       
                                        <!-- Hover table card start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5></h5><a href="<?php echo base_url().'add-employee';?>" class="btn btn-primary btn-sm">Add Employee</a>
                                                <!-- <span>use class <code>table-hover</code> inside table element</span> -->
                                                <div class="card-header-right">
                                                    <ul class="list-unstyled card-option">
                                                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                                        <li><i class="fa fa-minus minimize-card"></i></li>
                                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                                        <li><i class="fa fa-trash close-card"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <?php
                                            if(!empty($this->session->flashdata('msg')))
                                            {
                                            echo "<div class='alert alert-success mb-2'>".$this->session->flashdata('msg')."</div>";
                                            }
                                            if(!empty($this->session->flashdata('deletemsg')))
                                            {
                                            echo "<div class='alert alert-danger mb-2'>".$this->session->flashdata('deletemsg')."</div>";
                                            }
                                            ?>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table id="example"  class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr. No.</th>
                                                                <th>Employee Name</th>
                                                                <th>Mobile No.</th>
                                                                <th>Email</th>
                                                                <th>Department</th>
                                                                <th>Address</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $i=1;
                                                        foreach($employees as $employee)
                                                        {
                                                            $department =   $this->admin_model->getRow('department',['is_deleted'=>'NOT_DELETED','id'=>$employee->department]);
                                                            $rs = $this->admin_model->getRow('emp_doc',['emp_id'=>$employee->id]);
                                                    ?>
                                                            <tr>
                                                                <th scope="row"><?=$i;?></th>
                                                                <td><?=$employee->emp_name;?></td>
                                                                <td><?=$employee->mobile;?></td>
                                                                <td><?=$employee->email;?></td>
                                                                <td><?=@$department->name;?></td>
                                                                <td><?=$employee->address;?></td>
                                                                <td><a href="<?php echo base_url().'edit-employee/'.$employee->id;?>" class="btn btn-primary btn-sm"><i class="ti-pencil-alt"></i></a>
                                                                    <a href="<?=base_url('delete-employee/'.$employee->id);?>" class="btn btn-danger btn-sm"><i class="ti-trash"></i></a>
                                                                    <a  href="<?=base_url('delete-employee/'.$employee->id);?>" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal<?=$i;?>"><i class="ti-save"></i></a>
                                                                </td>
                                                            </tr>
                                            <!-- Modal -->
                                            <div class="modal fade empdoc" id="exampleModal<?=$i;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog  modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <form class="form ajaxsubmit validate-form reload-tb" action="<?=base_url('submit-emp-doc')?>" method="POST" enctype="multipart/form-data">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add Document ( <?=$employee->emp_name;?> - <?=$employee->mobile;?> )</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                  <div class="row">
                                                    <input type="hidden" name="emp_id" value="<?=$employee->id;?>">
                                                    <div class="col-6 form-group">
                                                        <label for="">Bank Name:</label>
                                                        <input type="text" placeholder="Enter bank name" name="bank_name" class="form-control" value="<?=@$rs->bank_name;?>" required>
                                                    </div>
                                                    <div class="col-6 form-group">
                                                        <label for="">Account Number:</label>
                                                        <input type="number" placeholder="Enter account number" name="account_number" value="<?=@$rs->account_number;?>" class="form-control" required>
                                                    </div>
                                                    <div class="col-6 form-group">
                                                        <label for="">IFSC Code:</label>
                                                        <input type="text" placeholder="Enter IFSC code" name="ifsc" value="<?=@$rs->ifsc_code;?>" class="form-control" required>
                                                    </div>
                                                    <div class="col-6 form-group">
                                                        <label for="">Aadhaar Number:</label>
                                                        <input type="number" placeholder="Enter aadhaar number" name="aadhaar_no" value="<?=@$rs->aadhaar_no;?>" class="form-control" required>
                                                    </div>
                                                    <div class="col-6 form-group">
                                                        <label for="">Aadhaar Photo:</label>
                                                        <input type="file" name="doc" class="form-control" required>
                                                        <?php if(@$rs->aadhaar_pic !=''){?>
                                                        <img src="<?=IMGS_URL.@$rs->aadhaar_pic;?>" height="200px" width="100%" alt="">
                                                        <?php }?>
                                                    </div>
                                                    <div class="col-6 form-group">
                                                        <label for="">Passbook Photo:</label>
                                                        <input type="file" name="photo" class="form-control" required>
                                                        <?php if(@$rs->passbook !=''){?>
                                                        <img src="<?=IMGS_URL.@$rs->passbook;?>" height="200px" width="100%" alt="">
                                                        <?php }?>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save </button>
                                                </div>
                                                </form>
                                                </div>
                                            </div>
                                            </div>

                                                            <?php $i++;
                                                        } 
                                                    ?>  
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Hover table card end -->
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                            </div>
                            <!-- Main-body end -->

                            <div id="styleSelector">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
