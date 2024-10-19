<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\HitCount;
use App\Models\newsContent;
use App\Models\newsSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class HomepageController extends Controller
{
    public function index(){
        $first_news = newsContent::where('first_news','true')->where('status','Published')->first();
        if(!$first_news){
            $first_news = newsContent::orderBy('id','DESC')->where('status','Published')->first();
        }

        $second_news = newsContent::whereNot('id',$first_news->id??'')->where('status','Published')->orderBy('id','DESC')->get()->filter(function ($section) {
                            $appearance = $section->setCategory();
                            return is_array($appearance) && in_array('just-in', $appearance);
                        })->take(4);

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

    public function viewNews(Request $request,$id){

        $news = newsContent::where('news_slug',$id)->where('status','Published')->first();

        $prev_count = HitCount::where('news_id',$news->id)->where('ip_address',$request->ip())->first();
        if($prev_count){
            $indiv_count = $prev_count->indiv_count+1;
            $prev_count->update(['indiv_count'=>$indiv_count]);
        }else{
            $data = [
                'news_id' => $news->id,
                'ip_address' => $request->ip(),
                'indiv_count' => 1,
            ];
            HitCount::create($data);
        }

        $might_like = newsContent::whereNot('id',$news->id)->where('status','Published')->orderBy('id','DESC')->get();
        $current_list = $news->sethashtags();
        if(is_array($current_list)){
            $might_like = $might_like->filter(function($hashtags) use($current_list){
                $list = $hashtags->sethashtags();
                return is_array($list) && array_intersect($current_list, $list);
            })->take(2);
        }else{
            $might_like = $might_like->take(0);
        }


        $other_news = newsContent::where('status','Published')->inRandomOrder()->limit(2)->get();
        // dd($other_news);
        $featured_news = newsContent::where('status','Published')->orderBy('id','DESC')->get()->filter(function ($section) {
                                            $appearance = $section->setCategory();
                                            return is_array($appearance) && in_array('featured', $appearance);
                                        })->take(6);
        // dd($featured_news);
        $trending = newsContent::where('status','Published')->orderBy('id','DESC')->get()->filter(function ($section) {
                                    $appearance = $section->setCategory();
                                    return is_array($appearance) && in_array('just-in', $appearance);
                                })->take(6);
        return view('view-news', compact('news','might_like','other_news','featured_news','trending'));
    }



    public function viewAllNews(Request $request){
        $routeName = Route::currentRouteName();
        $slug = str_replace("news.", "", $routeName);

        if($request->tag){
            $slug = 'just-in';
            $all_news = newsContent::orderBy('id','DESC')->orderBy('id','DESC')->paginate(15);
            $current_list = [$request->tag];
            $all_news = $all_news->filter(function($hashtags) use($current_list){
                                        $list = $hashtags->sethashtags();
                                        return is_array($list) && array_intersect($current_list, $list);
                                    });
            // dd($all_news);
        }else{
            $all_news = newsContent::where('category', 'like', '%' . $slug . '%')->where('status','Published')->orderBy('id','DESC')->paginate(15);
        }

        $related_news = newsContent::orderBy('id','DESC')->where('status','Published')->orderBy('id','DESC')->get()->filter(function ($section) {
            $appearance = $section->setCategory();
            return is_array($appearance) && in_array('just-in', $appearance);
        })->take('3');
        $featured_news = newsContent::orderBy('id','DESC')->where('status','Published')->orderBy('id','DESC')->get()->filter(function ($section) {
            $appearance = $section->setCategory();
            return is_array($appearance) && in_array('featured', $appearance);
        })->take('3');
        $trending = newsContent::orderBy('id','DESC')->where('status','Published')->orderBy('id','DESC')->get()->filter(function ($section) {
            $appearance = $section->setCategory();
            return is_array($appearance) && in_array('just-in', $appearance);
        })->take('3');
        return view('view-all-news', compact('all_news','slug','related_news','featured_news','trending'));
    }


    public function aboutUs(){
        return view('about-us');
    }

    public function contactUs(){
        return view('contact-us');
    }

    public function contactSave(Request $request){
        // dd($request->all());
        ContactMessage::Create([
           'name' => $request->name,
           'email'=> $request->email,
           'phone'=> $request->phone,
           'message'=> $request->message,
        ]);
        return redirect()->back()->with('success','Successfully Submited your responses');
    }

    public function HitCount(Request $request){
        $prev_count = HitCount::where('news_id', $request->news_id)->where('ip_address',$request->ip())->first();
        if($prev_count){
            $indiv_count = $prev_count->indiv_count+1;
            $prev_count->update(['indiv_count'=>$indiv_count]);
        }else{
            $data = [
                'news_id' =>  $request->news_id,
                'ip_address' => $request->ip(),
                'indiv_count' => 1,
            ];
            HitCount::create($data);
        }
        return response(['success' => 'viewed']);
    }
}
