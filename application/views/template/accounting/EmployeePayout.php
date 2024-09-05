
<div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Employees Payout</h5>
                                            <!-- <p class="m-b-0">Lorem Ipsum is simply dummy text of the printing</p> -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="<?=base_url('dashboard');?>"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Accounting</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Employees Payout</a>
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
                                                <h5></h5><a href="<?=base_url('dashboard');?>" class="btn btn-danger btn-sm"> < Back</a>
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
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table id="example"  class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr. No.</th>
                                                                <th>Employee Name</th>
                                                                <th>Mobile No.</th>
                                                                <th>Email</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $i=1;
                                                        foreach($employees as $employee)
                                                        { ?>
                                                            <tr>
                                                                <td><?=$i;?></td>
                                                                <td><?=$employee->emp_name;?></td>
                                                                <td><?=$employee->mobile;?></td>
                                                                <td><?=$employee->email;?></td>
                                                                <td><a href="<?=base_url('employees-details/'.$employee->id);?>" class="btn btn-primary btn-sm">Details</a></td>
                                                                
                                                            </tr>
                                                        <?php  $i++; } ?>
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
<!-- Add Department modal -->

