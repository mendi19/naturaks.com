@component('mail::message')
{!!trans('emails.success_order_content')!!}

<div class="col-md-12"></div>
<table width="100%">
		<tr>
		   <th width="15%">{{trans('global.image')}}</th> 
		   <th width="65%">{{trans('global.title')}}</th>
		   <th width="10%">{{trans('global.price')}}</th> 
		   <th width="10%">{{trans('global.qty')}}</th> 
		</tr>
	@if(isset($data->getorderdetails) && $data->getorderdetails->count()>0)
      @foreach($data->getorderdetails as $k => $v)
      <tr>
          <td>
            @if($v->product_id > 0)
                 <img src="{{featured_image_v2($v->getproduct->id,$v->getproduct->featured_image,'xs')}}" width="100%" /> 
            @endif
            @if($v->package_id > 0)
                 <img src="{{featured_image_v2($v->getpackage->id,$v->getpackage->featured_image,'xs')}}" width="100%"/> 
            @endif
          </td>
          <td>
            @if($v->product_id > 0)
               {{$v->getproduct->name}}
            @else
              {{$v->getpackage->name}}
            @endif
          </td>
          <td>{{formatprice($v->price_with_discount)}} @if(isset($data->getCourse)){{$data->getCourse->currency}}@endif
          </td>
          <td>{{$v->qty}}</td>
      </tr>
      @endforeach
@endif
</table>
@endcomponent
