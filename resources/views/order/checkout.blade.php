@section('meta_og_title',trans('global.cart'))
@section('meta_robots','noindex,nofollow')

@extends('layouts/app')

@section('content')
			<section class="breadcrumb-section bg-light">
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb py-2 py-lg-3">
								<li class="breadcrumb-item">
					<a href="{{route('shop.index')}}">Дома</a>
				</li>
								<li class="breadcrumb-item">
					<a href="{{route('shop.products')}}">Производи</a>
				</li>
								<li class="breadcrumb-item active" aria-current="page">Кошничка</li>
			</ol>
		</nav>
	</div>
</section>
<?php
/*
$clientId = "180000114";			//Merchant Id defined by bank to user
$amount = $data->total_order;					//Transaction amount
$oid = $data->code;							//Order Id. Must be unique. If left blank, system will generate a unique one.
$okUrl = route('shop.ok.payment');		//URL which client be redirected if authentication is successful
$failUrl =  route('shop.nok.payment');		//URL which client be redirected if authentication is not successful
$rnd = microtime();				//A random number, such as date/time
$currencyVal = "807";			//Currency code, 949 for TL, ISO_4217 standard
$storekey = "SKEY0000";			//Store key value, defined by bank.
$storetype = "3D_PAY_HOSTING";	//3D authentication model
$lang = "en";					//Language parameter, "tr" for Turkish (default), "en" for English 
$instalment = "";				//Instalment count, if there's no instalment should left blank
$transactionType = "Auth";		//transaction type	
*/


$clientId = "180000401";            //Merchant Id defined by bank to user
$amount = $data->total_order;                   //Transaction amount
$oid = $data->code;                         //Order Id. Must be unique. If left blank, system will generate a unique one.
$okUrl = route('shop.ok.payment');      //URL which client be redirected if authentication is successful
$failUrl =  route('shop.nok.payment');      //URL which client be redirected if authentication is not successful
$rnd = microtime();             //A random number, such as date/time
$currencyVal = "807";           //Currency code, 949 for TL, ISO_4217 standard
$storekey = "SKEY0401";         //Store key value, defined by bank.
$storetype = "3D_PAY_HOSTING";  //3D authentication model
$lang = "en";                   //Language parameter, "tr" for Turkish (default), "en" for English 
$instalment = "";               //Instalment count, if there's no instalment should left blank
$transactionType = "Auth";      //transaction type  

$hashstr = $clientId . $oid . $amount . $okUrl . $failUrl .$transactionType. $instalment .$rnd . $storekey;

$hash = base64_encode(pack('H*',sha1($hashstr)));

?>
    <form method="post" action="https://epay.halkbank.mk/fim/est3Dgate">
    <center>
        <h1 class="mt-5 mb-5">{{trans('global.confirmandpay')}}</h1>
        <div class="row">
            <div class="col-md-6 mx-auto">

                 @if(Session::has('msg'))
                    <p class="alert-v2 alert-v2-{{ Session::get('msg') }}">{{ Session::get('message') }}</p>
                    @endif
                    
        <table class="table table-hovered">
            <tr class="trHeader">
                <td><label>{{trans('global.fullname')}}</label></td>
                <td>{{$data->getclient->name}} {{$data->getclient->last_name}}</td>
            </tr>
            <tr>
                <td>{{trans('global.phone')}}</td>
                <td>+{{$data->getclient->phone}}</td>
            </tr>
            <tr>
                <td>{{trans('global.email')}}</td>
                <td>{{$data->getclient->email}}</td>
            </tr>
            <tr>
                <td>{{trans('global.addresstodeliver')}}</td>
                <td>{{$data->address_order}}</td>
            </tr>

            <tr>
                <td>{{trans('cart.total_price')}}</td>
                <td>{{formatprice($data->total_order_nodiscount +$data->deliveryprice)}} MKD</td>
            </tr>
            <tr>
                <td>{{trans('cart.isporaka')}}</td>
                <td>{{formatprice($data->deliveryprice)}} MKD</td>
            </tr>
            <tr>
                <td>{{trans('cart.discount')}}</td>
                <td>{{formatprice($data->total_order_nodiscount+$data->deliveryprice-$data->total_order)}} MKD</td>
            </tr>
            <tr>
                <th>{{trans('cart.total_price')}}</th>
                <th>{{formatprice($data->total_order)}} MKD</th>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <input type="submit" value="{{trans('global.continuetopay')}}" class="btn mt-3 mb-5 btn-secondary buttonClass" />
                </td>
            </tr>
        </table>
        <input type="hidden" name="encoding" value="UTF-8">
        <input type="hidden" name="clientid" value="<?php echo $clientId; ?>" />
        <input type="hidden" name="amount" value="<?php echo $amount; ?>" />
		<input type="hidden" name="islemtipi" value="<?php echo $transactionType; ?>" />
		<input type="hidden" name="taksit" value="<?php echo $instalment; ?>" />

        <input type="hidden" name="oid" value="<?php echo $oid; ?>" />
        <input type="hidden" name="okUrl" value="<?php echo $okUrl; ?>" />
        <input type="hidden" name="failUrl" value="<?php echo $failUrl; ?>" />
        <input type="hidden" name="rnd" value="<?php echo $rnd; ?>" />
        <input type="hidden" name="hash" value="<?php echo $hash; ?>" />
        <input type="hidden" name="storetype" value="<?php echo $storetype; ?>" />
        <input type="hidden" name="lang" value="<?php echo $lang; ?>" />
        <input type="hidden" name="currency" value="<?php echo $currencyVal; ?>" />
		 <input type="hidden" name="refreshtime" value="5" />
        </div></div>
    </center>
    </form>
@endsection