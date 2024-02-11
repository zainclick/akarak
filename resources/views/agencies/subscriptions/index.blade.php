@php
    $title_page=__('agencies/agents/index.title');
@endphp
@extends('layouts.agency')
@section('content')
<div class="col-12 p-3">
	<!-- breadcrumb -->
	<x-bread-crumb :breads="[
			['url' => url('/admin') , 'title' => __('agencies/agents/index.dashboard') , 'isactive' => false],
			['url' => route('admin.agents.index') , 'title' => __('agencies/agents/index.title') , 'isactive' => true],
		]">
		</x-bread-crumb>
	<!-- /breadcrumb -->
	<div class="col-12 col-lg-12 p-0 main-box">
		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-users"></span>	Subscriptions
				</div>
				<div class="col-12 col-lg-4 p-0">
				</div>
			
			</div>
			<div class="col-12 divider" style="min-height: 2px;"></div>
		</div>

		<div class="col-12 py-2 px-2 row">
			<div class="col-12 col-lg-4 p-2">
				<form method="GET">
					<input type="text" name="q" class="form-control" placeholder="{{__('agencies/agents/index.search')}}" value="{{request()->get('q')}}">
				</form>
			</div>
		</div>
		<div class="col-12 p-3" style="overflow:auto">
			<div class="col-12 p-0" style="min-height: 600px;">
				
			
			<table class="table table-bordered  table-hover">
				<thead>
					<tr>
						<th>Plan Name</th>
						<th>Price</th>
						<th>Plan Started At</th>
						<th>Plan Ends At</th>
						<th>Subscrip Status</th>
						<th>{{__('main.control')}}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($subscriptions as $subscription)
					<tr>
						<td>{{$subscription->plan->name}}</td>
						<td>{{$subscription->plan->amount ." ".'AED'}}</td>
						<td>{{$subscription->created_at->format('Y-m-d')}}</td>
						<td>{{$subscription->trial_ends_at->format('Y-m-d')}}</td>
						<td>
						<label class="switch">
						<input type="checkbox" <?php if($subscription->ends_at == null){echo 'checked';}?> name="sub_id" class="switcher" value="{{$subscription->type}}">
						<span class="slider round"></span>
						</label>
						</td>

						<td>
							<a target="_blank" href="{{route('agency-subscriptions-show',$subscription)}}">
							<span class="btn  btn-outline-primary btn-sm font-small mx-1">
								<span class="fas fa-search "></span> {{__('main.show')}}
							</span>
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			</div>
		</div>
		<div class="col-12 p-3">
			{{$subscriptions->appends(request()->query())->render()}}
		</div>
	</div>
</div>
@endsection

