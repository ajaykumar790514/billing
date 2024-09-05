
<div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Normal Sales Report</h5>
                                            <!-- <p class="m-b-0">Lorem Ipsum is simply dummy text of the printing</p> -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="<?=base_url('dashboard');?>"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Billing</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Normal Sales Report</a>
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
                                                                <th>Invoice No.</th>
                                                                <th>Product Name</th>
                                                                <th>Amount</th>
                                                                <th>Quantity</th>
                                                                <th>Order Status</th>
                                                                <th>Payment Status</th>
                                                                <th>Order Date</th>
                                                                <th>Print</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $i=1;
                                                          $TAmount=$TQty=0;
                                                        foreach($normalsales as $normalsale)
                                                        {
                                                            $status =   $this->admin_model->getRow('order_status_master',['is_deleted'=>'NOT_DELETED','id'=>$normalsale->status]);
                                                            $paystatus =   $this->admin_model->getRow('payment_status',['is_deleted'=>'NOT_DELETED','id'=>$normalsale->payment_status]);
                                                            $TAmount = $TAmount + $normalsale->Tamount;
                                                            $TQty = $TQty + $normalsale->qty;
                                                    ?>
                                                            <tr>
                                                                <th scope="row"><?=$i;?></th>
                                                                <td><?=$normalsale->invoice_no;?></td>
                                                                <td><?=$normalsale->pro_name;?></td>
                                                                <td><?=$normalsale->Tamount;?></td>
                                                                <td><?=$normalsale->qty;?></td>
                                                                <td><?=$status->name;?></td>
                                                                <td><?=$paystatus->name;?></td>
                                                                <td><?=$normalsale->order_date;?></td>
                                                                <td><a target="_blank" href="<?=base_url('normal-invoice/'.$normalsale->invoice_no);?>" class="btn btn-danger btn-sm"><i class="fa fa-print"></i></a></td>
                                                            </tr>
                                                        <?php  $i++;
                                                    } ?>
                                                       <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th><h4><b>Total: <?=$TAmount;?></b></h4></th>
                                                        <th><h4><b>Qty: <?=$TQty;?></b></h4></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
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

