                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Add New Employee</h5>
                                            <!-- <p class="m-b-0">Lorem Ipsum is simply dummy text of the printing</p> -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">HRM</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Add New Employee</a>
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
                                  
                                    <!-- Page body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- Basic Form Inputs card start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5></h5><a href="<?php echo base_url().'employees';?>" class="btn btn-warning btn-sm text-dark"><i class="ti-angle-left"></i> Back</a>
                                                        <!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
                                                    </div>
                                                    <div class="card-block">
                                                        <h4 class="sub-title">Employee Details</h4>
                                                        <form action="<?php echo base_url().'insert-employee';?>" enctype="multipart/form-data" method="POST" >
                                                            <!-- <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Simple Input</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div> -->
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Employee Name</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" name="emp_name"
                                                                    placeholder="Employee Name">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Mobile No.</label>
                                                                <div class="col-sm-9">
                                                                    <input type="number" class="form-control" name="mobile"
                                                                    placeholder="Mobile No.">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Email</label>
                                                                <div class="col-sm-9">
                                                                    <input type="email" class="form-control" name="email"
                                                                    placeholder="Email">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                    <label class="col-sm-3 col-form-label">Select A Department</label>
                                                                    <div class="col-sm-9">
                                                                        <select name="department" class="form-control">
                                                                            <option value="">Select a Department</option>
                                                                            <?php foreach($departs as $depart)
                                                                            {
                                                                                ?>
                                                                            <option value="<?=$depart->id;?>"><?=$depart->name;?></option>
                                                                           <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            <!-- <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Department</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" name="department"
                                                                    placeholder="Department">
                                                                </div>
                                                            </div> -->
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Address</label>
                                                                <div class="col-sm-9">
                                                                    <textarea rows="5" cols="5" class="form-control" name="address"
                                                                    placeholder="Address"></textarea>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Password</label>
                                                                <div class="col-sm-10">
                                                                    <input type="password" class="form-control"
                                                                    placeholder="Password input">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Read only</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                    placeholder="You can't change me" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Disable Input</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                    placeholder="Disabled text" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Predefine
                                                                    Input</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control"
                                                                        value="Enter yout content after me">
                                                                    </div>
                                                                </div>
                                                               
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Round Input</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text"
                                                                        class="form-control form-control-round"
                                                                        placeholder=".form-control-round">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Maximum
                                                                        Length</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control"
                                                                            placeholder="Content must be in 6 characters"
                                                                            maxlength="6">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Disable
                                                                            Autocomplete</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text" class="form-control"
                                                                                placeholder="Autocomplete Off"
                                                                                autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-2 col-form-label">Static Text</label>
                                                                            <div class="col-sm-10">
                                                                                <div class="form-control-static">Hello !... This is
                                                                                    static text
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-2 col-form-label">Color</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="color" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-2 col-form-label">Upload File</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="file" class="form-control">
                                                                            </div>
                                                                        </div> -->
                                                                        <div class="form-group text-center">
                                                                            <input type="submit" class="btn btn-primary" value="Submit">
                                                                            <!-- <label class="col-sm-2 col-form-label">Upload File</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="file" class="form-control"> -->
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                   
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
