<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class ArticleController extends Controller
{
    function show()
    {
    	$articles = DB::table('articles')->orderBy('id','DESC')->get();
    	//$articles = Article::all();
    	return view('list')->with(Compact('articles'));

    }
    function addArticle()
    {

    	return view('add');
    }
    function saveArticle(Request $request)
    {
    	$validator = Validator::make($request->all(),[
    		'title'=>'required|max:255',
    		'discription'=>'required',
    		'author'=>'required|max:100'
    	]);

    	if($validator->passes()){

    		$article = new Article;
    		$article->title = $request->title;
    		$article->description = $request->discription;
    		$article->author = $request->author;
    		$article->save();

    		$request->session()->flash('msg','Article Save Successfully');
    		return redirect('articles');

    	}
    	else
    	{
    		return redirect('articles/add')->withErrors($validator)->withInput();
    	}
    }
    function editArticle($id, Request $request)
    {
    	$article = Article::where('id',$id)->first();
    	if(!$article)
    	{
    		$request->session()->flash('errorMsg','Record Not Found');
    		return redirect('articles');
    	}
    	return view('edit')->with(compact('article'));
    }
    function updateArticle($id, Request $request)
    {
	$validator = Validator::make($request->all(),[
    		'title'=>'required|max:255',
    		'discription'=>'required',
    		'author'=>'required|max:100'
    	]);

    	if($validator->passes()){

    		$article =Article::find($id);
    		$article->title = $request->title;
    		$article->description = $request->discription;
    		$article->author = $request->author;
    		$article->save();

    		$request->session()->flash('msg','Article Update Successfully');
    		return redirect('articles');

    	}
    	else
    	{
    		return redirect('articles/edit/'.$id)->withErrors($validator)->withInput();
    	}
    }
    function deleteArticle($id, Request $request)
    {
    	$article = Article::where('id',$id)->first();
    	if(!$article)
    	{
    		$request->session()->flash('errorMsg','Record Not Found');
    		return redirect('articles');
    	}

    	Article::where('id',$id)->delete();
    	$request->session()->flash('msg','Record Has been Deleted');
    	return redirect('articles');
    }
}
