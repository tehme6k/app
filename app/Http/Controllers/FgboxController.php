<?php

namespace App\Http\Controllers;

use App\Models\Fgbox;
use App\Models\Fgretention;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Auth;
use DB;

class FgboxController extends Controller
{

    public function index()
    {
        $listItems = FgBox::latest()->take(2)->get();
        $boxes = FgBox::all();
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

        $retentions = new Fgretention;
        $retentions->box_id = $box_id;
        $retentions->user_id = Auth::user()->id;
        $retentions->lot = str_pad($request->lot,9,"0", STR_PAD_LEFT);
//        $retentions->product_id = substr($retentions->lot, 0, 4);
        $retentions->prod_date = $request->prod_date;
//        $retentions->exp_date = (new Carbon($request->prod_date))->addYears(3);

//        dd($retentions->exp_date);


        $retentions->save();

        return Redirect()->back()->with('success','Retention Inserted Successfully');
    }

    public function show(Fgbox $fgbox)
    {
        $id = $fgbox->id;
        $retentions = Fgretention::where('box_id','=', $id)->get();

        foreach ($retentions as $ret){
            $prod_id = substr($ret->lot, 0, 4);
            $products = array(
                "id" => $prod_id,
                DB::table('products')->find($prod_id)
            );


        }

        return view('box.fg.show', compact('fgbox', 'retentions', 'products'));
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
