<?php

namespace App\Http\Controllers;

use App\Advertising;
use App\Category;
use App\CategoryValue;
use App\Contact_us;
use App\Department;
use App\Event;
use App\GeneralSetting;
use App\ImageNew;
use App\MainInfo;
use App\News;
use App\Slide;
use App\SlideImage;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


    /*  public function typenews($type)
      {
          $typenews=News::where('type',$type)->get();


          return view('style.home',compact('typenews'));
      }*/


    public function test()
    {
        $student = ['osama', 'mohammed'];
        $teacher = [];

        return view('site.test', compact('student', 'teacher'));
    }

    public function home()
    {
        $category = Category::first();

        $news = News::paginate(3);
        return view('site.news.index')
            ->with('category', $category)
            ->with('news', $news);
    }

    public function setup()
    {

        if (isset(Auth::user()->id)) {
            $setting = [
                ['name' => 'site_name', 'value' => 'هدهد سباء'],
                ['name' => 'logo', 'value' => 'images/default/site_logo.png'],
                ['name' => 'default_advertisment_text', 'value' => 'مساحة اعلانية للحجز'],
                ['name' => 'default_advertisment_title', 'value' => 'اعلن هنا '],
                ['name' => 'default_advertisment_image', 'value' => 'images/default/advertisment_image.png'],
                ['name' => 'home', 'value' => '2'],

            ];
            foreach ($setting as $s) {
//                $oldSetting = GeneralSetting::where('name', 'like',$s['name'])->get();
                $oldSetting = GeneralSetting::withTrashed()->where('name', 'like', $s['name'])->first();
                if ($oldSetting)
                    $oldSetting->update(array_merge($s,
                        [
                            'created_by' => Auth::user()->id,
                            'updates' => '',
                        ]));
                else
                    GeneralSetting::updateOrCreate(array_merge($s,
                        [
                            'created_by' => Auth::user()->id,
                            'updates' => '',
                        ]));
            }


        }
        $category = Category::all()->first();
        return redirect(route('pages', $category->id));
    }


    public function pages($id)
    {
        $category = Category::find($id);
        foreach ($category->category_values as $v)


            $news = [];
        $slide_images = [];
        $news = News::where('categories', 'like', '%"' . $id . '"%')->paginate($category->newsCount);
        if ($category->hasSlides == 1) {
            $slide = Slide::where('categories', 'like', '%"' . $category->id . '"%')->first();
            if ($slide)
                $slide_images = SlideImage::where('slides', 'like', '%"' . $slide->id . '"%')->get();
        }

        $category_values_right = CategoryValue::all()
            ->where('category_id', $id)
            ->where('padding', 'like', 'يمين')
            ->sortBy('sort');
        $category_values_left = CategoryValue::all()
            ->where('category_id', $id)
            ->where('padding', 'like', 'يسار')
            ->sortBy('sort');

//        return dd($category_values_right);
        if ($category->section_count == 3) {
            $left = 'col-md-3';
            $right = 'col-md-3';
            $center = 'col-md-6';

        } else if ($category->section_count == 2) {
            $left = 'col-md-0';
            $right = 'col-md-4';
            $center = 'col-md-8';
        } else if ($category->section_count == 1) {
            $left = 'col-md-0';
            $right = 'col-md-0';
            $center = 'col-md-12';
        }


        return view('site.news.page')
            ->with('news', $news)
            ->with('slide_images', $slide_images)
            ->with('category_values_left', $category_values_left)
            ->with('category_values_right', $category_values_right)
            ->with('category', $category)
            ->with('left', $left)
            ->with('right', $right)
            ->with('center', $center);
    }


    public function login()
    {

        return view('site.login');
    }

    public function singUp()
    {


        return view('site.signUp');
    }


    public function viewslider($type = null)
    {
//        $news=News::paginate(3);
//
////        $slid=Slider::all();
//
//        $typeNews_1=News::orderBy('id','desc')->limit(3)->get();
//        $typeNews_2=News::orderBy('id','desc')->limit(3)->get();
//        $typeNews_3=News::orderBy('id','desc')->limit(3)->get();
//        $typeNews_4=News::orderBy('id','desc')->limit(3)->get();
//
//        // dd($slid->count());
////        $img=ImageNew::limit(5)->orderBy("id",'DESC')->get();
//
//        $advertising=Advertisment::all();
////        $event=Event::paginate(5);

        return view('site.index');
//            ->with('news',$news)
//            ->with('slid',$slid)
//            ->with('img',$img)
//            ->with('event',$event)
//            ->with('advertising',$advertising)
//            ->with('typeNews_1',$typeNews_1)
//            ->with('typeNews_2',$typeNews_2)
//            ->with('typeNews_3',$typeNews_3)
//            ->with('typeNews_4',$typeNews_4);
    }


    public function viewadvertise()
    {
        $advertising = Advertising::orderBy('id', 'asc');

        // dd($news->count());
        //return view('style.home',compact('advertising'));
    }


    public function viewallnews()
    {
        $lastnews = News::orderBy('id', 'desc')->paginate(4);

        // dd($news->count());
        return view('style.news', compact('lastnews'));
    }


    public function showdepartment($id)
    {

        $depts = Department::find($id);
        //dd($depts);
        return view('style.department')
            ->with('depts', $depts)
            ->with('id', $id);

    }

    public function showmoredetials($id)
    {

        $detials = News::find($id);
        //dd($depts);
        return view('style.moreDetials', compact('detials'));

    }


    public function addcontact(Request $request)
    {
        $data = $this->validate(request(), [
            'contact_name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ], [], [
            'contact_name' => trans('admin.contact_name'),
            'email' => trans('admin.email'),
            'subject' => trans('admin.subject'),
            'message' => trans('admin.message'),
        ]);
        $data['view'] = 0;

        Contact_us::create($data);
        session()->flash('success', trans('admin.record_added'));
        return view('style.contactUs');


    }


    public function contactSend()
    {
        $data = $this->validate(request(), [
            'contact_name' => 'required',
            'email' => 'required|email',
            'type' => 'required|integer',
            'message' => 'required',
            'subject' => 'required',
        ], [], [
            'contact_name' => trans('admin.name'),
            'email' => trans('admin.email'),
            'type' => trans('admin.type'),
            'subject' => trans('admin.subject'),
            'message' => trans('admin.message'),
        ]);


        Contact_us::create($data);
        session()->flash('success', trans('all.send_success'));
        return redirect()->back();
    }


    public function homeView()
    {
        $news = News::orderBy('id', 'desc')->paginate(9);
        $video = News_video::orderBy('id', 'desc')->paginate(9);
        return view('style.home', compact('news', 'video'));
    }


    public function newsView()
    {
        $news = '';
        $type = 0;
        if (request()->has('type')) {
            $type = request('type');
            $news = News::where('type', $type)->get();
        } else {
            $news = News::all();
        }
        return view('style.profile', compact('news', 'type'));
    }


    public function detailView($id)
    {
        $news = News::orderBy('id', 'desc')->paginate(9);
        $detail = News::find($id);
        return view('style.details', compact('news', 'detail'));
    }


    public function service()
    {
        $data1 = Service::where('type', 1)->get();
        $data2 = Service::where('type', 3)->get();

        return view('style.service', compact('data1', 'data2'));
    }
}
