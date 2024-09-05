
<div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Customers List</h5>
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
                                            <li class="breadcrumb-item"><a href="#!">Customers List</a>
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
                                                                <th style="width: 100px !important">Address</th>
                                                                <th>Credit Limit</th>
                                                                 <th>Previous Due</th>                                  <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $i=1;
                                                        foreach($customers as $cus)
                                                        {    
                                                        ?>
                                                            <tr>
                                                                <th scope="row"><?=$i;?></th>
                                                                <td><?=$cus->name;?></td>
                                                                <td><?=$cus->permanant_number;?></td>
                                                                <td><?=$cus->email;?></td>
                                                                <td style="width: 100px !important"><?=$cus->address1;?>,<?=$cus->address_landmark;?>,<?=$cus->address_state;?>,<?=$cus->address_city;?>,<?=$cus->address_pincode;?>,<?=$cus->address_country;?></td>
                                                                <td><?=$cus->credit_limit;?></td>
                                                                <td><?=$cus->previous_deu;?></td>                       <td>
                                                                    <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#details<?=$i;?>"><i class="ti-eye"></i></a>
                                                                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?=$i;?>"><i class="ti-pencil-alt"></i></a>
                                                                    <a href="<?=base_url('customer/delete/'.$cus->id);?>" class="btn btn-danger btn-sm"><i class="ti-trash"></i></a>
                                                                </td>
                                                            </tr>

                                                            <!-- Details -->
                                            <div class="modal fade empdoc" id="details<?=$i;?>" tabindex="-1" aria-labelledby="details" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="details">View Details ( <?=$cus->name;?> )</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">Customer Name</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control" value="<?=$cus->name;?>" readonly name="cus_name" >
                                                                        </div>
                                                                    </div>   
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">Mobile No.</label>
                                                                        <div class="col-sm-9">
                                                                        <input type="number" class="form-control" name="mobile" value="<?=$cus->permanant_number;?>" readonly>
                                                                        </div>
                                                                    </div>    
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">Email</label>
                                                                        <div class="col-sm-9">
                                                                        <input type="email" class="form-control" name="email" value="<?=$cus->email;?>" readonly>
                                                                        </div>
                                                                    </div>   
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">Phone No.</label>
                                                                        <div class="col-sm-9">
                                                                        <input type="number" class="form-control" name="phone" value="<?=$cus->alternate_number;?>" readonly>
                                                                        </div>
                                                                    </div>    
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">GST No.</label>
                                                                        <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="gst" value="<?=$cus->gst_no;?>" readonly>
                                                                        </div>
                                                                    </div>   
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">TAX No.</label>
                                                                        <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="tax" value="<?=$cus->tax_no;?>" readonly>
                                                                        </div>
                                                                    </div>    
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">Credit Limit</label>
                                                                        <div class="col-sm-9">
                                                                        <input type="number" class="form-control" name="credit" value="<?=$cus->credit_limit;?>" readonly>
                                                                        </div>
                                                                    </div>   
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">Previous Due</label>
                                                                        <div class="col-sm-9">
                                                                        <input type="number" class="form-control" name="previous_due" value="<?=$cus->previous_deu;?>" readonly>
                                                                        </div>
                                                                    </div>    
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <h4 class="sub-title">Address Details</h4>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">Country</label>
                                                                        <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="add_country" value="<?=$cus->address_country;?>" readonly>
                                                                        </div>
                                                                    </div>   
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">State</label>
                                                                        <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="add_state" value="<?=$cus->address_state;?>" readonly>
                                                                        </div>
                                                                    </div>    
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">City</label>
                                                                        <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="add_city" value="<?=$cus->address_city;?>" readonly>
                                                                        </div>
                                                                    </div>   
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">Pincode</label>
                                                                        <div class="col-sm-9">
                                                                        <input type="number" class="form-control" name="add_pincode" value="<?=$cus->address_pincode;?>" readonly>
                                                                        </div>
                                                                    </div>    
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">Address</label>
                                                                        <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="add_address" value="<?=$cus->address1;?>" readonly>
                                                                        </div>
                                                                    </div>   
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">Lankmark</label>
                                                                        <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="add_landmark" value="<?=$cus->address_landmark;?>" readonly>
                                                                        </div>
                                                                    </div>    
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <h4 class="sub-title">Shipping Details</h4>
                                                                </div>
                                                               
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">Country</label>
                                                                        <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="ship_country" value="<?=$cus->shipping_country;?>" readonly>
                                                                        </div>
                                                                    </div>   
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">State</label>
                                                                        <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="ship_state" value="<?=$cus->shipping_state;?>" readonly>
                                                                        </div>
                                                                    </div>    
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">City</label>
                                                                        <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="ship_city" value="<?=$cus->shipping_city;?>" readonly>
                                                                        </div>
                                                                    </div>   
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">Pincode</label>
                                                                        <div class="col-sm-9">
                                                                        <input type="number" class="form-control" name="ship_pincode" value="<?=$cus->shipping_pincode;?>" readonly>
                                                                        </div>
                                                                    </div>    
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">Address</label>
                                                                        <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="ship_address" value="<?=$cus->shipping_address;?>" readonly>
                                                                        </div>
                                                                    </div>   
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label"> Lankmark</label>
                                                                        <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="ship_landmark" value="<?=$cus->shipping_landmark;?>" readonly>
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
                                                    <form class="form reload-page ajaxsubmit validate-form reload-tb" action="<?=base_url('customer/save/'.$cus->id)?>" method="POST" enctype="multipart/form-data">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Customer ( <?=$cus->name;?> )</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-6 form-group">
                                                            <label for="">Customer Name <span class="text-danger">*</span></label>
                                                            <input type="text" name="cus_name" class="form-control" required value="<?=$cus->name;?>">
                                                        </div>
                                                        <div class="col-6 form-group">
                                                            <label for="">Mobile No. <span class="text-danger">*</span></label>
                                                            <input type="number" name="mobile" class="form-control" required value="<?=$cus->permanant_number;?>">
                                                        </div>
                                                        <div class="col-6 form-group">
                                                            <label for="">Email <span class="text-danger">*</span></label>
                                                            <input type="email" name="email" class="form-control" required value="<?=$cus->email;?>">
                                                        </div>
                                                        <div class="col-6 form-group">
                                                            <label for="">Phone No.</label>
                                                            <input type="number" name="phone" class="form-control"  value="<?=$cus->alternate_number;?>">
                                                        </div>
                                                        <div class="col-6 form-group">
                                                            <label for="">GST No.</label>
                                                            <input type="text" name="gst" class="form-control"  value="<?=$cus->gst_no;?>">
                                                        </div>
                                                        <div class="col-6 form-group">
                                                            <label for="">TAX No.</label>
                                                            <input type="text" name="tax" class="form-control"  value="<?=$cus->tax_no;?>">
                                                        </div>
                                                        <div class="col-6 form-group">
                                                            <label for="">Credit Limit</label>
                                                            <input type="number" name="credit" class="form-control" value="<?=$cus->credit_limit;?>">
                                                        </div>
                                                        <div class="col-6 form-group">
                                                            <label for="">Previous Due</label>
                                                            <input type="number" name="previous_due" class="form-control" value="<?=$cus->previous_deu;?>" >
                                                        </div>
                                                        <div class="col-lg-12 mt-2">
                                                            <h4 class="sub-title">Address Details</h4>
                                                        </div>
                                                        <div class="col-6 form-group">
                                                            <label for="">Country <span class="text-danger">*</span></label>
                                                            <input type="text" name="add_country" class="form-control"  value="<?=$cus->address_country;?>" required>
                                                        </div>
                                                        <div class="col-6 form-group">
                                                            <label for="">State <span class="text-danger">*</span></label>
                                                            <input type="text" name="add_state" class="form-control"  value="<?=$cus->address_state;?>" required>
                                                        </div> 
                                                        <div class="col-6 form-group">
                                                            <label for="">City <span class="text-danger">*</span></label>
                                                            <input type="text" name="add_city" class="form-control"  value="<?=$cus->address_city;?>" required>
                                                        </div>
                                                        <div class="col-6 form-group">
                                                            <label for="">Pincode <span class="text-danger">*</span></label>
                                                            <input type="number" name="add_pincode" class="form-control"  value="<?=$cus->address_pincode;?>" required>
                                                        </div>
                                                        <div class="col-6 form-group">
                                                            <label for="">Address <span class="text-danger">*</span></label>
                                                            <input type="text" name="add_address" class="form-control"  value="<?=$cus->address1;?>" required>
                                                        </div>
                                                        <div class="col-6 form-group">
                                                            <label for="">Landmark <span class="text-danger">*</span></label>
                                                            <input type="text" name="add_landmark" class="form-control"  value="<?=$cus->address_landmark;?>" required>
                                                        </div>   
                                                        <div class="col-lg-12 mt-2">
                                                            <h4 class="sub-title">Shipping Details</h4>
                                                        </div>
                                                        <div class="col-6 form-group">
                                                            <label for="">Country </label>
                                                            <input type="text" name="ship_country" class="form-control"  value="<?=$cus->shipping_country;?>" >
                                                        </div>
                                                        <div class="col-6 form-group">
                                                            <label for="">State</label>
                                                            <input type="text" name="ship_state" class="form-control"  value="<?=$cus->shipping_state;?>" >
                                                        </div> 
                                                        <div class="col-6 form-group">
                                                            <label for="">City </label>
                                                            <input type="text" name="ship_city" class="form-control"  value="<?=$cus->shipping_city;?>" >
                                                        </div>
                                                        <div class="col-6 form-group">
                                                            <label for="">Pincode </label>
                                                            <input type="number" name="ship_pincode" class="form-control"  value="<?=$cus->shipping_pincode;?>" >
                                                        </div>
                                                        <div class="col-6 form-group">
                                                            <label for="">Address</label>
                                                            <input type="text" name="ship_address" class="form-control"  value="<?=$cus->shipping_address;?>" >
                                                        </div>
                                                        <div class="col-6 form-group">
                                                            <label for="">Landmark </label>
                                                            <input type="text" name="ship_landmark" class="form-control"  value="<?=$cus->shipping_landmark;?>" >
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