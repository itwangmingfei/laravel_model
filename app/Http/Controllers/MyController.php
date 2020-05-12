<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    //
	public function get(){
		return "get";
	}
	public function post(){
		return "post";
	}
	public function put(){
		return "put";
	}
	public function patch(){
		return "patch";
	}
	public function option(){
		return "option";
	}
	public function delete(){
		return "delete";
	}
	public function match(){
		return "match['post','get']";
	}
	public function any(){
		return "any ['all']";
	}
}	
