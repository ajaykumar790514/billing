
<div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Manage Purchase</h5>
                                            <!-- <p class="m-b-0">Lorem Ipsum is simply dummy text of the printing</p> -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="<?=base_url('dashboard');?>"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Purchase</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Manage Purchase</a>
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
                                                                <th>Purchase No.</th>
                                                                <th>Invoice No</th>
                                                                <th>Supplier Name</th>
                                                                <th>Purchase Date</th>
                                                                <th>Totoal Amount</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $i=1;$TOTAL=0;
                                                        foreach($orders as $order)
                                                        {
                                                            $TOTAL = $TOTAL+$order->total;
                                                             ?>
                                                            <tr>
                                                                <th scope="row"><?=$i;?></th>
                                                                <td><?=$order->purchase_no;?></td>
                                                                <td><?=$order->invoice_no;?></td>
                                                                <td><?=getSup($order->sup_id);?></td>
                                                                <td><?=date($order->date);?></td>
                                                                <td><?=$order->total;?></td>
                                                                <td><a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?=$i;?>"><i class="fa fa-eye" style="font-size: 1rem;"></i></a></td>
                                                            </tr>
                                                <!-- Modal -->
<div class="modal fade" id="exampleModal<?=$i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?=$order->invoice_no;?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="row">
                    <div class="col-3">
                        <b>Product Name</b>
                    </div>
                    <div class="col-3">
                    <b> Product Rate</b>
                    </div>
                    <div class="col-3">
                    <b> Quantity</b>
                    </div>
                    <div class="col-3">
                    <b>Price</b>
                    </div>
                </div><br>
                <?php
                $orderDetails = $this->Admin_model->getData('purchase_items',['purchase_id'=>$order->id]);

                // Check if there are details to display
                if ($orderDetails) {
                foreach($orderDetails as $details):    
                ?>
                <div class="row">
                    <div class="col-3">
                        <!-- Display data from $orderDetails -->
                        <?=$details->name;?>
                    </div>
                    <div class="col-3">
                        <?=$details->rate;?>
                    </div>
                    <div class="col-3">
                        <?=$details->qty;?>
                    </div>
                    <div class="col-3">
                        <?=$details->total;?>
                    </div>
                </div>
                <?php
                endforeach;} else {
                    echo "No details found for this order.";
                }
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

                                                        <?php  $i++;
                                                         } ?>
                                                        
                                                    <tr>
                                                        <th colspan="5" align="right"><b>Grand Total</b></th>
                                                        <th colspan="2"><b>Rs.<?=$TOTAL;?></b></th>
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

