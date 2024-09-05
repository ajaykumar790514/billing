
<div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Total Collection</h5>
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
                                            <li class="breadcrumb-item"><a href="#!">Total Collection</a>
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
                                                                <th>Order Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $i=1;
                                                        $OrAmount = $Oqty = 0 ;
                                                        foreach($orders as $order)
                                                        {
                                                            $OrAmount = $OrAmount + $order->amount;
                                                            $Oqty = $Oqty + $order->qty;
                                                             ?>
                                                            <tr>
                                                                <th scope="row"><?=$i;?></th>
                                                                <td><?=$order->invoice_no;?></td>
                                                                <td><?=$order->pro_name;?></td>
                                                                <td><?=$order->amount;?></td>
                                                                <td><?=$order->qty;?></td>
                                                                <td><?=$order->order_date;?></td>
                                                            </tr>
                                                        <?php  $i++;
                                                         } ?>
                                                        <?php 
                                                        $indiorder = $Iqty = 0;
                                                        foreach($indorders as $indorder)
                                                        {
                                                            $indiorder = $indiorder + $indorder->amount;
                                                            $Iqty = $Iqty + $indorder->qty;
                                                             ?>
                                                            <tr>
                                                                <th scope="row"><?=$i;?></th>
                                                                <td><?=$indorder->invoice_no;?></td>
                                                                <td><?=$indorder->pro_name;?></td>
                                                                <td><?=$indorder->amount;?></td>
                                                                <td><?=$indorder->qty;?></td>
                                                                <td><?=$indorder->order_date;?></td>
                                                            </tr>
                                                        <?php  $i++;
                                                         } ?> 
                                                         <?php 
                                                         $TAmount = $OrAmount + $indiorder;
                                                         $Tqty = $Oqty + $Iqty;
                                                         ?>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><h4><b>Total: <?=$TAmount;?></b></h4></td>
                                                        <td><h4><b>Qty: <?=$Tqty;?></b></h4></td>
                                                        <td></td>
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

