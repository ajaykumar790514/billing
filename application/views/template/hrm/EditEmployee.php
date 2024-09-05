<div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Edit Employee Details</h5>
                                            <!-- <p class="m-b-0">Lorem Ipsum is simply dummy text of the printing</p> -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Edit Employee Details</a>
                                            </li>
                                            <!-- <li class="breadcrumb-item"><a href="#!">Basic Form Inputs</a>
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
                                  
                                    <!-- Page body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- Basic Form Inputs card start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5></h5><a href="<?php echo base_url().'employees';?>" class="btn btn-danger  btn-sm text-white"><i class="ti-angle-left"></i> Back</a>
                                                        <!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
                                                    </div>
                                                    <div class="card-block">
                                                        <h4 class="sub-title">Employee Details</h4>
                                                        <?php echo form_open('update-employee/' . $users->id); ?>
                                                <input type="hidden"  name="id" value="<?php echo $users->id;?>">
                                                        <!-- <form action="<?php echo base_url().'insert-employee';?>" enctype="multipart/form-data" method="POST" > -->
                                                            <!-- <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Simple Input</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div> -->

                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Employee Name</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" name="emp_name"
                                                                    placeholder="Employee Name" value="<?php echo $users->emp_name; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Mobile No.</label>
                                                                <div class="col-sm-10">
                                                                    <input type="number" class="form-control" name="mobile"
                                                                    placeholder="Mobile No." value="<?php echo $users->mobile; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Email</label>
                                                                <div class="col-sm-10">
                                                                    <input type="email" class="form-control" name="email"
                                                                    placeholder="Email" value="<?php echo $users->email; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Select Department</label>
                                                                    <div class="col-sm-10">
                                                                        <select name="department" class="form-control">
                                                                            <option value="">--Select Department--</option>
                                                                    <?php foreach($department as $d)
                                                                     { ?>
                                                                    <option value="<?=$d->id;?>"  <?php if($d->id==$users->department){ echo "selected";} ;?> ><?=$d->name;?></option>
                                                                    <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Address</label>
                                                                <div class="col-sm-10">
                                                                    <textarea rows="5" cols="5" class="form-control" name="address"
                                                                    placeholder="Address" ><?php echo $users->address; ?></textarea>
                                                                </div>
                                                            </div>
                                                            
                                                                        <div class="form-group text-center">
                                                                            <input type="submit" class="btn btn-primary" value="Submit">
                                                                            </div>
                                                                        </div>
                                                                    <!-- </form> -->
                                                                    <?php echo form_close(); ?>
                                                                </div>
                                                            </div>
                                                            <!-- Basic Form Inputs card end -->
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
