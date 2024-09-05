<div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Add New Supplier</h5>
                                            <!-- <p class="m-b-0">Lorem Ipsum is simply dummy text of the printing</p> -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Accounts</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Add New Supplier</a>
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
                                                        <h5></h5><a href="<?=base_url('contacts-dashboard');?>" class="btn btn-danger text-light btn-sm">< Back</a>
                                                        <!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
                                                    </div>
                                                    <div class="card-block">
                                                        <h4 class="sub-title">Supplier Basic Details</h4>
                                                        <form class="form ajaxsubmit reload-page validate-form reload-tb" action="<?=base_url('supplier/save')?>" method="POST" enctype="multipart/form-data">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-4 col-form-label">Supplier Name <span class="text-danger">*</span></label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control" name="sup_name" required>
                                                                        </div>
                                                                    </div>   
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-4 col-form-label">Opening Balance</label>
                                                                        <div class="col-sm-8">
                                                                        <input type="number" class="form-control" name="opening_bln">
                                                                        </div>
                                                                    </div>   
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-4 col-form-label">Mobile No. <span class="text-danger">*</span></label>
                                                                        <div class="col-sm-8">
                                                                        <input type="number" class="form-control" name="mobile" required>
                                                                        </div>
                                                                    </div>    
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-4 col-form-label">Email <span class="text-danger">*</span></label>
                                                                        <div class="col-sm-8">
                                                                        <input type="email" class="form-control" name="email" required>
                                                                        </div>
                                                                    </div>   
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-4 col-form-label">Phone No.</label>
                                                                        <div class="col-sm-8">
                                                                        <input type="number" class="form-control" name="phone">
                                                                        </div>
                                                                    </div>    
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-4 col-form-label">GST No.</label>
                                                                        <div class="col-sm-8">
                                                                        <input type="text" class="form-control" name="gst">
                                                                        </div>
                                                                    </div>   
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-4 col-form-label">TAX No.</label>
                                                                        <div class="col-sm-8">
                                                                        <input type="text" class="form-control" name="tax">
                                                                        </div>
                                                                    </div>    
                                                                </div>
                                                                
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-4 col-form-label">Country <span class="text-danger">*</span></label>
                                                                        <div class="col-sm-8">
                                                                        <input type="text" class="form-control" name="country" required>
                                                                        </div>
                                                                    </div>   
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-4 col-form-label">State <span class="text-danger">*</span></label>
                                                                        <div class="col-sm-8">
                                                                        <input type="text" class="form-control" name="state" required>
                                                                        </div>
                                                                    </div>    
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-4 col-form-label">City <span class="text-danger">*</span></label>
                                                                        <div class="col-sm-8">
                                                                        <input type="text" class="form-control" name="city" required>
                                                                        </div>
                                                                    </div>   
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-4 col-form-label">Pincode <span class="text-danger">*</span></label>
                                                                        <div class="col-sm-8">
                                                                        <input type="number" class="form-control" name="pincode" required>
                                                                        </div>
                                                                    </div>    
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-4 col-form-label">Address <span class="text-danger">*</span></label>
                                                                        <div class="col-sm-8">
                                                                        <input type="text" class="form-control" name="address" required>
                                                                        </div>
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
                                                                    <label class="col-sm-2 col-form-label">Select Box</label>
                                                                    <div class="col-sm-10">
                                                                        <select name="select" class="form-control">
                                                                            <option value="opt1">Select One Value Only</option>
                                                                            <option value="opt2">Type 2</option>
                                                                            <option value="opt3">Type 3</option>
                                                                            <option value="opt4">Type 4</option>
                                                                            <option value="opt5">Type 5</option>
                                                                            <option value="opt6">Type 6</option>
                                                                            <option value="opt7">Type 7</option>
                                                                            <option value="opt8">Type 8</option>
                                                                        </select>
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
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-2 col-form-label">Textarea</label>
                                                                            <div class="col-sm-10">
                                                                                <textarea rows="5" cols="5" class="form-control"
                                                                                placeholder="Default textarea"></textarea>
                                                                            </div>
                                                                        </div> -->
                                                                        <div class="form-group text-center mt-3">
                                                                            <button type="submit" class="btn btn-primary">Submit</button>
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
