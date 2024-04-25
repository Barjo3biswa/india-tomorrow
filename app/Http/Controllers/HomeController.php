<?php

namespace App\Http\Controllers;

use App\Models\newsContent;
use App\Models\newsSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $list = newsSection::get();
        return view('home', compact('list'));
    }


    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'upload' => 'required | mimes:jpeg,png,jpg,pdf'
        ]);
        if ($validator->fails()) {
            $message = 'File type not allowed';
            $result = "<script>window.parent.CKEDITOR.tools.callFunction('$message')</script>";
        }
        if ($request->hasFile('upload')) {
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $mime_type = $finfo->file($request->file('upload'));
            $extension = $request->file('upload')->getClientOriginalExtension();
            if ($mime_type != "image/png" && $mime_type != "image/jpeg" && $mime_type != "application/pdf") {
                $message = 'File type not allowed';
                $result = "<script>alert('$message')</script>";
            } elseif ($extension != "jpg" && $extension != "jpeg" && $extension != "png" && $extension != "pdf") {
                $message = 'File type not allowed';
                $result = "<script>alert('$message')</script>";
            } else {
                $filenamewithextension = $request->file('upload')->getClientOriginalName();
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                $extension = $request->file('upload')->getClientOriginalExtension();
                $filenametostore = $filename . '_' . time() . '.' . $extension;
                $request->file('upload')->move('public/uploads', $filenametostore);

                $CKEditorFuncNum = $request->input('CKEditorFuncNum');
                $url = asset('public/uploads/' . $filenametostore);
                $message = 'File uploaded successfully';
                $result = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message')</script>";
            }
            @header('Content-type: text/html; charset=utf-8');
            echo $result;
        }
    }

    function commonCompact(){
        $list = newsSection::with('childSection')->where('parent_id',0)->orderBy('id','Asc')->get();
        // dd($list);
        return $list;
    }

    public function CreateNewsSection(){
        $list = $this->commonCompact();
        return view('admin.create-news-section', compact('list'));
    }

    public function CreateSubNewsSection($id){
        try {
            $decrypted = Crypt::decrypt($id);
        } catch (\Exception $e) {
            dd($e);
        }
        $list = $this->commonCompact();
        $parent_id = $decrypted;
        $parent_details = newsSection::where('id',$decrypted)->first();
        return view('admin.create-news-section', compact('list','parent_id', 'parent_details'));
    }

    public function secEdit($id){
        try {
            $decrypted = Crypt::decrypt($id);
        } catch (\Exception $e) {
            dd($e);
        }
        $record = newsSection::where('id',$decrypted)->first();
        $list = $this->commonCompact();
        return view('admin.create-news-section', compact('list','record'));
    }

    function slugify($string) {
        $string = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
        $string = trim($string, '-');
        $string = strtolower($string);
        return $string;
    }

    public function SaveNewsSection(Request $request){
        $appearence = json_encode($request->appearence);
        // dd($appearence);
        if($request->editable_id){
            newsSection::where('id',$request->editable_id)->update([
                'name' => $request->name,
                'remarks' => $request->remarks,
                'appearence' => $appearence=='null'?NULL:$appearence,
            ]);
            return redirect()->route('admin.create-news-section')->with('success','successfully Updated News Section..');
        }else{
            $slug = $this->slugify($request->name);
            $count = newsSection::where('slug',$slug)->get()->count();
            if($count > 0 ){
                $slug = $slug.$count+1;
            }
            $data = [
                'parent_id' => $request->parent_id??0,
                'name' => $request->name,
                'slug' => $slug,
                'remarks' => $request->remarks,
                'showing_order' => 0,
                'appearence' => $appearence=='null'?NULL:$appearence,
            ];
            newsSection::create($data);
            return redirect()->route('admin.create-news-section')->with('success','successfully Created News Section..');
        }
    }


    public function secDelete($id){
        try {
            $decrypted = Crypt::decrypt($id);
        } catch (\Exception $e) {
            dd($e);
        }
        newsSection::where('id',$decrypted)->delete();
        return redirect()->back()->with('success','successfully Deleted News Section..');
    }

    public function secPublish($id){
        try {
            $decrypted = Crypt::decrypt($id);
        } catch (\Exception $e) {
            dd($e);
        }
        $record = newsSection::where('id',$decrypted)->first();
        if($record->status == "Active" || $record->status == "Unpublished"){
            $status = "Published";
        }else if($record->status == "Published"){
            $status = "Unpublished";
        }

        newsSection::where('id',$decrypted)->update(['status'=>$status]);
        return redirect()->back()->with('success','successfully '.$status.' News Section..');
    }

    public function newsList(){
        $list = newsContent::orderBy('id','DESC')->get();
        return view("admin.news-list", compact('list'));
    }

    public function CreateNews(){
        return view('admin.create-news');
    }

    public function saveNews(Request $request){

        if(!$request->editable_id && $request->image == null && $request->youtube_url == null){
            return redirect()->back()->with('error','Provide Photo or Video for this News')->withInput();;
        }
        if($request->hashtags == null ){
            return redirect()->back()->with('error','Please provide Hashtags')->withInput();;
        }
        $path = null;
        if($request->editable_id){
            $path = newsContent::where('id',$request->editable_id)->first()->image;
        }
        $path = null;
        if(isset($request->image)){
            $destinationPath = public_path('uploads/news-banner');
                $uploaded_photo =$request->image;
                $uploaded_photo_name = $this->slugify($request->image_caption) . "_" . date('YmdHis').".". $uploaded_photo->getClientOriginalExtension();
                $uploaded_photo->move($destinationPath . "/", $uploaded_photo_name);
            $path = 'uploads/news-banner/'.$uploaded_photo_name;
        }

        $slug = $this->slugify($request->news_title);
        $cleaned_url = str_replace("https://youtu.be/", "", $request->youtube_url)??null;
        $count = newsContent::where('news_slug',$slug)->get()->count();
        if($count > 0 ){
            $slug = $slug.$count+1;
        }
        $hastagg = $request->hashtags;
        $hastagg = trim($hastagg);
        $hashtags_array = explode(' ', $hastagg);
        $hashtags_array = array_filter($hashtags_array);
        $json_result = json_encode($hashtags_array);

        if($path ==null && $request->editable_id){
            $path = newsContent::where('id',$request->editable_id)->first()->image;
        }
        $data=[
            "news_title" => $request->news_title,
            'news_slug' => $slug,
            "news_sub_title" => $request->news_sub_title,
            "image_caption" => $request->image_caption,
            "youtube_url" => $cleaned_url!=""?$cleaned_url:null,
            "description" => $request->description,
            "news_date" => $request->news_date,
            "news_time" => $request->news_time,
            "reported_by" => $request->reported_by,
            "image" => $path,
            "hashtags" => $json_result,
        ];
        if(!$request->editable_id){
            $inserted = newsContent::create($data);
            $id = $inserted->id;
        }else{
            newsContent::where('id',$request->editable_id)->Update($data);
            $id = $request->editable_id;
        }

        return redirect()->route('admin.news-edit',Crypt::encrypt($id))->with('success','successfully Created News.');
    }

    public function newsEdit($id){
        try {
            $decrypted = Crypt::decrypt($id);
        } catch (\Exception $e) {
            return redirect()->back()->with('error','Error');
        }
        $record = newsContent::where('id',$decrypted)->first();
        $news_sections = newsSection::get();
        return view('admin.create-news', compact('record', 'news_sections'));
    }

    public function newsDelete($id){
        try {
            $decrypted = Crypt::decrypt($id);
        } catch (\Exception $e) {

        }
        newsContent::where('id',$decrypted)->delete();
        return redirect()->back()->with('success','Successfully Deleted News');
    }

    public function newsPublish($id){
        try {
            $decrypted = Crypt::decrypt($id);
        } catch (\Exception $e) {

        }
        $record = newsContent::where('id',$decrypted)->first();
        if($record->status == null || $record->status == "Unpublished"){
            $status = "Published";
        }else if($record->status == "Published"){
            $status = "Unpublished";
        }

        newsContent::where('id',$decrypted)->update(['status'=>$status]);
        return redirect()->back()->with('success','successfully '.$status.' News ..');
    }

    public function settingsStore(Request $request){

        $validate = newsContent::where('id',$request->settings_id)->first();
        if($request['photo_or_video']=="video" && $validate->youtube_url==null){
            return response(['error' => 'Can`t set video as this news downt have a video.']);
        }

        if($request['publish_news']=='true' &&  $validate->category == null){
            return response(['error' => 'you can`t Publish without assigning to a news section.']);
        }
        DB::beginTransaction();
        try{
            if($request['first_news']=='true'){
                newsContent::where('first_news','true')->update(['first_news'=>'false']);
            }
            $status = $request['publish_news']=='true'?'Published':'Unpublished';
            $data = [
                'photo_or_video' => $request['photo_or_video'],
                'category' =>   $request['section']=="[]"?null:$request['section'],
                'scrolling' =>  $request['appear_in_scroll'],
                'archive' =>  $request['appear_in_archive'],
                'status'  => $status,
                'first_news'=>$request['first_news'],
            ];
            newsContent::where('id',$request->settings_id)->update($data);
            $msg = "Changed Successfully";
            DB::commit();
            return response(['success' => $msg]);
        }catch(\Exception $e){
            return response(['error' => 'try again']);
            DB::rollback();
        }
    }

    public function advertisement(){
        // dd('ok');
        return view('admin.adv-list');
    }

    public function createAdd(){
        return view('admin.create-adv');
    }

}
