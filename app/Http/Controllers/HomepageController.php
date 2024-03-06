<?php

namespace App\Http\Controllers;

use App\Models\newsContent;
use App\Models\newsSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class HomepageController extends Controller
{
    public function index(){
        $first_news = newsContent::where('first_news','true')->first();
        if(!$first_news){
            $first_news = newsContent::orderBy('id','DESC')->first();
        }
        $second_news = newsContent::whereNot('id',$first_news->id??'')->orderBy('id','DESC')->get()->take(2);
        $news_section = newsSection::get();
        return view('welcome',compact('first_news','second_news','news_section'));
    }

    public function viewNews($id){
        $news = newsContent::where('news_slug',$id)->first();
        $might_like = newsContent::whereNot('news_slug',$id)->get();
        $other_news = newsContent::get();
        $featured_news = newsContent::get();
        $trending = newsContent::get();
        return view('view-news', compact('news','might_like','other_news','featured_news','trending'));
    }

    public function viewAllNews(){
        $routeName = Route::currentRouteName();
        $slug = str_replace("news.", "", $routeName);
        $all_news = newsContent::where('category', 'like', '%' . $slug . '%')->get();
        $related_news = newsContent::get();
        $featured_news = newsContent::get();
        $trending = newsContent::get();
        return view('view-all-news', compact('all_news','slug','related_news','featured_news','trending'));
    }
}
