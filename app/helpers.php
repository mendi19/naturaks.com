<?php
function featured_image_v2($id,$featured_image,$type)
{	

	$url = asset('images/no-photo.png');
	if(is_array($featured_image) && !empty($featured_image))
	{
		if(!empty($featured_image))
		{
			if($type =='lg' && !isset($featured_image[0][$type])){
					$type = 'sm';
				}
			if(!isset($featured_image[0]['path']))
			{
				$url = \Config::get('app.root_link_images')."/".$featured_image[0][$type];
			}else{
				$url = \Config::get('app.root_link_images')."".$featured_image[0]['path']."/".$featured_image[0][$type];
			}
		}
	}else{
		/*if($image != ''){
			$url = URL::to('/').$image;
		}*/
	}

	return $url;
}


function featured_image_v3($id,$featured_image,$type)
{	
	
	$url = asset('images/no-photo.png');
	if(is_array($featured_image) && !empty($featured_image))
	{
		if(!empty($featured_image))
		{
			if($type =='lg' && !isset($featured_image[$type])){
					$type = 'sm';
				}
			if(!isset($featured_image['path']))
			{	
				$url = \Config::get('app.root_link_images')."/".$featured_image[$type];
			}else{
				$url = \Config::get('app.root_link_images')."".$featured_image['path']."/".$featured_image[$type];
			}
		}
	}else{
		/*if($image != ''){
			$url = URL::to('/').$image;
		}*/
	}

	return $url;
}

function formatprice($price){return number_format($price,2, ',','.');}
function formamtnumberwithoutround($amount){return number_format(floor($amount),2);}
function getfinalprice($price,$discountedprice,$validyesno,$expirydate_start,$expirydate_end,$expirydate_limitedyesno,$discount_kolicina,$discount_kolicina_nolimit,$currency)
{

	if($validyesno  == 1){

		if($expirydate_limitedyesno == 1 && $discount_kolicina_nolimit == 1){
			return $discountedprice;
		}

		if($expirydate_limitedyesno == 0){
			
			if(($discount_kolicina_nolimit == 0 && $discount_kolicina > 0) || $discount_kolicina_nolimit == 1){
				if(\Carbon::now()->format('Y-m-d H:m:i') >= \Carbon::parse($expirydate_start) && \Carbon::now()->format('Y-m-d H:m:i') <= \Carbon::parse($expirydate_end)){
					return $discountedprice;
				}
			}
		}

		if($expirydate_limitedyesno == 1 && $discount_kolicina_nolimit == 0){
			if($discount_kolicina > 0){
				return $discountedprice;
			}
		}
	}

	return $price;
}

function displayfinalprice($price,$discountedprice,$validyesno,$expirydate_start,$expirydate_end,$expirydate_limitedyesno,$discount_kolicina,$discount_kolicina_nolimit,$currency)
{
	$current_currency = $currency;

	if($validyesno  == 1){

		if($expirydate_limitedyesno == 1 && $discount_kolicina_nolimit == 1){
			return formatprice($discountedprice).' '.$currency;
		}

		if($expirydate_limitedyesno == 0){
			
			if(($discount_kolicina_nolimit == 0 && $discount_kolicina > 0) || $discount_kolicina_nolimit == 1){
				if(\Carbon::now()->format('Y-m-d H:m:i') >= \Carbon::parse($expirydate_start) && \Carbon::now()->format('Y-m-d H:m:i') <= \Carbon::parse($expirydate_end)){
					return formatprice($discountedprice).' '.$currency;
				}
			}
		}

		if($expirydate_limitedyesno == 1 && $discount_kolicina_nolimit == 0){
			if($discount_kolicina > 0){
				return formatprice($discountedprice).' '.$currency;
			}
		}
	}

	return formatprice($price).' '.$currency;
}


function createCodeProductv22($precode,$maxlength,$currentcode){

	$currentcode= ltrim($currentcode, '0');
	$length_currentcode =  strlen($currentcode);

	$remaining = $maxlength - $length_currentcode;
	$zeros = "";
	for ($i=0; $i < $remaining; $i++) { 
		$zeros.="0";
	}
	$string = $precode.$zeros.$currentcode;
	return $string;
}



function convertDateFormat($dateformat){
	$splitdate = explode(".", $dateformat);
	$makeNewDate = $splitdate[2]."-".$splitdate[1]."-".$splitdate[0];
	return $makeNewDate;
}

function convertDateFormatwithslash($dateformat){
	$splitdate = explode("/", $dateformat);
	$makeNewDate = $splitdate[2]."-".$splitdate[1]."-".$splitdate[0];
	return $makeNewDate;
}

function reConvertDateFormat($dateformat){
	//$splitdate = explode("-", $dateformat);
	$splitdate = explode("-", $dateformat);
	$month=0;$year=0;$day=0;
	if(isset($splitdate[0])){$year = $splitdate[0];}
	if(isset($splitdate[1])){$month = $splitdate[1];}
	if(isset($splitdate[2])){$day = $splitdate[2];}
	$makeNewDate = $day.".".$month.".".$year;
	//$makeNewDate = $splitdate[2].".".$splitdate[1].".".$splitdate[0];
	return $makeNewDate;
}

function reConvertDateFormatremovedtime($dateformat){
	$splitbig = explode(" ", $dateformat);
	$month=0;$year=0;$day=0;$time="";

	$splitdate = explode("-", $splitbig[0]);

	if(isset($splitdate[0])){$year = $splitdate[0];}
	if(isset($splitdate[1])){$month = $splitdate[1];}
	if(isset($splitdate[2])){$day = $splitdate[2];}
	if(isset($splitbig[1])){$time = $splitbig[1];}	

	$makeNewDate = $day.".".$month.".".$year;
	return $makeNewDate;
}

function reConvertDateFormatwithtime($dateformat){
	$splitbig = explode(" ", $dateformat);
	$month=0;$year=0;$day=0;$time="";

	$splitdate = explode("-", $splitbig[0]);
	if(isset($splitdate[0])){$year = $splitdate[0];}
	if(isset($splitdate[1])){$month = $splitdate[1];}
	if(isset($splitdate[2])){$day = $splitdate[2];}
	if(isset($splitbig[1])){$time = $splitbig[1];}	
	$makeNewDate = $day.".".$month.".".$year." ".$time;
	return $makeNewDate;
}

function getjustdatefromdatetime($dateformat){
	$splitdate = explode(" ", $dateformat);
	$month=0;$year=0;$day=0;
	if(isset($splitdate[0])){
		$exlll = explode("-", $splitdate[0]);
		if(isset($exlll[0])){$year = $exlll[0];}
		if(isset($exlll[1])){$month = $exlll[1];}
		if(isset($exlll[2])){$day = $exlll[2];}
	}
	$makeNewDate = $year."-".$month."-".$day;
	return $makeNewDate;
}

function getjusttimefromdatetime($dateformat){
	$splitdate = explode(" ", $dateformat);
	$hour='';$min='';
	if(isset($splitdate[1])){
		$exlll = explode(":", $splitdate[1]);
		if(isset($exlll[0])){$hour = $exlll[0];}
		if(isset($exlll[1])){$min = $exlll[1];}

	}
	$makeNewDate = $hour.":".$min;
	return $makeNewDate;
}

function validateDate($date, $format = 'Y-m-d'){
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}
function checkifhasimage($image){
	$default = "https://mkb.mk/wp-content/themes/consultix/images/no-image-found-360x250.png";
	if($image != ''){
		$default = \Config::get('app.root_link_images').$image;
	}
	return $default;
}

function addprefixbasedDomain($domain,$lastnumbers){
	$lastnumbers = substr($lastnumbers,4);

	if (substr($lastnumbers,0,1)=="0"){
		$lastnumbers = substr($lastnumbers,1);
	}

	if($domain == 3){
		return "389".$lastnumbers;
	}else if($domain == 10){
		return "387".$lastnumbers;
	}else if($domain == 11){
		return "355".$lastnumbers;
	}else if($domain == 12){
		return "383".$lastnumbers;
	}else{
		return str_replace("+","",$lastnumbers);
	}
}

?>