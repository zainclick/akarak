<?php

namespace App\Traits;

use App\Models\Backend\Agents;
use App\Models\Backend\Packages;
use App\Models\Backend\Properties;


trait packageTrait
{
    protected function checkAgent($package_id,$agency_id){
        $package = Packages::where('id',$package_id)->first();
        $agent = Agents::where('agency',$agency_id)->get();

        if($agent->count() < $package->agent_count && $agent->count() != $package->agent_count){
            $role = 'can';
        }else{
            $role = 'cant';
        }
        return $role;
    }


    protected function checkProperties($package_id,$agency_id){
        $package = Packages::where('id',$package_id)->first();
        $properties = Properties::where('agency',$agency_id)->get();

        if($properties->count() < $package->properties_count && $properties->count() != $package->properties_count){
            $role = 'can';
        }else{
            $role = 'cant';
        }
        return $role;
    }
}
