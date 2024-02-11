@php
    $title_page=__('admin/users/index.title');
@endphp
@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<!-- breadcrumb -->
	<x-bread-crumb :breads="[
			['url' => url('/admin') , 'title' => __('main.dashboard') , 'isactive' => false],
			['url' => route('admin.users.index') , 'title' => __('admin/users/index.title') , 'isactive' => true],
		]">
		</x-bread-crumb>
	<!-- /breadcrumb -->
	<div class="col-12 col-lg-12 p-0 main-box">
		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-users"></span>	{{__('admin/users/index.title')}}
				</div>
				<div class="col-12 col-lg-4 p-0">
				</div>
				<div class="col-12 col-lg-4 p-2 text-lg-end" style="<?php if(app()->getLocale() == 'en'){echo 'text-align: right !important;';} ?>">
					@can('users-create')
					<a href="{{route('admin.users.create')}}">
					<span class="btn btn-primary"><span class="fas fa-plus"></span> {{__('main.create')}} </span>
					</a>
					@endcan
				</div>
			</div>
			<div class="col-12 divider" style="min-height: 2px;"></div>
		</div>

		<div class="col-12 py-2 px-2 row">
			<div class="col-12 col-lg-4 p-2">
				<form method="GET">
					<input type="text" name="q" class="form-control" placeholder="بحث ... " value="{{request()->get('q')}}">
				</form>
			</div>
		</div>
		<div class="col-12 p-3" style="overflow:auto">
			<div class="col-12 p-0" style="min-height: 600px;">
				
			
			<table class="table table-bordered  table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>{{__('admin/users/index.last_active')}}</th>
						<th>{{__('admin/users/index.name')}}</th>
						<th>{{__('admin/users/index.email')}}</th>
						<th>{{__('admin/users/index.tickets')}}</th>
						<th>{{__('admin/users/index.comments')}}</th>
						
						<th>{{__('main.control')}}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
					<tr>
						<td>{{$user->id}}</td>
						<td>{{\Carbon::parse($user->last_activity)->diffForHumans()}}</td>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						@if(auth()->user()->can('contacts-read'))
						<td><a href="{{route('admin.contacts.index',['user_id'=>$user->id])}}">{{$user->contacts_count}}</a></td>
						@endif
						@if(auth()->user()->can('comments-read'))
						<td><a href="{{route('admin.article-comments.index',['user_id'=>$user->id])}}">{{$user->comments_count}}</a></td>
						@endif
					
						<td>
							@can('users-read')
							<a href="{{route('admin.users.show',$user)}}">
							<span class="btn  btn-outline-primary btn-sm font-small mx-1">
								<span class="fas fa-search "></span> {{__('main.show')}}
							</span>
							</a>
							@endcan

							
							

							@can('notifications-create')
							<a href="{{route('admin.notifications.index',['user_id'=>$user->id])}}">
							<span class="btn  btn-outline-primary btn-sm font-small mx-1">
								<span class="far fa-bells"></span> {{__('main.notifications')}}
							</span>
							</a>
							<a href="{{route('admin.notifications.create',['user_id'=>$user->id])}}">
							<span class="btn  btn-outline-primary btn-sm font-small mx-1">
								<span class="far fa-bell"></span>
							</span>
							</a> 
							@endcan

						
							
							@can('users-update')
							<a href="{{route('admin.admins.edit',$user)}}">
							<span class="btn  btn-outline-success btn-sm font-small mx-1">
								<span class="fas fa-wrench "></span> {{__('main.control')}}
							</span>
							</a>
							@endcan
							
						 						 
							@can('users-delete')
							<form method="POST" action="{{route('admin.admins.destroy',$user)}}" class="d-inline-block">@csrf @method("DELETE")
								<button class="btn  btn-outline-danger btn-sm font-small mx-1" onclick="var result = confirm('هل أنت متأكد من عملية الحذف ؟');if(result){}else{event.preventDefault()}">
									<span class="fas fa-trash "></span> {{__('main.delete')}}
								</button>
							</form>
							@endcan



							<div class="dropdown d-inline-block">
								<button class="py-1 px-2 btn btn-outline-primary font-small" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="true">
								<span class="fas fa-bars"></span>
								</button>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" data-popper-placement="bottom-start" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 29px, 0px);">
								@can('users-update')
								<li><a class="dropdown-item font-1" href="{{route('admin.users.access',$user)}}"><span class="fal fa-eye"></span> {{__('main.access')}}</a></li>
								@endcan

 

								@can('users-update')
								<li><a class="dropdown-item font-1" href="{{route('admin.traffics.logs',['user_id'=>$user->id])}}"><span class="fal fa-boxes"></span> {{__('main.traffics')}} <span class="badge bg-danger">{{$user->logs_count}}</span></a></li>
								@endcan
								</ul>
								</div>


						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			</div>
		</div>
		<div class="col-12 p-3">
			{{$users->appends(request()->query())->render()}}
		</div>
	</div>
</div>
@endsection
