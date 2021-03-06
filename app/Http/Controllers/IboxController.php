<?php

namespace App\Http\Controllers;

use App\Models\Ibox;
use App\Models\Iretention;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Auth;
use DB;

class IboxController extends Controller
{

    public function index()
    {
        $listItems = IBox::latest()->take(2)->get();
        $boxes = IBox::all();
        // $categories = DB::table('categories')->latest()->paginate(5);
        return view('box.i.index', compact('boxes', 'listItems'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $latest_box = Ibox::latest()->first();
        if($latest_box == NULL){
            $box_type = "first";
//            $box_id = 0;
        }else{
            $box_type = $request->type;
        }

        if($box_type == "first"){
            $box_id = 1;
            $box = new Ibox;
            $box->name = "I." . $box_id;
            $box->save();
            $box_id = DB::getPdo()->lastInsertId();
        }elseif($box_type == "new"){
            $boxName = $latest_box->name;
            $boxInfo = explode(".", $boxName);
            $number = $boxInfo[1];
            $number++;
            $box = new Ibox;
            $box->name = "I." . $number;
            $box->save();
            $box_id = DB::getPdo()->lastInsertId();
        }else{
            $box_id = $box_type;
        }

        $retentions = new IRetention;
        $retentions->box_id = $box_id;
        $retentions->user_id = Auth::user()->id;
        $retentions->product_id = $request->pn;
        $retentions->lot = $request->lot;
        $retentions->lab_date = $request->lab_date;
        $retentions->exp_date = $request->exp_date;

        $retentions->save();

        return Redirect()->back()->with('success','Retention Inserted Successfully');
    }

    public function show(Ibox $ibox)
    {
        $id = $ibox->id;
        $retentions = Iretention::where('box_id','=', $id)->get();


        return view('box.i.show', compact('ibox', 'retentions'));
    }

    public function edit(Ibox $ibox)
    {
        //
    }

    public function update(Request $request, Ibox $ibox)
    {
        //
    }

    public function destroy(Ibox $ibox)
    {
        //
    }
}
