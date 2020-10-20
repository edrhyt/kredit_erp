<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function inpt($class,$type,$names,$placeholder,$values,$style){
	 return "<div class='$class'><input type='$type' name='$names' placeholder='$placeholder' class='form-control' value='$values' style='$style' required></div>";
	}

	function btn($class,$classbtn,$type,$names,$values,$style){
		return "<div class='$class'><button class='btn $classbtn' type='$type' name='$names' style='$style'>$values</button></div>";
	}

	function srcjs($src){
		$base = base_url();
		return "<script src='$base"."assets/$src'></script>";
	}

	function srccss($src){
		$base = base_url();
		return "<link rel='stylesheet' type='text/css' href='$base"."assets/$src'>";
	}
