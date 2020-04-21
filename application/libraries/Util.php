<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Util {

    public function format_sqldate_to_fin($paivays)
    {        
        $temp=strtotime($paivays);
        return date('d.m.Y H.i',$temp);
    }
    
}