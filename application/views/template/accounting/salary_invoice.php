<!DOCTYPE html>
<html>
<head>
<?php
$currentMonthYear = date('F_Y'); // Format: Month_Year
$capitalizedName = ucfirst(strtolower($salary[0]['emp_name']));
$title = 'Salary_Slip_' . $capitalizedName . '_' . $currentMonthYear;
?>
	<title><?=$title; ?></title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/img/fav-icon.png'); ?>">
    <link href="<?= base_url('assets/vendor/fontawesome/css/all.min.css'); ?>" rel="stylesheet">
	<style type="text/css">
        @page {
		  size: A4 portrait;
		}
		@page {
		  size: A4 portrait;
		}

		@page :first {
			margin-top: 35pt;
		}
		@page :left {
			margin-right: 30pt;
		}
		@page :right {
			margin-left: 30pt;
		}
		@media print {
			footer {
				display: none;
				position: fixed;
				bottom: 0;
			}
			header {
				display: none;
				position: fixed;
				top: 0;
			}
            .fa-download{
                display: none;
            }
		}
		table, figure {
			page-break-inside: avoid;
		}
		
		* { 
			margin: 0;
			padding: 0;
		}
		body {
			width: 100%;
			display: block;
		}
		#page-wrap { 
			width: 800px;
			margin: 0 auto;
			page-break-before: always;
		}
		#header { 
			width: 100%;
			text-align: center;
			color: black;
			text-transform: uppercase;
			padding: 2px 0px;
/*			page-break-before: always;*/
		}
	
		#company-logo {
			margin: 10px;
			max-width: 140px;
			max-height: 140px;
			overflow: none;
/*			position: absolute;*/
		}
		#company-logo > img {
			width: 100%;
			height: 100%;
		}
		#logo-header {
/*			margin-left: 200px;*/
/*			position: absolute;*/
/*			max-width: 600px;*/
            margin-top: 10px;
		}
		.copy {
			text-align:right;
			resize: none;	
			padding: 2px;
            font-family:  Helvetica, Sans-Serif;
		}

		#customer {
			overflow: hidden;
            width:40%;
            text-align: left;
            float: left;
            margin-bottom: 1rem;
		}
        #customers {
			overflow: hidden;
            width:50%;
            text-align: left;
            float: right;
            margin-bottom: 1rem;
		}
		#customer-data {
			position: relative;
		}
        #customer-datas {
			position: relative;
		}
		#customer-ship-to { 
			font-size: 13px;
			font-weight: bold;
			float: left; 
		}
		.customer-details {
			padding-top: 3px;
			font-size: 14px;
			font-weight: lighter;
			float: left; 	
		}
		#meta { 
			margin-left: 500px;
			margin-top: 1px;
			width: 300px;
			float: right;
		}

		#meta td {
			text-align: right;
		}
		#meta td.meta-head {
			text-align: left;
			background: #eee;
		}
		#meta td p {
			width: 100%;
			height: 20px;text-align: right;
		}

		p { border: 0; font: 14px, Serif; overflow: hidden; resize: none; }
		table { border-collapse: collapse; }
		table td, table th { border: 1px solid black; padding: 5px; }

		#items p { width: 80px; height: 50px; }
		
		
		#items th.description p, #items td.item-name p { width: 100%;border: none; }
		#items td.total-line { border-right: 0; text-align: right; }
		
		#items td.total-value { border-left: 0; padding: 10px; }
		
		#items td.total-value p { height: 20px; background: none; }
		#items td.balance { background: #eee; }
		#items td.blank { border: 0; }

		#total-amount { margin: 20px 0 0 5px; font-family:  Arial, Helvetica, sans-serif}

		#shop-details{
            text-align : center;
        }
        #invoice {
			overflow: hidden;
			margin-top: 20px;
		}
        #customer-name{
            font-size: 16px; 
            margin-top: 0.5rem;
        }
        #customer-names{
            font-size: 16px; 
            margin-top: 0.5rem;
        }
        #customer-text{
            font-size: 16px;
            margin-top: 3px;    
        }
        #customer-texts{
            font-size: 16px;
            margin-top: 3px;    
        }
		hr{
            border: 1px solid black;
            margin-top:15px;
        }
      	hr.tax{
            border: 1px solid black;
            margin-top:10px;
            margin-bottom:3px;
        }
         	hr.bottom{
            border: 1px solid black;
            margin-top:-0.00001px;
        }
      
        #shop-contact{
            margin-top:5px
        }
        #authorised
        {
            margin: 11px;
            margin-top: 1rem;
            font-family:  Arial, Helvetica, sans-serif;
        }
         #head
         {
            margin-top: 2rem;
         }
        .row #logo
        {
            float: left;
        }
        .row #data
        {
            float:right;
            text-align: left;
            margin-top: 2rem;
        }
        .row #data h2
        {
            text-align: right;
            font-family:  Arial, Helvetica, sans-serif;
        }
        .row #data p
        {
            text-align: right;
            font-family:  Helvetica, Sans-Serif;
            line-height: 20px;
            color: #000;
        }
       #tax
         {
       font-size: 1.2rem;font-weight:bold;font-family: Arial, Helvetica, sans-serif;
         }
         .vl {
  border-left: 2px solid black;
  height: 150px;
  position: absolute;
  left: 46.6%;
  margin-left: -3px;
  top: 18.7rem;
}

 	</style>
</head>
<body onload="window.print()">
<!-- onload="window.print()" -->
	<div id="page-wrap">
    <div id="company-details">
            <div class="row" id="head">
                <div class="col-4" id="logo">
                <div id="company-logo">
            	<img id="image" src="<?=base_url('uploads/photo/users/logo.png');?>" alt="logo"/>
                 </div>
                </div>
                <div class="col-8" id="data">
                <div id="company-data">
                <h2 style="text-transform: uppercase;letter-spacing:1px;font-size: 1.4rem"><?=$salary[0]['emp_name'];?></h2>
                <p><?=$salary[0]['address'];?></p>
                <p>Mobile No. <?=$salary[0]['mobile'];?></p>
                <p>Email: <?=$salary[0]['email'];?></p>
                <p>GSTIN: <b style="font-weight:bold;">654GVYB648</b></p>
                 </div>
                </div>
            </div>
		</div>
		
	<!-- </div> -->
    <p id="header" ><hr class="tax"> <center><span  id="tax" >PAYSLIP</span></center><hr class="bottom"></p>
         <div id="logo-header">
            	<p class="copy">
                Salary No.: <b><?=$salary[0]['salary_no'];?></b>
            	</p>
            	<p class="copy">
                Date: <b><?php $now = new DateTime($salary[0]['added']);
    echo $timestring = $now->format('d-m-Y');?></b>
            	</p>
            </div>
       <hr>

        <table width="100%" style="border:2px solid black;margin-top:5px;">
            <tr>
                <th  style="border-left:5px !important;border:2px solid black;height:40px;width:25%;font-family:  Arial, Helvetica, sans-serif;">Earnings</th>
                <th style="border:2px solid black;height:40px;width:25%;font-family:  Arial, Helvetica, sans-serif;">Amount</th>
                <th style="border:2px solid black;height:40px;width:25px;font-family:  Arial, Helvetica, sans-serif;">Deductions</th>
                <th style="border:2px solid black;height:40px;width:25%;font-family:  Arial, Helvetica, sans-serif;">Amount</th>
            </tr> 
            <tr>
                <td style="border-left:5px !important;border:2px solid black;height:40px;width:25%;text-align:center;font-family:  Arial, Helvetica, sans-serif;">Basic Salary</td>
                <td style="border:2px solid black;height:40px;width:25%;text-align:center;font-family:  Arial, Helvetica, sans-serif;"><?=$salary[0]['amount'];?></td>
                <td style="border:2px solid black;height:40px;width:25%;text-align:center;font-family:  Arial, Helvetica, sans-serif;">Provident Fund</td>
                <td  style="border:2px solid black;height:40px;width:25%;text-align:center;font-family:  Arial, Helvetica, sans-serif;"></td>
            </tr>
            <tr>
                <td style="border-left:5px !important;border:2px solid black;height:40px;width:25%;text-align:center;font-family:  Arial, Helvetica, sans-serif;">Incentive Pay</td>
                <td style="border:2px solid black;height:40px;width:25%;text-align:center;font-family:  Arial, Helvetica, sans-serif;"></td>
                <td style="border:2px solid black;height:40px;width:25%;text-align:center;font-family:  Arial, Helvetica, sans-serif;">Professional TAX</td>
                <td  style="border:2px solid black;height:40px;width:25%;text-align:center;font-family:  Arial, Helvetica, sans-serif;"></td>
            </tr>
            <tr>
                <td style="border-left:5px !important;border:2px solid black;height:40px;width:25%;text-align:center;font-family:  Arial, Helvetica, sans-serif;">House Rent Allowance</td>
                <td style="border:2px solid black;height:40px;width:25%;text-align:center;font-family:  Arial, Helvetica, sans-serif;"></td>
                <td style="border:2px solid black;height:40px;width:25%;text-align:center;font-family:  Arial, Helvetica, sans-serif;">Loan</td>
                <td  style="border:2px solid black;height:40px;width:25%;text-align:center;font-family:  Arial, Helvetica, sans-serif;"></td>
            </tr>
            <tr>
                <td style="border-left:5px !important;border:2px solid black;height:40px;width:25%;text-align:center;font-family:  Arial, Helvetica, sans-serif;">Meal Allowance</td>
                <td style="border:2px solid black;height:40px;width:25%;text-align:center;font-family:  Arial, Helvetica, sans-serif;"></td>
                <td style="border:2px solid black;height:40px;width:25%;text-align:center;font-family:  Arial, Helvetica, sans-serif;"></td>
                <td  style="border:2px solid black;height:40px;width:25%;text-align:center;font-family:  Arial, Helvetica, sans-serif;"></td>
            </tr>
            <tr>
                <td style="border-left:5px !important;border:2px solid black;height:40px;width:25%;text-align:center;font-family:  Arial, Helvetica, sans-serif;"><b>Total Earing</b></td>
                <td style="border:2px solid black;height:40px;width:25%;text-align:center;font-family:  Arial, Helvetica, sans-serif;"><b><?=$salary[0]['amount'];?></b></td>
                <td style="border:2px solid black;height:40px;width:25%;text-align:center;font-family:  Arial, Helvetica, sans-serif;"><b>Total Deduction</b></td>
                <td  style="border:2px solid black;height:40px;width:25%;text-align:center;font-family:  Arial, Helvetica, sans-serif;"><b>0</b></td>
            </tr>
            <tr cols="4">
                <td style="height:40px;width:25%;text-align:center;font-family:  Arial, Helvetica, sans-serif;"></td>
                <td style="height:40px;width:25%;text-align:center;font-family:  Arial, Helvetica, sans-serif;"></td>
                <td style="border:2px solid black;height:40px;width:25%;text-align:center;font-family:  Arial, Helvetica, sans-serif;"><b>Net Pay</b></td>
                <td  style="border:2px solid black;height:40px;width:25%;text-align:center;font-family:  Arial, Helvetica, sans-serif;"><b><?=$salary[0]['amount'];?></b></td>
            </tr>
        </table>
<hr>
        <div id="total-amount" style="margin-top:20px;">
		  	<p>Total Amount (in words) : <strong><?= number_to_word($salary[0]['amount']); ?></strong></p>
		</div>
        <hr>
        <div style="text-align: end">
            <p id="authorised">For My Billing Management System</p>
		  	<p id="authorised">Authorised Signatory</p>
		</div>
        <table>

        <table >
        <h4 style="font-family:  Arial, Helvetica, sans-serif; margin-top:30px !important;"><u> Important informations :</u></h4>
            <tr style="font-family:  Arial, Helvetica, sans-serif">
           <th style="border:none">1.</th>
           <td style="border:none">This is a computer-generated salary slip hence does not require any signature.</td>
           </tr>
            <tr style="font-family:  Arial, Helvetica, sans-serif">
           <th style="border:none;"><center style="margin-top:-17px !important;">2.</center></th>
           <td style="border:none">Goods once sold will be returned or replaced as per the return and refund policy listed in policies section of the app.</td>
           </tr>
           <tr style="font-family:  Arial, Helvetica, sans-serif">
           <th style="border:none">3.</th>
           <td style="border:none">All the disputes are subject to city Jurisdiction.</td>
           </tr>
        </table>
        
</div>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</body>
</html>
