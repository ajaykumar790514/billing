<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card-block table-border-style">
        <div class="table-responsive">
          <table id="example" class="table table-hover">
            <thead>
              <tr>
                <th>Select</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price Per Unit</th>
                <th>Enter Qty</th>
                <th>Product Tax (%)</th>
                <th>Product Tax Value</th>
                <th>Amount</th>
                <th>Total Tax</th>
                <th>Total Amount</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;
              foreach ($products as $details) :
                $Tax = $Price = $TaxValue = 0;
                $Price = $details->selling_rate;
                $Tax = $details->pro_tax;
                $TaxValue = ($Price * $Tax) / 100;
                $PricePer = $details->selling_rate - $TaxValue;
                $totalamount = $PricePer + $TaxValue;
              ?>
                <tr>
                  <td>
                    <label>
                      <input type="checkbox" name="check_in_id[]" value="<?= $details->id ?>">
                    </label>
                  </td>
                  <td><img src="<?= IMGS_URL . $details->img; ?>" height="70px" width="70px" alt=""><br><?= $details->pro_name; ?><br><?= $details->pro_code; ?></td>
                  <td><?= $details->qty; ?></td>
                  <td>Rs.<?= $PricePer; ?> </td>
                  <td>
                    <input type="hidden" value="<?= $details->selling_rate; ?>" name="selling_rate[]">
                    <input type="hidden" value="<?= $details->mrp; ?>" name="mrp[]">
                    <input type="hidden" value="<?= $details->qty; ?>" name="exist_qtys[]">
                    <input type="number" name="quantity[]" class="form-control" value="1" min="1"></td>
                  <td><?= $details->pro_tax; ?> %</td>
                  <td><span class="single-tax">Rs.<?= $TaxValue; ?></span></td>
                  <td><span class="single-amount">Rs.<?=_number_format($totalamount)?></span></td>
                  <td><input type="hidden" class="total_taxss" value="<?=$TaxValue;?>" name="total_taxss[]"><span class="total-tax">Rs.<?=_number_format($TaxValue)?></span></td>
                  <td><span class="total-amount">Rs.<?=_number_format($totalamount)?></span></td>
                  <td><input type="hidden" class="total_amountss" value="<?=$totalamount;?>" name="total_amountss[]"></td>
                </tr>
              <?php $i++;
              endforeach; ?>
               <tr>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
                    <td>Total Tax</td>
                   <td>
                    <input type="number" name="FinalTax" class="FinalTax" value="0" readonly>
                     </td>
               </tr>
                <tr>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
                    <td> Total Payable Amount</td>
                   <td><input type="number" name="FinalAmount" class="FinalAmount" value="0" readonly></td>
               </tr>
               <tr>
                   <td></td>
                   <td></td>
                   <td></t>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
                    <td>PAYMENT RECEIVED</td>
                   <td><input type="number" name="paidable_amount" class="paidable_amount form-control" value="0" ></td>
               </tr>
               
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
      $('body').on('change | keyup', `[name="quantity[]"]`, function(e) {
        let _this = $(this);
        let _row = _this.parents('tr');
        let _form = _this.parents('form');
        let total=0;
        let tax=0;
        let qty = _row.find(`[name="quantity[]"]`).val();
        let single_amount = _row.find('.single-amount').text();
         let single_tax_str = _row.find('.single-tax').text();
        let amountWithoutRs = parseFloat(single_tax_str.replace('Rs.', ''));
        let SingleRS = parseFloat(single_amount.replace('Rs.', ''));
        total = SingleRS * qty;
        tax = amountWithoutRs * qty;
        _row.find('.total-amount').text("Rs." + total);
        _row.find('.total-tax').text("Rs." + tax);
        _row.find('.total_taxss').val(tax);
        _row.find('.total_amountss').val(total);
        calculate_grand_total(_form);
    })
  $(document).on('change keyup', '[name="check_in_id[]"]', function () {
    let _form = $(this).closest('form');
    calculate_grand_total(_form);
  });

  function calculate_grand_total(_form) {
    let product = _form.find('[name="check_in_id[]"]');
    let grand_total = 0;
    let grand_tax = 0;
   $.each(product, function () {
    let _this = $(this);
    if (_this.is(':checked')) {
        let _tr = _this.closest('tr');
        let total_amount_str = _tr.find('.total-amount').text();
        let SingleRS = parseFloat(total_amount_str.replace('Rs.', ''));
        grand_total += SingleRS;
        let total_tax_str = _tr.find('.total-tax').text();
        let Singletax = parseFloat(total_tax_str.replace('Rs.', ''));
        grand_tax += Singletax;
        // _tr.find('.total_tax').val(grand_tax);
        // _tr.find('.total_amount').val(grand_total);
    } else {
        // console.log('not');
    }
    $('.FinalTax').val(grand_tax);
    $('.FinalAmount').val(grand_total);
});

  }
  
</script>
