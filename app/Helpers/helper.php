<?php
define('SUCCESS_MSG', 'Data Stored Successfully!');
define('UPDATE_MSG', 'Data Updated Successfully!');
define('DELETE_MSG', 'Data Deleted Successfully!');
define('WARNING_MSG', 'Something went wrong!');

/*if (!function_exists('setNavigationActiveClass')) {

}*/

function setNavigationActiveClass($url)
{
    $status = '';
    if ($url == request()->is($url)) {
        $status = 'navActiveColor active';
    }

    return $status;
}