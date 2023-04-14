<?php

use App\Models\Role;

function getAccess($menu_id, $role_id)
{
    return DB::table('menu_role')->where('menu_id', $menu_id)->where('role_id', $role_id)->get();
}

function extensi($file)
{
    $arr_str = explode(".",$file);
    $last_arr = end($arr_str);
    return $last_arr;
}

function check_access($role)
{
    if($role == 1 OR $role == 2){
        return true;
    }else{
        return false;
    }
}
