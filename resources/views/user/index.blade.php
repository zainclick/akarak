@php
    $title_page=__('main.dashboard');
@endphp
@extends('layouts.user')
@section('content')
<div class="col-12 p-3 row">



<div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 my-2">
	<div class="col-12 px-0 py-1 d-flex main-box-wedit" >
		<div style="width: 65px;" class="p-2">
			<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #0194fe;color: #fff;border-radius: 50%;width: 55px;height:55px">
				<span class="fal fa-users font-5" ></span>
			</div>
		</div>
		<div style="width: calc(100% - 80px)" class="px-2 py-2">
			<a class="font-1"  href="{{route('agency-agents')}}" style="color: #212529">
				{{__('agencies/dashboard.agents')}}
				<h6 class="font-3">{{\App\Models\Backend\Agents::where('agency',auth('front-user')->user()->id)->count()}}</h6>
			</a>
		</div>
	</div>
</div>

<div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 my-2">
	<div class="col-12 px-0 py-1 d-flex main-box-wedit" >
		<div style="width: 65px;" class="p-2">
			<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #0194fe;color: #fff;border-radius: 50%;width: 55px;height:55px">
				<span class="fal fa-users font-5" ></span>
			</div>
		</div>
		<div style="width: calc(100% - 80px)" class="px-2 py-2">
			<a class="font-1"  href="{{route('agency-agents')}}" style="color: #212529">
				{{__('agencies/dashboard.pending_agents')}}
				<h6 class="font-3">{{\App\Models\Backend\Agents::where(['agency' => auth('front-user')->user()->id,'status' => 1])->count()}}</h6>
			</a>
		</div>
	</div>
</div>

<div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 my-2">
	<div class="col-12 px-0 py-1 d-flex main-box-wedit" >
		<div style="width: 65px;" class="p-2">
			<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #0194fe;color: #fff;border-radius: 50%;width: 55px;height:55px">
				<span class="fal fa-users font-5" ></span>
			</div>
		</div>
		<div style="width: calc(100% - 80px)" class="px-2 py-2">
			<a class="font-1"  href="{{route('agency-properties')}}" style="color: #212529">
				{{__('agencies/dashboard.properties')}}
				<h6 class="font-3">{{\App\Models\Backend\Properties::where(['agency' => auth('front-user')->user()->id,'activity_status' => 0])->count()}}</h6>
			</a>
		</div>
	</div>
</div>





<div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 my-2">
	<div class="col-12 px-0 py-1 d-flex main-box-wedit" >
		<div style="width: 65px;" class="p-2">
			<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #0194fe;color: #fff;border-radius: 50%;width: 55px;height:55px">
				<span class="fal fa-users font-5" ></span>
			</div>
		</div>
		<div style="width: calc(100% - 80px)" class="px-2 py-2">
			<a class="font-1"  href="{{route('admin.packages.index')}}" style="color: #212529">
				{{__('admin/dashboard.packages')}}
				<h6 class="font-3">{{\App\Models\Backend\Packages::count()}}</h6>
			</a>
		</div>
	</div>
</div>


<div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 my-2">
	<div class="col-12 px-0 py-1 d-flex main-box-wedit">
		<div style="width: 65px;" class="p-2">
			<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #0194fe;color: #fff; border-radius: 50%;width: 55px;height:55px">
				<span class="fal fa-phone font-5" ></span>
			</div>
		</div>
		<div style="width: calc(100% - 80px)" class="px-2 py-2">
			<a class="font-1" href="{{route('admin.contacts.index')}}" style="color: #212529;">
				{{__('admin/dashboard.categories')}}
				<h6 class="font-3">{{\App\Models\category::count()}}</h6>
			</a> 
		</div>
	</div>
</div>


<div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 my-2">
	<div class="col-12 px-0 py-1 d-flex main-box-wedit" >
		<div style="width: 65px;" class="p-2">
			<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #0194fe;color: #fff;border-radius: 50%;width: 55px;height:55px">
				<span class="fal fa-users font-5" ></span>
			</div>
		</div>
		<div style="width: calc(100% - 80px)" class="px-2 py-2">
			<a class="font-1"  href="" style="color: #212529">
				{{__('admin/dashboard.articals')}}
				<h6 class="font-3">{{\App\Models\Article::count()}}</h6>
			</a>
		</div>
	</div>
</div>


<div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 my-2">
	<div class="col-12 px-0 py-1 d-flex main-box-wedit" >
		<div style="width: 65px;" class="p-2">
			<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #0194fe;color: #fff;border-radius: 50%;width: 55px;height:55px">
				<span class="fal fa-users font-5" ></span>
			</div>
		</div>
		<div style="width: calc(100% - 80px)" class="px-2 py-2">
			<a class="font-1"  href="" style="color: #212529">
				{{__('admin/dashboard.contact')}}
				<h6 class="font-3">{{\App\Models\Contact::count()}}</h6>
			</a>
		</div>
	</div>
</div>




<div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 my-2">
	<div class="col-12 px-0 py-1 d-flex main-box-wedit">
		<div style="width: 65px;" class="p-2">
			<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #0194fe;color: #fff; border-radius: 50%;width: 55px;height:55px">
				<span class="fal fa-file font-5" ></span>
			</div>
		</div>
		<div style="width: calc(100% - 80px)" class="px-2 py-2">
			<a class="font-1" href="{{route('admin.files.index')}}" style="color: #212529;">
				{{__('admin/dashboard.files')}}
				<h6 class="font-3">{{\App\Models\HubFile::count()}}</h6>
			</a>
		</div>
	</div>
</div>


<div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 my-2">
	<div class="col-12 px-0 py-1 d-flex main-box-wedit">
		<div style="width: 65px;" class="p-2">
			<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #0194fe;color: #fff; border-radius: 50%;width: 55px;height:55px">
				<span class="fal fa-list font-5" ></span>
			</div>
		</div>
		<div style="width: calc(100% - 80px)" class="px-2 py-2">
			<a class="font-1" href="{{route('admin.menus.index')}}" style="color: #212529;">
				{{__('admin/dashboard.menues')}}
				<h6 class="font-3">{{\App\Models\Menu::count()}}</h6>
			</a>
		</div>
	</div>
</div>


<div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 my-2">
	<div class="col-12 px-0 py-1 d-flex main-box-wedit">
		<div style="width: 65px;" class="p-2">
			<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #0194fe;color: #fff; border-radius: 50%;width: 55px;height:55px">
				<span class="fal fa-file-invoice font-5" ></span>
			</div>
		</div>
		<div style="width: calc(100% - 80px)" class="px-2 py-2">
			<a class="font-1" href="{{route('admin.pages.index')}}" style="color: #212529;">
				{{__('admin/dashboard.pages')}}
				<h6 class="font-3">{{\App\Models\Page::count()}}</h6>
			</a>
		</div>
	</div>
</div>



<div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 my-2">
	<div class="col-12 px-0 py-1 d-flex main-box-wedit">
		<div style="width: 65px;" class="p-2">
			<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #0194fe;color: #fff; border-radius: 50%;width: 55px;height:55px">
				<span class="fal fa-bullhorn font-5" ></span>
			</div>
		</div>
		<div style="width: calc(100% - 80px)" class="px-2 py-2">
			<a class="font-1" href="{{route('admin.announcements.index')}}" style="color: #212529;">
				{{__('admin/dashboard.ads')}}
				<h6 class="font-3">{{\App\Models\Announcement::count()}}</h6>
			</a>
		</div>
	</div>
</div>


<div class="col-12 px-2 py-2">
	<div style="height: 4px ;background: rgb(118 169 169);border-radius: 7px;transition: width .5s ease-in-out;width: 0%;" id="home-dashboard-divider"></div>
</div>
<livewire:dashboard-statistics />
</div>
@endsection