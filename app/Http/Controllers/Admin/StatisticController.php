<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Statistic;
use App\Admin\University;
use App\Http\Controllers\Controller;
use App\Http\Requests\StatisticsRequest;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function statistic_1()
    {
        return view('statistics.chart1');
    }

    public function statistic_6()
    {
        return view('statistics.chart6');
    }

    public function statistic_2()
    {
        return view('statistics.chart2');
    }

    public function statistic_3()
    {
        return view('statistics.chart3');
    }

    public function statistic_4()
    {
        return view('statistics.chart4');
    }

    public function statistic_8()
    {
        return view('statistics.chart8');
    }

    public function statistic_9()
    {
        return view('statistics.chart9');
    }


    public function statistic_5()
    {
        $statisticsData = Statistic::all();
        $color = [];
        $name = [];
        $value = [];
        foreach ($statisticsData as $s) {
            $color[] = $s->color;
            $name[] = $s->name;
            $value[] = "{value:{$s->value},name:'{$s->name}}";

        }

        return view('statistics.chart5', compact('color,name,value'));
    }

    public function statistic_7()
    {
        $statisticsData = Statistic::all();


        $data = Statistic::all()->groupBy('name')
            ->map(function ($item) {
//                return dd($item[0]->name);
                // Return the number of persons with that age
                return $item[0]->value;
            });

        $chart = new StudentChart();
        $chart->labels($data->keys());
//        $chart->dataset('My dataset', 'bar', $data->values())->options(());
        $color = ['#c23531', '#2f4554', '#61a0a8', '#d48265', '#91c7ae', '#749f83', '#ca8622', '#bda29a', '#6e7074', '#546570', '#c4ccd3'];
//        shuffle($color);

        $chart->color = $color;
        $chart->trigger = 'axis';
        $chart->show = true;
//        $chart->labels(['One', 'Two', 'Three']);


        return view('statistics.chart7', compact('chart'));
    }


    public function index()
    {
        $s = Statistic::first();
        $statistics = Statistic::all();
        return view('statistics.index', ['statistics' => $statistics,'statistic'=>$s]);
    }


    public function showStatistics($university_id, $type)
    {
        $s = Statistic::first();
        if ($type == 'all')
            $statistics = Statistic::where('university_id', $university_id)->get();
        else
            $statistics = Statistic::where('university_id', $university_id)->where('type', 'like', '%' . $type . '%')->get();
        return view('statistics.index', ['statistic'=>$s,'statistics' => $statistics, 'university_id' => $university_id, 'type' => $type]);
    }


    public function showStatisticsChar($university_id, $type, $status)
    {
        if ($status == 'default')
            $statistics = Statistic::all()
                ->where('university_id', $university_id)
                ->where('type', 'like', $type)
                ->groupBy('degree');
        else
            $statistics = Statistic::all()
                ->where('university_id', $university_id)
                ->where('type', 'like', $type)
                ->where('status', 'like', $status)
                ->groupBy('degree');


        $degree = [];
        $male = [];
        $female = [];
        foreach ($statistics as $k => $s) {

            $degree[] = $k;
            foreach ($s as $s_gender) {
                if ($s_gender->gender == 'ذكور')
                    $male[$k] = $s_gender->number;
                else
                    $female[$k] = $s_gender->number;
            }
        }
        $result = array([
            'degree' => $degree,
            'male' => $male,
            'female' => ($female)
        ]);
//        return dd($result);
        $s = Statistic::first();
        $all_universities = University::all();
        $universities = [];

        foreach ($all_universities as $u) {
            $universities[$u->id] = $u->name;

        }

//        return dd($s);
        return view('statistics.chart8', ['statistic' => $s, 'universities' => $universities]);
    }

    public function showStatisticsTableForAllUniversity($uni_type, $type, $status,$degree,$gender)
{
if($uni_type=='الكل')
    $statistics = Statistic::all()
        ->where('gender', 'like', $gender)
        ->where('type', 'like', $type)
        ->where('status', 'like', $status)
        ->where('degree', 'like', $degree)
        ->sortByDesc('number');
else
{
    $u_ids=[];
   $us= University::where('type', 'like', $uni_type)->get();
    foreach ($us as $u)
    {
        $u_ids[]=$u->id;
    }

    $statistics = Statistic::all()
        ->whereIn('university_id',  $u_ids)
        ->where('gender', 'like', $gender)
        ->where('type', 'like', $type)
        ->where('status', 'like', $status)
        ->where('degree', 'like', $degree)
        ->sortByDesc('number');
}



//
//    $university = [];
//    $number = [];
//    $data = [];
//    foreach ($statistics as $k => $s) {
//        $s->number;
//        $data[$s->university->name] = $s->number;
//        $university[] = ($s->university->name);
//
//        $number[] = $s->number;
//
//    }
//    $result = array([
//        'university' => $university,
//        'number' => $number,
//    ]);
//    $all_universities = University::all();
//    $universities = [];
//
//    foreach ($all_universities as $u) {
//        $universities[$u->id] = $u->name;
//
//    }

        $s = Statistic::first();

    return view('statistics.index2',compact('uni_type','type', 'status','degree','gender','statistics'));
}

    public function showStatisticsCharForAllUniversity($gender, $type, $status)
    {
        $gender = "ذكور";
        $status = "مستجدون";
        $degree = "بيكلاريوس";

//        return dd ($type);

//        $gender = $request->input('gender');
//        $type = $request->input('type');
//        $status = $request->input('status');
        if ($status == 'default')
            $statistics = Statistic::all()
                ->where('gender', 'like', $gender)
                ->where('type', 'like', $type)
                ->where('degree', 'like', $degree)//                ->groupBy('university_id')
            ;
        else
            $statistics = Statistic::all()
                ->where('gender', 'like', $gender)
                ->where('type', 'like', $type)
                ->where('status', 'like', $status)
                ->where('degree', 'like', $degree)
//                ->groupBy('university_id')
                ->sortByDesc('number');

//        return dd ($statistics);

        $university = [];
        $number = [];
        $data = [];
        foreach ($statistics as $k => $s) {
            $s->number;
            $data[$s->university->name] = $s->number;
            $university[] = ($s->university->name);

            $number[] = $s->number;

        }
        $result = array([
            'university' => $university,
            'number' => $number,
        ]);
//        return dd ($data);


//        return dd($result);
        $s = Statistic::first();
        $all_universities = University::all();
        $universities = [];

        foreach ($all_universities as $u) {
            $universities[$u->id] = $u->name;

        }

//        return dd($s);
        return view('statistics.chart9', ['statistic' => $s, 'universities' => $universities]);
    }

    public function fetchStatisticsCharForAllUniversity(Request $request)
    {
        $gender = $request->input('gender');
        $type = $request->input('type');
        $status = $request->input('status');
        $degree = $request->input('degree');
        $uni_type = $request->input('uni_type');
        $statistics = Statistic::all()
            ->where('gender', 'like', $gender)
            ->where('type', 'like', $type)
            ->where('status', 'like', $status)
            ->where('degree', 'like', $degree)
//                ->groupBy('university_id')
            ->sortByDesc('number');
        $university = [];
        $number = [];
        $data = [];
        foreach ($statistics as $k => $s) {
            if ($s->university->type == $uni_type) {
                $data[] = array("name" => $s->university->name, "value" => $s->number);
                $university[] = ($s->university->name);
                $number[] = $s->number;
            }
             if ($uni_type == 'الكل') {
                $data[] = array("name" => $s->university->name, "value" => $s->number);
                $university[] = ($s->university->name);
                $number[] = $s->number;
            }

        }
        $result = array([
            'university' => $university,
            'number' => $number,
            'data' => $data,
        ]);
        return ($result);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_universities = University::all();
        $universities = [];

        foreach ($all_universities as $u) {
            $universities[$u->id] = $u->name;

        }
        return view('statistics.create', compact('universities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatisticsRequest $request)
    {


        foreach ($request->input('statustics') as $s) {
            $s = Statistic::create([
                'university_id' => $request->university,
                'type' => $s['type'],
                'degree' => $s['degree'],
                'status' => $s['status'],
                'year' => $s['year'],
                'gender' => $s['gender'],
                'number' => $s['number']
            ]);
        }
        return redirect()->route('admin.statistics.index')->with('success', 'تم اضافة الاحصائية بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Statistic $statistic)
    {
        //
        $all_universities = University::all();
        $universities = [];

        foreach ($all_universities as $u) {
            $universities[$u->id] = $u->name;

        }
        return view('statistics.edit', compact('statistic', 'universities'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StatisticsRequest $request, Statistic $statistic)
    {
        foreach ($request->input('statustics') as $sat) {
            if ($sat['id'] > 0) {
                $s = Statistic::find($sat['id']);
                $s->university_id = $request->university;
                $s->type = $sat['type'];
                $s->degree = $sat['degree'];
                $s->status = $sat['status'];
                $s->year = $sat['year'];
                $s->gender = $sat['gender'];
                $s->number = $sat['number'];
                $s->save();

            } else
                Statistic::create([
                    'university_id' => $request->university,
                    'type' => $sat['type'],
                    'degree' => $sat['degree'],
                    'status' => $sat['status'],
                    'year' => $sat['year'],
                    'gender' => $sat['gender'],
                    'number' => $sat['number']
                ]);
        }

        if ($request->input('deletedId'))
            Statistic::whereIn('id', $request->input('deletedId'))->delete();

        return redirect()->route('admin.statistics.showStatistics',[$statistic->university->id,'الكل'])->with('statistic',$statistic)->with('success', 'تم التعديل بنجاح');
    }

    public function delete($id)
    {
        Statistic::find(decrypt($id))->delete();
        return redirect(route('admin.statistics.index'))->with('success', 'تم حذف الاحصائية  بنجاح');
    }


}
