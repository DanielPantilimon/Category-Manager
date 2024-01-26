<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use Illuminate\Http\Request;
//use App\Category;

class TreeController extends Controller
{
    public function treeView(){

        $Departments = Departments::where('parent_id', '=', 0)->get();
        $tree='<ul id="browser" class="jstree"></li>';
        foreach ($Departments as $Department) {
            $tree .='<li  class="tree-view closed"><a onclick="getDepUsers('.$Department->department_id.')" class="tree-name">'.$Department->dep_name.'</a>';
            if(count($Department->childs)) {
                $tree .=$this->childView($Department);
            }
        }
        $tree .='<ul>';
        //return $tree;
        return view('department',compact('tree'));
    }

    public function childView($Department){

        $html ='<ul>';
        foreach ($Department->childs as $arr) {
            if(count($arr->childs)){
                $html .='<li class="tree-view closed"><a onclick="getDepUsers('.$arr->department_id.')" class="tree-name">'.$arr->dep_name.'</a>';
                $html.= $this->childView($arr);
            }else{
                $html .='<li class="tree-view"><a onclick="getDepUsers('.$arr->department_id.')" class="tree-name" >'.$arr->dep_name.'</a>';
                $html .="</li>";
            }
        }
        $html .="</ul>";
        return $html;
    }

}
