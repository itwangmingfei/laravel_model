<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;


class ViewController extends Controller
{
    //
	public function index(){

		return view('user');
	}
	//添加数据
	public function add(Request $request){

		$input = $request->except('_token');
		$name = $input['name'];
		$email = $input['email'];
		$password = md5(time());
		User::create(['name'=>$name,'email'=>$email,'password'=>$password]);
		return redirect('/post/list');
		
	}
	//获取数据
	public function get($id){
		//查主键第一种
		//$row = User::find($id);
		//条件查询
		$row = User::where('id',$id)->first();
		 
		return view("show",['row'=>$row]);
	}

	public function save(Request $request){
		$input = $request->except('_token');
		$id = $input['id'];
		$name = $input['name'];
		$email = $input['email'];
		//第一种
		//$res = User::where('id',$id)->update(['name'=>$name,'email'=>$email]);
		//第二种 where('id',$id)->first()
		$user = User::find($id);
		$user->name = $name;
		$user->email = $email;
		$res = $user->save();
		return redirect('/post/list');
	}
	//删除
	public function delete($id){
		//第一种
		//$res = user::where('id',$id)->delete();
		//第二种where('id',$id)->first()
		$user = User::find($id);
		if (!empty($user)){
			$res = $user->delete();
			return redirect('/post/list');
		}else{
			return redirect('/post/list');
		}
	}
	public function List(){
		$list = User::orderBy('id','desc')->paginate(2); 
		return view('list',['list'=>$list]);
	}
   

}
