<div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Dashboard</h5>
                                          <p class="m-b-0">Welcome to Dashboard</p>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="<?=base_url();?>dashboard"> <i class="fa fa-home"></i> </a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="#!">Dashboard</a>
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
                                        <div class="row">
                                            <div class="col-xl-9 col-md-9">
                                            <div id="main" class="card pt-4 pb-4 pl-4 pr-4"></div>
                                            </div>
                                            <div class="col-xl-3 col-md-3">
                                                <div class="card pt-4 pb-4 pl-4 pr-4">
                                                    <h4>Todays Report</h4>
                                                    <table class="table" style="width:100%;height: 135px; display: block; overflow-y: auto;">
                                                        <thead>
                                                            <tr style="background-color: #f2f2f2;">
                                                            <th scope="col">Todays Report</th>
                                                            <th scope="col">TK</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                            <th>Total Sales</th>
                                                            <td><?=$currentMonthSales;?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Total Purchase</th>
                                                                <td><?=$purchase_this;?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <p>Last Month Sales & Purchase</p>
                                                <canvas id="labelChart"></canvas>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- task, page, download counter  start -->
                                            <div class="col-xl-3 col-md-6">
                                                <!-- <a href="<?=base_url('hrm-dashboard');?>"> -->
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-purple"><?=total_rows('customers');?></h4>
                                                                <h6 class="f-18 m-b-3">Total Customer</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <!-- <i class="fa fa-bar-chart f-28"></i> -->
                                                                <img src="<?=base_url();?>images/customer.png" style="width:3.5rem;" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <!-- </a> -->
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                            <!-- <a href="<?=base_url('inventory-dashboard');?>"> -->
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-green"><?=total_rows('suppliers');?></h4>
                                                                <h6 class="m-b-3 f-18">Total Supplier</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <!-- <i class="fa fa-file-text-o f-28"></i> -->
                                                                <img src="<?=base_url();?>images/supplier.png" style="width:3.5rem;" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                <!-- </a> -->
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                            <!-- <a href="<?=base_url('contacts-dashboard');?>"> -->
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-red"><?=total_rows('products');?></h4>
                                                                <h6 class="m-b-3 f-18">Total Product</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <!-- <i class="fa fa-calendar-check-o f-28"></i> -->
                                                                <img src="<?=base_url();?>images/product.png" style="width:3rem;" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <!-- </a> -->
                                            </div>
                                            
                                            <div class="col-xl-3 col-md-6">
                                                <!-- <a href="<?php echo base_url('billing')?>"> -->
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-blue"><?=total_rows('orders');?></h4>
                                                                <h6 class="f-18 m-b-3">Total Invoice</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <!-- <i class="fa fa-hand-o-down f-28"></i> -->
                                                                <img src="<?=base_url();?>images/invoice.png" style="width:2.5rem;" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- </a> -->
                                            </div>
                                            <!-- task, page, download counter  end -->
    
                                                <!-- task, page, download counter  start -->
                                                <div class="col-xl-3 col-md-6">
                                                <a href="<?=base_url('add-employee');?>">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-purple"><?=total_rows('emp_details');?></h4>
                                                                <h6 class="f-18 m-b-3">Add Employee</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <!-- <i class="fa fa-bar-chart f-28"></i> -->
                                                                <img src="<?=base_url();?>images/emp.png" style="width:3rem;" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                </a>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                            <a href="<?=base_url('category-master');?>">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-green"><?php $cat=$this->Admin_model->getData('category',['is_deleted'=>'NOT_DELETED','is_parent'=>'0']);echo count($cat);?></h4>
                                                                <h6 class="m-b-3 f-18">Add Category</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <!-- <i class="fa fa-file-text-o f-28"></i> -->
                                                                <img src="<?=base_url();?>images/category.png" style="width:3.5rem;" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                            <a href="<?=base_url('subcategory-master');?>">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-red"><?php $subcat=$this->Admin_model->getData('category',['is_deleted'=>'NOT_DELETED','is_parent !='=>'0']);echo count($subcat);?></h4>
                                                                <h6 class="m-b-3 f-18">Add Sub Category</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <!-- <i class="fa fa-calendar-check-o f-28"></i> -->
                                                                <img src="<?=base_url();?>images/category.png" style="width:3.5rem;" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                    </a>
                                            </div>
                                            
                                            <div class="col-xl-3 col-md-6">
                                                <a href="<?php echo base_url('product-master')?>">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-blue"><?=total_rows('products');?></h4>
                                                                <h6 class="f-18 m-b-3">Add Product</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <!-- <i class="fa fa-hand-o-down f-28"></i> -->
                                                                <img src="<?=base_url();?>images/product.png" style="width:3rem;" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </a>
                                            </div>
                                            <!-- task, page, download counter  end -->
                                            <!-- task, page, download counter  start -->
                                            <div class="col-xl-3 col-md-6">
                                                <a href="<?=base_url('customer');?>">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-purple"><?=total_rows('customers');?></h4>
                                                                <h6 class="f-18 m-b-3">Add Customer</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <!-- <i class="fa fa-bar-chart f-28"></i> -->
                                                                <img src="<?=base_url();?>images/customer.png" style="width:3.5rem;" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                </a>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                            <a href="<?=base_url('supplier');?>">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-green"><?=total_rows('suppliers');?></h4>
                                                                <h6 class="m-b-3 f-18">Add Supplier</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <!-- <i class="fa fa-file-text-o f-28"></i> -->
                                                                <img src="<?=base_url();?>images/supplier.png" style="width:3.5rem;" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                            <a href="<?=base_url('purchase-master');?>">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-red"><?=total_rows('purchase');?></h4>
                                                                <h6 class="m-b-3 f-18">Add Purchase</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <!-- <i class="fa fa-calendar-check-o f-28"></i> -->
                                                                <img src="<?=base_url();?>images/purchase.png" style="width:2.5rem;" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                    </a>
                                            </div>
                                            
                                           
                                        </div>
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        body {
	background-color: #fff;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px; 
	color: #000;
}

a:link, a:visited {
	color: #4682b4;
}

a:hover {
	color: #4169e1;
}

#main	{
	width: 100%;
	height: 500px;
}
#labelChart
{
    width: 100%;
    height: auto;
}
.table-bordered {
    height:50px !important;
}
    </style>
  
    <script>
var myChart = echarts.init(document.getElementById('main'), 'royal');
    
    var option = {
        title: {
            text: 'Monthly Sales Amount & Orders',
            subtext: 'Fictitious'
        },
        tooltip: {
            trigger: 'axis'
        },
        legend: {
            data: ['Sales', 'Orders']
        },
        toolbox: {
            show: true,
            feature: {
                mark: { show: true },
                dataView: { show: true, readOnly: false },
                magicType: { show: true, type: ['line', 'bar'] },
                restore: { show: true },
                saveAsImage: { show: true }
            }
        },
        calculable: true,
        xAxis: [
            {
                type: 'category',
                data: <?php echo json_encode(array_column($graph, 'month_name')); ?>,
            }
        ],
        yAxis: [
            {
                type: 'value'
            }
        ],
        series: [
            {
                name: 'Sales',
                type: 'bar',
                data: <?php echo json_encode(array_column($graph, 'total')); ?>,
                markPoint: {
                    data: [
                        { type: 'max', name: 'Max' },
                        { type: 'min', name: 'Min' }
                    ]
                },
                markLine: {
                    data: [
                        { type: 'average', name: 'Average Value' }
                    ]
                }
            },
            {
                name: 'Orders',
                type: 'bar',
                data: <?php echo json_encode(array_column($graph, 'order_count')); ?>,
                markPoint: {
                    data: [
                        { name: 'Annual Maximum', value: 182.2, xAxis: 7, yAxis: 183 },
                        { name: 'Minimum', value: 2.3, xAxis: 11, yAxis: 3 }
                    ]
                },
                markLine: {
                    data: [
                        { type: 'average', name: 'Average Value' }
                    ]
                }
            }
        ]
    };


		// Use just the specified configurations and data charts. 
		myChart.setOption(option);

        // @2nd Chart
        var ctxP = document.getElementById("labelChart").getContext('2d');

var myPieChart = new Chart(ctxP, {
  type: 'pie',
  data: {
    labels: ["Red", "Green"],
    datasets: [{
      data: [<?=$lastMonthSales;?>, <?=$purchase_last;?>],
      backgroundColor: ["#F7464A", "#46BFBD"],
      hoverBackgroundColor: ["#FF5A5E", "#5AD3D1"]
    }]
  },
  options: {
    responsive: true,
    legend: {
      position: 'right',
      labels: {
        padding: 20,
        boxWidth: 10
      }
    },
    plugins: {
      datalabels: {
        formatter: (value, ctx) => {
          let sum = 0;
          let dataArr = ctx.chart.data.datasets[0].data;
          dataArr.forEach(data => {
            sum += data;
          });
          let percentage = (value * 100 / sum).toFixed(2) + "%";
          return percentage;
        },
        color: 'white',
        labels: {
          title: {
            font: {
              size: '16'
            }
          }
        }
      }
    }
  }
});

//         var ctxP = document.getElementById("labelChart").getContext('2d');
// var myPieChart = new Chart(ctxP, {
//   plugins: [ChartDataLabels],
//   type: 'pie',
//   data: {
//     labels: ["Red", "Green"],
//     datasets: [{
//       //data: [210, 130],
//       data: [<?=$lastMonthSales;?>, <?=$purchase_last;?>],
//       backgroundColor: ["#F7464A", "#46BFBD"],
//       hoverBackgroundColor: ["#FF5A5E", "#5AD3D1"]
//     }]
//   },
//   options: {
//     responsive: true,
//     legend: {
//       position: 'right',
//       labels: {
//         padding: 20,
//         boxWidth: 10
//       }
//     },
//     plugins: {
//       datalabels: {
//         formatter: (value, ctx) => {
//           let sum = 0;
//           let dataArr = ctx.chart.data.datasets[0].data;
//           dataArr.map(data => {
//             sum += data;
//           });
//           let percentage = (value * 100 / sum).toFixed(2) + "%";
//           return percentage;
//         },
//         color: 'white',
//         labels: {
//           title: {
//             font: {
//               size: '16'
//             }
//           }
//         }
//       }
//     }
//   }
// });
    </script>