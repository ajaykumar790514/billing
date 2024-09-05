
<div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Suppliers List</h5>
                                            <!-- <p class="m-b-0">Lorem Ipsum is simply dummy text of the printing</p> -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="<?php echo base_url().'dashboard';?>"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Accounts</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Suppliers List</a>
                                            </li>
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
                                                <h5></h5><a href="<?=base_url('contacts-dashboard');?>" class="btn btn-danger text-light btn-sm">< Back</a>
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
                                            if(!empty($this->session->flashdata('cusmsg')))
                                            {
                                            echo "<div class='alert alert-danger mb-2'>".$this->session->flashdata('cusmsg')."</div>";
                                            }
                                            ?>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table id="example"  class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr. No.</th>
                                                                <th>Name</th>
                                                                <th>Mobile</th>
                                                                <th>Email</th>
                                                                <th>Address</th>
                                                                <th>Opening Balance</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $i=1;
                                                        foreach($suppliers as $sup)
                                                        {    
                                                        ?>
                                                            <tr>
                                                                <th scope="row"><?=$i;?></th>
                                                                <td><?=$sup->name;?></td>
                                                                <td><?=$sup->permanant_number;?></td>
                                                                <td><?=$sup->email;?></td>
                                                                <td><?=$sup->address;?>,<?=$sup->state;?>,<?=$sup->state;?>,<?=$sup->city;?>,<?=$sup->pincode;?>,<?=$sup->country;?></td>
                                                                <td><?=$sup->opening_balance;?></td>
                                                                <td>
                                                                   <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#details<?=$i;?>"><i class="ti-eye"></i></a>
                                                                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?=$i;?>"><i class="ti-pencil-alt"></i></a>
                                                                    <a href="<?=base_url('supplier/delete/'.$sup->id);?>" class="btn btn-danger btn-sm"><i class="ti-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                <!-- Details -->
                                            <div class="modal fade empdoc" id="details<?=$i;?>" tabindex="-1" aria-labelledby="details" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="details">View Details ( <?=$sup->name;?> )</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                     <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">Supplier Name</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control" name="sup_name" value="<?=$sup->name;?>" readonly>
                                                                        </div>
                                                                    </div>   
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">Opening Balance</label>
                                                                        <div class="col-sm-9">
                                                                        <input type="number" class="form-control" name="opening_bln" value="<?=$sup->opening_balance;?>" readonly>
                                                                        </div>
                                                                    </div>   
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">Mobile No.</label>
                                                                        <div class="col-sm-9">
                                                                        <input type="number" class="form-control" name="mobile" value="<?=$sup->permanant_number;?>" readonly>
                                                                        </div>
                                                                    </div>    
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">Email</label>
                                                                        <div class="col-sm-9">
                                                                        <input type="email" class="form-control" name="email" value="<?=$sup->email;?>" readonly>
                                                                        </div>
                                                                    </div>   
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">Phone No.</label>
                                                                        <div class="col-sm-9">
                                                                        <input type="number" class="form-control" name="phone" value="<?=$sup->alternate_number;?>" readonly>
                                                                        </div>
                                                                    </div>    
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">GST No.</label>
                                                                        <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="gst" value="<?=$sup->gst_no;?>" readonly>
                                                                        </div>
                                                                    </div>   
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">TAX No.</label>
                                                                        <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="tax" value="<?=$sup->tax_no;?>" readonly>
                                                                        </div>
                                                                    </div>    
                                                                </div>
                                                                
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">Country</label>
                                                                        <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="country" value="<?=$sup->country;?>" readonly>
                                                                        </div>
                                                                    </div>   
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">State</label>
                                                                        <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="state" value="<?=$sup->state;?>" readonly>
                                                                        </div>
                                                                    </div>    
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">City</label>
                                                                        <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="city" value="<?=$sup->city;?>" readonly>
                                                                        </div>
                                                                    </div>   
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">Pincode</label>
                                                                        <div class="col-sm-9">
                                                                        <input type="number" class="form-control" name="pincode" value="<?=$sup->pincode;?>" readonly>
                                                                        </div>
                                                                    </div>    
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">Address</label>
                                                                        <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="address" value="<?=$sup->address;?>" readonly>
                                                                        </div>
                                                                    </div>   
                                                                </div>
                                                            </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>

                                                        
                                                            <!-- / End Details -->



                                                                <!-- Modal -->
                                            <div class="modal fade empdoc" id="exampleModal<?=$i;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog  modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <form class="form reload-page ajaxsubmit validate-form reload-tb" action="<?=base_url('supplier/save/'.$sup->id)?>" method="POST" enctype="multipart/form-data">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Supplier ( <?=$sup->name;?> )</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                 <div class="row">
                                                    <div class="col-6 form-group">
                                                            <label for="">Supplier Name <span class="text-danger">*</span></label>
                                                            <input type="text" name="sup_name" class="form-control" required value="<?=$sup->name;?>">
                                                    </div>
                                                    <div class="col-6 form-group">
                                                            <label for="">Opening Balance</label>
                                                            <input type="number" name="opening_bln" class="form-control"  value="<?=$sup->opening_balance;?>">
                                                        </div>
                                                    <div class="col-6 form-group">
                                                            <label for="">Mobile No. <span class="text-danger">*</span></label>
                                                            <input type="number" name="mobile" class="form-control" required value="<?=$sup->permanant_number;?>">
                                                    </div>
                                                     <div class="col-6 form-group">
                                                            <label for="">Email <span class="text-danger">*</span></label>
                                                            <input type="email" name="email" class="form-control" required value="<?=$sup->email;?>">
                                                    </div>
                                                    <div class="col-6 form-group">
                                                            <label for="">Phone No.</label>
                                                            <input type="number" name="phone" class="form-control" value="<?=$sup->alternate_number;?>">
                                                    </div>
                                                    <div class="col-6 form-group">
                                                            <label for="">GST No. </label>
                                                            <input type="text" name="gst" class="form-control"  value="<?=$sup->gst_no;?>">
                                                        </div>
                                                        <div class="col-6 form-group">
                                                            <label for="">TAX No.</label>
                                                            <input type="text" name="tax" class="form-control" required value="<?=$sup->tax_no;?>">
                                                        </div>
                                                        <div class="col-6 form-group">
                                                            <label for="">Country <span class="text-danger">*</span></label>
                                                            <input type="text" name="country" class="form-control" required value="<?=$sup->country;?>">
                                                        </div>
                                                        <div class="col-6 form-group">
                                                            <label for="">State <span class="text-danger">*</span></label>
                                                            <input type="text" name="state" class="form-control" required value="<?=$sup->state;?>">
                                                        </div>
                                                        <div class="col-6 form-group">
                                                            <label for="">City <span class="text-danger">*</span></label>
                                                            <input type="text" name="city" class="form-control" required value="<?=$sup->city;?>">
                                                        </div>
                                                        <div class="col-6 form-group">
                                                            <label for="">Pincode <span class="text-danger">*</span></label>
                                                            <input type="text" name="pincode" class="form-control" required value="<?=$sup->pincode;?>">
                                                        </div>
                                                        <div class="col-6 form-group">
                                                            <label for="">Address <span class="text-danger">*</span></label>
                                                            <input type="text" name="address" class="form-control" required value="<?=$sup->address;?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update </button>
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

<!-- Add Product modal -->