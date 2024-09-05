<div class="container">
  <div class="row">
      <div class="col-4">
        <div class="row">
            <div class="col-3">
            <span>
                <img src="<?=IMGS_URL.$details->img;?>" height="100px" alt="">
            </span>
            </div>
            <div class="col-2"></div>
            <div class="col-7">
            <h6> Product Name:- <?=$details->pro_name;?></h6>
            <h6> Product Code:- <?=$details->pro_code;?></h6>
            <h6> Description:- <?=$details->description;?></h6>
            </div>
        </div>
      </div>
      <div class="col-8">
        <input type="hidden" name="product_id" value="<?=$details->id;?>">
      <h5 class="float-right text-right">Current Quantity : <?=$details->qty;?></h5>
        <div class="card-block table-border-style">
             <div class="table-responsive">
                <table class="table table-hover">
                   <thead>
                    <tr>
                        <th>Price Per Unit</th>
                        <th>Enter Qty</th>
                        <th>Product Tax (%)</th>
                        <th>Product Tax Value</th>
                        <th>Total Amount</th>
                    </tr>
                   </thead>
                   <tbody>
                    <?php 
                     $Tax = $Price= $TaxValue=0;
                     $Price = $details->selling_rate;
                     $Tax = $details->pro_tax;
                     $TaxValue = ($Price*$Tax)/100;
                     $PricePer = $details->selling_rate-$TaxValue;
                     $totalamount = $PricePer+$TaxValue;
                     ?>
                    <tr>
                        <input type="hidden" value="<?=$details->qty;?>" name="exist_qty">
                        <input type="hidden" value="<?=$TaxValue;?>" id="tax"> 
                        <input type="hidden" value="<?=$totalamount;?>" id="amount"> 
                        <input type="hidden" class="total_qty" name="total_qty" value="1" id="total_qty">
                        <input type="hidden" class="total_tax" name="total_tax" id="total_tax" value="<?=$TaxValue;?>">
                        <input type="hidden" class="total_amount" name="total_amount" id="total_amount" value="<?=$totalamount;?>">
                        <td>Rs.<?=$PricePer;?> </td>
                        <td><input type="number" class="form-control quantity" name="quantity" id="quantity" value="1"></td>
                        <td><?=$details->pro_tax;?> %</td>
                        <td><span class="payable_tax">Rs.<?=$TaxValue;?></span></td>
                        <th><span class="payable_amount">Rs.<?=$totalamount?></span></th>
                    </tr>
                   </tbody>
                </table>
             </div>
        </div>      
      </div>
  </div>
</div>	

