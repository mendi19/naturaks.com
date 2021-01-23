@component('mail::message')
<?php 



foreach ($data as $key => $value) {
	if($key != '_token' && $key != '_method'){
		echo ucfirst($key).": ".$value."<br>";
	}
}
?>



Thanks,<br>
{{ config('app.name') }}
@endcomponent
