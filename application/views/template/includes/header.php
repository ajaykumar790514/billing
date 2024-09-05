<?php
if($this->session->MName=='' || $this->session->MLogin==false)
{
    $this->session->set_flashdata('msg', 'Your session has been expired');
    redirect(base_url().'login/index');
}
$user=$this->admin_model->getRow('admins',['id'=>$_SESSION['MUserId']]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?=$title;?></title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="Billing Management System" />
      <meta name="keywords" content="Billing Management System" />
      <meta name="author" content="Billing Management System" />
      <!-- Favicon icon -->
      <link rel="icon" href="<?php echo base_url();?>assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap/css/bootstrap.min.css">
      <!-- waves.css -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- themify icon -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/icon/themify-icons/themify-icons.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/icon/font-awesome/css/font-awesome.min.css">
      <!-- scrollbar.css -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/jquery.mCustomScrollbar.css">
        <!-- am chart export.css -->
        <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">

      <link rel="stylesheet" href="<?php echo base_url();?>assets/validate/toastr.css" />

    <link rel="stylesheet" href="<?php echo base_url();?>assets/validate/toastr.min.css" />

    <link rel="stylesheet" href="<?php echo base_url();?>assets/validate/select2.min.css" />

    <link rel="stylesheet" href="<?php echo base_url();?>assets/validate/sweetalert.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <!-- Include Parsley CSS from CDN -->
<link rel="stylesheet" href="https://parsleyjs.org/src/parsley.css">
<script src="https://cdn.jsdelivr.net/npm/echarts@5.2.2/dist/echarts.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Include Chart Data Labels plugin -->
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>chat-assets/css/message/messagestyle.css">
  
  </head>

  <body>
  <!-- Pre-loader start -->
  <div class="theme-loader">
      <div class="loader-track">
          <div class="preloader-wrapper">
              <div class="spinner-layer spinner-blue">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
              <div class="spinner-layer spinner-red">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-yellow">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-green">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Pre-loader end -->
  <div id="pcoded" class="pcoded">
      <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">
          <nav class="navbar header-navbar pcoded-header">
              <div class="navbar-wrapper">
                  <div class="navbar-logo">
                      <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                          <i class="ti-menu"></i>
                      </a>
                      <div class="mobile-search waves-effect waves-light">
                          <div class="header-search">
                              <div class="main-search morphsearch-search">
                                  <div class="input-group">
                                      <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                      <input type="text" class="form-control" placeholder="Enter Keyword">
                                      <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <a href="<?=base_url('dashboard');?>">
                          <!-- <img class="img-fluid" src="<?php echo base_url();?>assets/images/logo.png" alt="Theme-Logo" /> -->
                          <h2 style="font-style: italic;margin-left:40px;">Zill</h2>
                      </a>
                      <a class="mobile-options waves-effect waves-light">
                          <i class="ti-more"></i>
                      </a>
                  </div>
                
                  <div class="navbar-container container-fluid">
                      <ul class="nav-left">
                          <li>
                              <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                          </li>
                          <li class="header-search">
                              <div class="main-search morphsearch-search">
                                  <div class="input-group">
                                      <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                      <input type="text" class="form-control">
                                      <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                  </div>
                              </div>
                          </li>
                          <li>
                              <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                  <i class="ti-fullscreen"></i>
                              </a>
                          </li>
                      </ul>
                      <ul class="nav-right">
                          <li class="header-notification">
                              <a href="#!" class="waves-effect waves-light">
                                  <i class="ti-bell"></i>
                                  <span class="badge bg-c-red"></span>
                              </a>
                              <ul class="show-notification">
                                  <li>
                                      <h6>Notifications</h6>
                                      <label class="label label-danger">New</label>
                                  </li>
                                  <li class="waves-effect waves-light">
                                      <div class="media">
                                          <img class="d-flex align-self-center img-radius" src="<?php echo base_url();?>assets/images/avatar-2.jpg" alt="Generic placeholder image">
                                          <div class="media-body">
                                              <h5 class="notification-user">HRM</h5>
                                              <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                              <span class="notification-time">30 minutes ago</span>
                                          </div>
                                      </div>
                                  </li>
                                  <li class="waves-effect waves-light">
                                      <div class="media">
                                          <img class="d-flex align-self-center img-radius" src="<?php echo base_url();?>assets/images/avatar-4.jpg" alt="Generic placeholder image">
                                          <div class="media-body">
                                              <h5 class="notification-user">Joseph William</h5>
                                              <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                              <span class="notification-time">30 minutes ago</span>
                                          </div>
                                      </div>
                                  </li>
                                  <li class="waves-effect waves-light">
                                      <div class="media">
                                          <img class="d-flex align-self-center img-radius" src="<?php echo base_url();?>assets/images/avatar-3.jpg" alt="Generic placeholder image">
                                          <div class="media-body">
                                              <h5 class="notification-user">Sara Soudein</h5>
                                              <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                              <span class="notification-time">30 minutes ago</span>
                                          </div>
                                      </div>
                                  </li>
                              </ul>
                          </li>
                          <li class="user-profile header-notification">
                              <a href="#!" class="waves-effect waves-light">
                                  <img src="<?php echo IMGS_URL.$user->logo ;?>" class="img-radius" alt="User-Profile-Image" style="border-radius:50%">
                                  <span><?=$_SESSION['MName'];?></span>
                                  <i class="ti-angle-down"></i>
                              </a>
                              <ul class="show-notification profile-notification">
                                  <!-- <li class="waves-effect waves-light">
                                      <a href="#!">
                                          <i class="ti-settings"></i> Settings
                                      </a>
                                  </li> -->
                                  <li class="waves-effect waves-light">
                                      <a href="<?=base_url('user-profile');?>">
                                          <i class="ti-user"></i> Profile
                                      </a>
                                  </li>
                                  <!-- <li class="waves-effect waves-light">
                                      <a href="email-inbox.html">
                                          <i class="ti-email"></i> My Messages
                                      </a>
                                  </li> -->
                                  <!-- <li class="waves-effect waves-light">
                                      <a href="auth-lock-screen.html">
                                          <i class="ti-lock"></i> Lock Screen
                                      </a>
                                  </li> -->
                                  <li class="waves-effect waves-light">
                                      <a href="<?php echo base_url().'login/logout';?>">
                                          <i class="ti-layout-sidebar-left"></i> Logout
                                      </a>
                                  </li>
                              </ul>
                          </li>
                      </ul>
                  </div>
              </div>
          </nav>

          <div class="pcoded-main-container">
              <div class="pcoded-wrapper">
                  <nav class="pcoded-navbar">
                      <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                      <div class="pcoded-inner-navbar main-menu">
                          <div class="">
                              <div class="main-menu-header">
                                  <img class="img-80 img-radius" src="<?php echo IMGS_URL.$user->logo ;?>" alt="User-Profile-Image">
                                  <div class="user-details">
                                      <span id="more-details"><?=$_SESSION['MName'];?><i class="fa fa-caret-down"></i></span>
                                  </div>
                              </div>
        
                              <div class="main-menu-content">
                                  <ul>
                                      <li class="more-details">
                                          <a href="<?=base_url('user-profile');?>"><i class="ti-user"></i>View Profile</a>
                                          <!-- <a href="#!"><i class="ti-settings"></i>Settings</a> -->
                                          <a href="<?=base_url().'login/logout';?>"><i class="ti-layout-sidebar-left"></i>Logout</a>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                          <!-- <div class="p-15 p-b-0">
                              <form class="form-material">
                                  <div class="form-group form-primary">
                                      <input type="text" name="footer-email" class="form-control" required="">
                                      <span class="form-bar"></span>
                                      <label class="float-label"><i class="fa fa-search m-r-10"></i>Search Friend</label>
                                  </div>
                              </form>
                          </div> -->
                          <div class="pcoded-navigation-label" data-i18n="nav.category.navigation"></div>
                          <ul class="pcoded-item pcoded-left-item">
                              <li class="active">
                                  <a href="<?=base_url().'dashboard';?>" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-home"></i><b></b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                                </li>
                                <li class="pcoded-hasmenu">
                                  <a href="javascript:void(0)" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                      <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">HRM</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                                  <ul class="pcoded-submenu">
                                  <li class="">
                                          <a href="<?=base_url().'department';?>" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Department Master</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
                                      <li class="">
                                          <a href="<?=base_url().'employees';?>" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Employees List</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
                                      <li class=" ">
                                          <a href="<?=base_url('attendence');?>" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Attendence Punch</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
                                      <!-- <li class="">
                                            <a href="<?php echo base_url().'holiday-master';?>" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                                <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Holiday Master</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li> -->
                                    </ul>
                                </li>
                                <li class="pcoded-hasmenu">
                                  <a href="javascript:void(0)" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                      <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Inventory</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                                  <ul class="pcoded-submenu">
                                  <li class="">
                                          <a href="<?=base_url().'category-master';?>" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Category Master</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
                                      <li class="">
                                          <a href="<?=base_url().'subcategory-master';?>" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Sub Category Master</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
                                      <li class=" ">
                                          <a href="<?=base_url('product-master');?>" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Product Master</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
                                    </ul>
                                </li>
                                <li class="pcoded-hasmenu">
                                  <a href="javascript:void(0)" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                      <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Contacts</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                                  <ul class="pcoded-submenu">
                                  <li class="">
                                          <a href="<?=base_url('customer');?>" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Add Customer</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
                                      <li class="">
                                          <a href="<?=base_url('customer/list');?>" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Customers List</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
                                      <li class=" ">
                                          <a href="<?=base_url('supplier');?>" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Add Supplier</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
                                      <li class=" ">
                                          <a href="<?=base_url('supplier/list');?>" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Suppliers List</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
                                    </ul>
                                </li>
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Billing</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                        <a href="<?=base_url('client-billing');?>" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                            <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Client Billing</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                        </li>
                                        <li class=" ">
                                        <a href="<?=base_url('billing');?>" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                            <span class="pcoded-mtext"  data-i18n="nav.basic-components.main"> Normal Billing</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                        </li>
                                    </ul>
                                </li>
                                
                                <!-- <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Accounting</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="<?=base_url('employees-payout');?>" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                                <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Employees Payout</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="<?=base_url('total-collection');?>" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                                <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Total Collection</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                   
                                </li> -->
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Purchase</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                        <a href="<?=base_url('purchase-master');?>" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                            <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Add Purchase</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                        </li>
                                        <li class=" ">
                                        <a href="<?=base_url('manage-purchase');?>" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                            <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Manage Purchase</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                        </li>
                                    </ul>
                                    <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Accounts</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                    
                                    <li class=" ">
                                            <a href="<?=base_url('create-root-account');?>" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                                <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Create Root Account</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="<?=base_url('create-account');?>" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                                <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Create Account</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="<?=base_url('manage-account');?>" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                                <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Manage Account</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="<?=base_url('payment');?>" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                                <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Payment</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="<?=base_url('manage-transition');?>" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                                <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Manage Transation</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="<?=base_url('employees-payout');?>" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                                <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Employees Payout</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="<?=base_url('total-collection');?>" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                                <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Total Collection</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Expense</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                       
                                        <li class=" ">
                                            <a href="<?=base_url('expense-item');?>" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                                <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Expense Item</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="<?=base_url('add-expense');?>" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                                <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Add Expense</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="<?=base_url('manage-expense');?>" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                                <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Manage Expense</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="<?=base_url('expense-statement');?>" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                                <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Expense Statement</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </li>
                                
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Reports</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                        <a href="<?=base_url('client-sales');?>" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                            <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Client Sales</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                        </li>
                                        <li class=" ">
                                        <a href="<?=base_url('normal-sales');?>" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                            <span class="pcoded-mtext"  data-i18n="nav.basic-components.main"> Normal Sales</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="pcoded-hasmenu">
                                    <a href="<?=base_url();?>admin-chat" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Chats</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                  