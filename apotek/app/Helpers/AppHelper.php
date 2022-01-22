<?php 

namespace App\Helpers;

class AppHelper {
	public static function number_format($number) {
		$num_format = number_format($number, 0, ' ', '.'); 
		return $num_format;
	}

	public static function date_format($date) {
		$split = explode('-', $date);
		$date_format = $split[2].'/'.$split[1].'/'.$split[0];
		return $date_format;
	}
}
