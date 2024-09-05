<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
if (! function_exists('date_time')) {
    function date_time($date)
    {
        return date('d M Y H:i A',strtotime($date));
    }
}

if (! function_exists('_date')) {
    function _date($date)
    {
        return (@$date) ? date('d M Y',strtotime($date)) : '';
    }
}
if (!function_exists('_number_format')) {
    function _number_format($number)
    {
        return number_format($number, 2, '.', '');
    }
}

function _time($time)
{
    return (@$time) ? date('h:i A',strtotime($time)) : '';
}

function _days_diff($date1,$date2)
{
    $diff = strtotime($date2) - strtotime($date1);
    return round($diff / 86400);
}
function time_diff($start_time,$end_time) {
    // Set the time zones
$timezone = new DateTimeZone('UTC'); // You can change this to your desired time zone

// Create two DateTime objects with the timestamps you want to compare
$datetime1 = new DateTime($start_time, $timezone);
$datetime2 = new DateTime($end_time, $timezone);

// Calculate the difference between the two DateTime objects
$interval = $datetime1->diff($datetime2);

// Output the difference
return $interval->format('%H : %i : %s ');
    
}

if (!function_exists('total_category')) {
    function total_category($table_name) {
        // Get CodeIgniter instance
        $CI =& get_instance();

        // Load the database library
        $CI->load->database();

        // Query to get the total number of rows in the specified table
        $CI->db->where('is_deleted', 'NOT_DELETED');
        $CI->db->where('status', 1);
        $CI->db->where('is_parent', 0);

        $query = $CI->db->get($table_name);
        $total_rows = $query->num_rows();

        return $total_rows;
    }
}
if (!function_exists('total_subcategory')) {
    function total_subcategory($table_name) {
        // Get CodeIgniter instance
        $CI =& get_instance();

        // Load the database library
        $CI->load->database();

        // Query to get the total number of rows in the specified table
        $CI->db->where('is_deleted', 'NOT_DELETED');
        $CI->db->where('status', 1);
        $CI->db->where('is_parent', 0);

        $query = $CI->db->get($table_name);
        $total_rows = $query->num_rows();

        return $total_rows;
    }
}
if (!function_exists('total_rows')) {
    function total_rows($table_name) {
        // Get CodeIgniter instance
        $CI =& get_instance();

        // Load the database library
        $CI->load->database();

        // Query to get the total number of rows in the specified table
        $CI->db->where('is_deleted', 'NOT_DELETED');
        $CI->db->where('status', 1);

        $query = $CI->db->get($table_name);
        $total_rows = $query->num_rows();

        return $total_rows;
    }
}
if (!function_exists('number_to_word')) {
    function number_to_word($number){
        $no = (int)floor($number);
        $point = (int)round(($number - $no) * 100);
        $hundred = null;
        $digits_1 = strlen($no);
        $i = 0;
        $str = array();
        $words = array('0' => '', '1' => 'one', '2' => 'two',
         '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
         '7' => 'seven', '8' => 'eight', '9' => 'nine',
         '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
         '13' => 'thirteen', '14' => 'fourteen',
         '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
         '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
         '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
         '60' => 'sixty', '70' => 'seventy',
         '80' => 'eighty', '90' => 'ninety');
        $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
        while ($i < $digits_1) {
          $divider = ($i == 2) ? 10 : 100;
          $number = floor($no % $divider);
          $no = floor($no / $divider);
          $i += ($divider == 10) ? 1 : 2;
     
     
          if ($number) {
             $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
             $hundred = ($counter == 1 && $str[0]) ? null : null;
             $str [] = ($number < 21) ? $words[$number] .
                 " " . $digits[$counter] . $plural . " " . $hundred
                 :
                 $words[floor($number / 10) * 10]
                 . " " . $words[$number % 10] . " "
                 . $digits[$counter] . $plural . " " . $hundred;
          } else $str[] = null;
       }
       $str = array_reverse($str);
       $result = implode('', $str);
     
     
       if ($point > 20) {
         $points = ($point) ?
           "" . $words[floor($point / 10) * 10] . " " . 
               $words[$point = $point % 10] : ''; 
       } else {
           $points = $words[$point];
       }
       if($points != ''){        
           echo ucwords($result . "Rupees and " . $points . " Paise Only");
       } else {
     
           echo ucwords($result . "Rupees Only");
       }
     
     }
    }
if (!function_exists('get_month_name')) {
    function get_month_name($month_number) {
        // $month_number = ltrim($month_number, '0'); // Remove leading zeros

        $month_names = [
            '01' => "January", '02' => "February", '03' => "March", '04' => "April",
            '05' => "May", '06' => "June", '07' => "July", '08' => "August",
            '09' => "September", '10' => "October", '11' => "November", '12' => "December"
        ];

        return isset($month_names[$month_number]) ? $month_names[$month_number] : "Invalid month number";
    }
}

if (!function_exists('get_month_number')) {
    function get_month_number($month_name) {
        $month_names = [
            '01' => "January", '02' => "February", '03' => "March", '04' => "April",
            '05' => "May", '06' => "June", '07' => "July", '08' => "August",
            '09' => "September", '10' => "October", '11' => "November", '12' => "December"
        ];

        $month_name = ucfirst(strtolower($month_name));

        return array_search($month_name, $month_names) ?: "Invalid month name";
    }
}
if (!function_exists('getSup')) {
    function getSup($supplier_id) {
        $CI = &get_instance();
        $supplier_name = $CI->Admin_model->getRow('suppliers',$supplier_id); 

        return $supplier_name->name;
    }
}
if (!function_exists('getCustomer')) {
    function getCustomer($customers_id) {
        $CI = &get_instance();
        $customers = $CI->Admin_model->getRow('customers',$customers_id); 

        return $customers->name;
    }
}
