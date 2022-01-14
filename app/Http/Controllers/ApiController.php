<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\departments;
use App\Models\User;
use App\Models\crops;
use App\Models\daily;
use App\Models\sales;
use App\Models\demonstrations;
use App\Models\local_languages;
use App\Models\zones;
use App\Models\farmers;
use App\Models\farmer_crops;
use App\Models\farmer_crops_count;
use App\Models\totalsummaries;
use App\Models\cropsummaries;
use App\Models\zonesummaries;


class ApiController extends Controller
{

    public function getAllFarmers() 
    {
        //$cars = farmers::select('date','place','culture','cropsize','farmer','mobile')->get()->toJson(JSON_PRETTY_PRINT);

       $data['farmers'] =  DB::table('farmers')
        ->join('farmer_crops_counts','farmers.id','=','farmer_crops_counts.farmer_id')
        ->join('zones','farmers.zone_id','=','zones.id')
       ->select('farmers.id','farmers.nom','farmers.prenom','farmers.localite','farmers.contact','farmer_crops_counts.count','zones.zone')
       ->get()->toJson(JSON_PRETTY_PRINT);

        return response($data['farmers'], 200);
      }

    // POST ROUTE

    public function user_sales(Request $request)
    {
        $sales = new sales;
        $sales->user_id = $request->id;
        $sales->date = $request->date;
        $sales->product_id = $request->product;
        $sales->cartons = $request->cartons;
        $sales->observations = $request->observations;
        $sales->save();

        return response()->json([
            "message" => "sale record created"
          ], 201);


    }

    public function user_report(Request $request)
    {
        $daily = new daily;
        $daily->user_id = $request->id;
        $daily->date = $request->date;
        $daily->activities = $request->activities;
        $daily->observations = $request->observations;
        $daily->save();

        return response()->json([
            "message" => "Report record created"
          ], 201);


    }
    
    public function farmer_registration(Request $request)
    {
            $farmer = new farmers;
            $farmer->nom = $request->nom;
            $farmer->prenom = $request->prenom;
            $farmer->localite = $request->localite;
            $farmer->contact = $request->contact;
            $farmer->zone_id = $request->zone;
            $farmer->language_id = $request->langue;
            $farmer->created_by_type = "user";
            $farmer->created_by_id = $request->id;
            $farmer->save();
 
            $crops = $request->crops;
            $sizes = $request->sizes;

            $count = 0;
            foreach($crops as $index => $crop)
            {
                $farm = new farmer_crops;
                $farm->farmer_id = $farmer->id;
                $farm->crop_id = $crop;
                $farm->crop_size = $sizes[$index];
                $farm->save();
                $count +=1;
            }

            $farms_count = new farmer_crops_count;
            $farms_count->farmer_id = $farmer->id;
            $farms_count->count = $count;
            $farms_count->save();

        // totalsummaries::where('id',1)->increment('value', 5);
        totalsummaries::where('id',1)->update([
            'farmers' => DB::raw('farmers + 1'),
            'crops' => DB::raw('crops + '.$count),
        ]);

        return response()->json([
            "message" => "Farmer record created"
          ], 201);

    }

}
