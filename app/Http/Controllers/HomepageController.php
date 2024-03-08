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

        $second_news = newsContent::whereNot('id',$first_news->id??'')->orderBy('id','DESC')->get()->filter(function ($section) {
                            $appearance = $section->setCategory();
                            return is_array($appearance) && in_array('just-in', $appearance);
                        })->take(2);

        $news_section = newsSection::orderBy('orderby_main')->get()->filter(function ($section) {
                            $appearance = $section->setAppearence();
                            return is_array($appearance) && in_array('main_content', $appearance);
                        });
        $sub_news_section = newsSection::orderBy('orderby_sub')->get()->filter(function ($section) {
                            $appearance = $section->setAppearence();
                            return is_array($appearance) && in_array('left_content', $appearance);
                        });
        return view('welcome',compact('first_news','second_news','news_section','sub_news_section'));
    }

    public function viewNews($id){
        $news = newsContent::where('news_slug',$id)->first();
        $might_like = newsContent::whereNot('news_slug',$id)->get();
        $other_news = newsContent::get()->take(2);
        $featured_news = newsContent::get()->filter(function ($section) {
                                            $appearance = $section->setCategory();
                                            return is_array($appearance) && in_array('featured', $appearance);
                                        })->take(2);
        $trending = newsContent::get()->filter(function ($section) {
                                    $appearance = $section->setCategory();
                                    return is_array($appearance) && in_array('just-in', $appearance);
                                })->take(2);
        return view('view-news', compact('news','might_like','other_news','featured_news','trending'));
    }

    public function viewAllNews(){
        $routeName = Route::currentRouteName();
        $slug = str_replace("news.", "", $routeName);
        $all_news = newsContent::where('category', 'like', '%' . $slug . '%')->get();
        $related_news = newsContent::orderBy('id','DESC')->get()->filter(function ($section) {
            $appearance = $section->setCategory();
            return is_array($appearance) && in_array('just-in', $appearance);
        })->take('3');
        $featured_news = newsContent::orderBy('id','DESC')->get()->filter(function ($section) {
            $appearance = $section->setCategory();
            return is_array($appearance) && in_array('featured', $appearance);
        })->take('3');
        $trending = newsContent::orderBy('id','DESC')->get()->filter(function ($section) {
            $appearance = $section->setCategory();
            return is_array($appearance) && in_array('just-in', $appearance);
        })->take('3');
        return view('view-all-news', compact('all_news','slug','related_news','featured_news','trending'));
    }


    public function aboutUs(){
        return view('about-us');
    }
}
