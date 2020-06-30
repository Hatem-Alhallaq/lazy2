<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $news = News::paginate(2);
        //        $news= News::where('title','like',"%{$q}%")->paginate(1)->appends([
//            "q"=>$q
//        ]);
        $q = request()->q ?? "";
        $published = request()->published ?? "";
        $category = request()->category;
        $categories = Category::all();
        $news = News::whereRaw('true');
        if ($q) {
            $news->where('title','like',"%{$q}%");
        }
        if ($published!=null) {
            $news->where('published',$published);
        }
        if ($category) {
            $news->where('category_id',$category);
        }
        $news =$news->paginate(1)->appends([
            "q"=>$q,
            "published"=>$published,
            "category_id"=>$category
      ]);
        return view("admin.news.index")->with("news", $news)->with('categories',$categories);
    }

    public function paging()
    {
        $news = News::paginate(2);
        return view("admin.news.paging")->with("news", $news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("admin.news.create")->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        if (!$request->published) {
            $request['published'] = 0;
        }
       $imageName = basename($request->imageFile->store("public"));
      $request['image'] = $imageName;
         //{{dd($request['image']);}}
        News::create($request->all());
        session()->flash("msg", "s: Created Successfully");
        return redirect(route("news.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\News $news
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = news::find($id);
        if (!$news) {
            session()->flash("msg", "e: The News was not found");
            return redirect(route("news.index"));
        }
        $Categories = Category::all();
        return view("admin.news.show")->withNews($news)->withCategories($Categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\News $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        if ($news == null) {
            session()->flash("msg", "e: The News was not found");
            return redirect(route("news.index"));
        }
        $categories = Category::all();
        return view("admin.news.edit")->with('news', $news)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\News $news
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, $id)
    {
        if (!$request->published) {
            $request['published'] = 0;
        }
        if($request->imageFile) {
            $imageName = basename($request->imageFile->store("public"));
            $request['image'] = $imageName;
        }
        News::find($id)->update($request->all());

        session()->flash("msg", "i: News Updated Successfully");
        return redirect(route("news.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $news = News::find($id);
        if (!$news) {
            session()->flash("msg", "e: The News was not found");
            return redirect(route("news.index"));
        }
        $news->delete();
        session()->flash("msg", "w: News Deleted Successfully");
        return redirect(route("news.index"));
    }
}
