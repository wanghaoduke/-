<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shuju;
use App\Comm;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    
     */


    public function __construct(){
        $this->middleware('auth',['except'=>['indexnew','show','index']]);
    }

    

        public function indexnew(Request $request,$page)
    {
       $shujus = Shuju::get()->toArray();
       $sum=count($shujus);   //分页总数
       $pages=ceil($sum/8);
       //dd($shujus);
       $p=$page*6;
       $pageShujusArray=array_slice($shujus,$p-6,6);
       //dd($pageShujusArray);
       for($i=0;$i<count($pageShujusArray);$i++){
        $pageShujus[$i]=(object)($pageShujusArray[$i]);
       }
       //dd($pageShujus);
        return view('post.index',compact('pageShujus','request','pages'));
    }

    public function index(Request $request)
    {
       $shujus = Shuju::all();
       $sum=count($shujus);   //分页总数
       $pages=ceil($sum/8);
       //dd($pages);
        return view('post.index',compact('shujus','request','pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    
   /* $html = <<<CREATE
        <form action="$postUrl" method="POST">
            $csrf_field
            <input type="text" name="title"><br/><br/>
            <textarea name="content" cols="50" rows="5"></textarea><br/><br/>
            <input type="submit" value="提交"/>
        </form>
CREATE;*/
    return view('post.create',compact('request'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function wenStore(Request $request)
   {
    //dd('$user_id');
   $shuju=new Shuju;
   $shuju->title=$request->get('title'); //$_REQUEST['title'];
   $shuju->content=$request->get('content');

   $shuju->user_id=auth()->user()->id;
   $shuju->save();
     return redirect()->route('post.index');
}


    public function store(Request $request)
   {
    dd($request->user);
   $shuju=new Shuju;
   $shuju->title=$request->get('title');
   $shuju->content=$_POST['content'];
   $shuju->save();
     return redirect()->route('post.index');
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
    $shuju=Shuju::find($id);
    $comms=Shuju::where('id',$id)->first()->comms;//$shuju->comms;
    $name=Shuju::find($id)->user->name;
    
    return view('post.show',compact('id','shuju','comms','request','name'));
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $reqid=$request->user()->id;
        $user_id=Shuju::find($id)->user->id;
        if($reqid!==$user_id){
        echo "你无权限更改其他用户文章";
        //return redirect()->route('post.index');
      }else{
    return view('post.edit',compact('id','request'));
    }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {   

        $shuju=Shuju::find($id);
        $shuju->title= $_REQUEST['title'];
        $shuju->content= $_REQUEST['content'];
        $shuju->save();

       return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
      $reqid=$request->user()->id;
      
      $user_id=Shuju::find($id)->user->id;
      if($reqid!==$user_id){
        echo "你无权限删除其他用户文章";
        //return redirect()->route('post.index');
      }else{
      //dd($user_id);

      Shuju::destroy($id);  
     return redirect()->route('post.index');
    }
    }


    public function comCreate(Request $request,$id){
       
        return view('post.comCreate',compact('id','request'));
    }


    public function comStore(Request $request,$id){
       
        $comm=new Comm;
        $comm->user=$request->user()->name;
        $comm->content=$_REQUEST['content'];
        $comm->shuju_id=$id;
        $comm->user_id=$request->user()->id;
        $comm->save();
        $shuju_id=$id;
        return redirect()->route('post.show',compact('shuju_id'));
    }

    public function comDestroy (Request $request,$shuju_id,$id){
        //dd($shuju_id,$id);
        $reqid=$request->user()->id;
        $user_id=Comm::find($id)->user_id;
        //dd($user_id,$reqid); 
        if($reqid!==$user_id){
            echo "你无权删除其他用户的评论";
        }else{
        Comm::destroy($id);
        return redirect()->route('post.show',compact('shuju_id'));
    }
    }
}
