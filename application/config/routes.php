<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['user-profile']  = 'Home/UserProfile';
$route['dashboard']  = 'Home/dashboard';

$route['hrm-dashboard']  = 'Home/HrmDashboard';
$route['employees']  = 'Home/EmpList';
$route['add-employee']  = 'Home/AddEmployee';
$route['insert-employee']  = 'Home/InsertEmployee';
$route['edit-employee/(:num)']  = 'Home/EditEmployee/$1';
$route['update-employee/(:num)']  = 'Home/UpdateEmployee/$1';
$route['delete-employee/(:num)']  = 'Home/DeleteEmp/$1';

$route['submit-emp-doc']  = 'Home/submit_emp_doc';

$route['attendence']  = 'Home/Attendence';
$route['insert-attendence']  = 'Home/InsertAttendence';
$route['att-punch-out/(:any)']  = 'Home/att_punch_out/$1';

$route['holiday-master']  = 'Home/holiday_master';

$route['department']  = 'Home/department';
$route['department/(:any)']  = 'Home/department/$1';
$route['department/(:any)/(:any)']  = 'Home/department/$1/$2';

$route['inventory-dashboard']  = 'Inventory/InventoryDashboard';
$route['category-master']  = 'Inventory/CategoryMaster';
$route['category-master/(:any)']  = 'Inventory/CategoryMaster/$1';
$route['category-master/(:any)/(:any)']  = 'Inventory/CategoryMaster/$1/$2';

$route['subcategory-master']  = 'Inventory/SubCategoryMaster';
$route['subcategory-master/(:any)']  = 'Inventory/SubCategoryMaster/$1';
$route['subcategory-master/(:any)/(:any)']  = 'Inventory/SubCategoryMaster/$1/$2';

$route['product-master']  = 'Inventory/ProductMaster';
$route['product-master/(:any)']  = 'Inventory/ProductMaster/$1';
$route['product-master/(:any)/(:any)']  = 'Inventory/ProductMaster/$1/$2';

$route['contacts-dashboard']  = 'Contact/ContactDashbaord';

$route['customer']  = 'Contact/Customer';
$route['customer/(:any)']  = 'Contact/Customer/$1';
$route['customer/(:any)/(:any)']  = 'Contact/Customer/$1/$2';

$route['supplier']  = 'Contact/Supplier';
$route['supplier/(:any)']  = 'Contact/Supplier/$1';
$route['supplier/(:any)/(:any)']  = 'Contact/Supplier/$1/$2';

$route['client-billing']  = 'Billing/Billing';
$route['billing']  = 'Billing/ProductBilling';
$route['client-invoice/(:any)']  = 'Billing/ClientInvoice/bill/$1';
$route['normal-invoice/(:any)']  = 'Billing/NormalInvoice/bill/$1';

$route['client-sales']  = 'Billing/ClientSales';
$route['normal-sales']  = 'Billing/NormalSales';

$route['employees-payout']  = 'Accounting/EmployeePayout';
$route['total-collection']  = 'Accounting/TotalCollection';

// Start:: Profile
$route['profile']		        	= 'profile/index';
$route['profile/(:any)']			= 'profile/index/$1';
// End:: Profile
$route['employees-details/(:any)']  = 'Accounting/EmployeeDetails/Details/$1';
$route['employees-details-save/(:any)']  = 'Accounting/EmployeeDetails/$1';
$route['employees-salary/(:any)']  = 'Accounting/SalaryInvoice/Slip/$1';

$route['purchase-master']  = 'Purchase/PurchaseMaster';
$route['manage-purchase']  = 'Purchase/ManagePurchase';

$route['create-root-account']  = 'Accounting/RootAccount';
$route['create-root-account/(:any)']  = 'Accounting/RootAccount/$1';
$route['create-root-account/(:any)/(:any)']  = 'Accounting/RootAccount/$1/$2';

$route['create-account']  = 'Accounting/CreateAccount';
$route['create-account/(:any)']  = 'Accounting/CreateAccount/$1';
$route['create-account/(:any)/(:any)']  = 'Accounting/CreateAccount/$1/$2';

$route['manage-account']  = 'Accounting/ManageAccount';
$route['manage-account/(:any)']  = 'Accounting/CreateAccount/$1';
$route['manage-account/(:any)/(:any)']  = 'Accounting/CreateAccount/$1/$2';

$route['payment']  = 'Accounting/Payment';
$route['manage-transition']  = 'Accounting/ManageTransition';

$route['expense-item']  = 'Expense/ExpenseItem';
$route['expense-item/(:any)']  = 'Expense/ExpenseItem/$1';
$route['expense-item/(:any)/(:any)']  = 'Expense/ExpenseItem/$1/$2';

$route['add-expense']  = 'Expense/AddExpense';
$route['add-expense/(:any)']  = 'Expense/AddExpense/$1';

$route['manage-expense']  = 'Expense/ManageExpense';
$route['expense-statement']  = 'Expense/ExpenseStatement';

// chat

$route['admin-chat']					= 'message/index';
$route['admin-allUser/allUser']					= 'message/allUser';
$route['admin-getIndividual/getIndividual']					= 'message/getIndividual';
$route['admin-getmessage/getmessage']					= 'message/getmessage';
$route['admin-setNoMessage/setNoMessage']					= 'message/setNoMessage';
$route['admin-ownerDetails/ownerDetails']					= 'message/ownerDetails';

$route['admin-sendMessage/sendMessage']					= 'message/sendMessage';

$route['chatApi']					= 'Api/chatApi';

$route['barcode/scanBarcode'] = 'Inventory/scanBarcode';
$route['ViewBarcode'] = 'Inventory/ViewBarcode';
