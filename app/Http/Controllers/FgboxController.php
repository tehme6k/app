<?php

namespace App\Http\Controllers;

use App\Models\Fgbox;
use App\Models\Fgretention;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Auth;
use DB;

class FgboxController extends Controller
{

    public function index()
    {
        $listItems = FGBox::latest()->take(2)->get();
        $boxes = FGBox::all();
        // $categories = DB::table('categories')->latest()->paginate(5);
        return view('box.fg.index', compact('boxes', 'listItems'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $latest_box = Fgbox::latest()->first();
        if($latest_box == NULL){
            $box_type = "first";
//            $box_id = 0;
        }else{
            $box_type = $request->type;
        }

        if($box_type == "first"){
            $box_id = 1;
            $box = new Fgbox;
            $box->name = "FG." . $box_id;
            $box->save();
            $box_id = DB::getPdo()->lastInsertId();
        }elseif($box_type == "new"){
            $boxName = $latest_box->name;
            $boxInfo = explode(".", $boxName);
            $number = $boxInfo[1];
            $number++;
            $box = new Fgbox;
            $box->name = "FG." . $number;
            $box->save();
            $box_id = DB::getPdo()->lastInsertId();
        }else{
            $box_id = $box_type;
        }

        $retentions = new FGRetention;
        $retentions->box_id = $box_id;
        $retentions->user_id = Auth::user()->id;
        $retentions->product_id = $request->pn;
        $retentions->lot = $request->lot;
        $retentions->lab_date = $request->lab_date;
        $retentions->exp_date = $request->exp_date;

        $retentions->save();

        return Redirect()->back()->with('success','Retention Inserted Successfully');
    }

    public function show(Fgbox $fgbox)
    {
        $id = $fgbox->id;
        $retentions = Fgretention::where('box_id','=', $id)->get();


        return view('box.fg.show', compact('fgbox', 'retentions'));
    }

    public function edit(Fgbox $fgbox)
    {
        //
    }

    public function update(Request $request, Fgbox $fgbox)
    {
        //
    }

    public function destroy(Fgbox $fgbox)
    {
        //
    }
}
