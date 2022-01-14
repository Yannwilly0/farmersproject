<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\departments;
use App\Models\User;
use App\Models\Admins;
use App\Models\crops;
use App\Models\daily;
use App\Models\demonstrations;
use App\Models\local_languages;
use App\Models\zones;
use App\Models\sales;
use App\Models\farmers;
use App\Models\farmer_crops;
use App\Models\farmer_crops_count;
use App\Models\totalsummaries;
use App\Models\cropsummaries;
use App\Models\zonesummaries;


class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function login()
    {
        return view('admin.adminLogin');
    }
    public function index()
    {
        $data['summary'] = totalsummaries::where('id',1)->select('farmers','crops','users')->first();
        return view('admin.index',['data'=>$data]);
    }

    //USERS GET

    public function utilisateurs()
    {
        $data['users'] = DB::table('users')
        ->join('departments','users.dep_id','=','departments.id')
        ->select('users.id','users.nom','users.prenom','users.position','users.status','users.status_text','departments.department')
        ->get();
        return view('admin.users_management.users.users_list',['data'=>$data]);
    }
    public function add_user()
    {
        $data['departments'] = departments::select('id','department')->get();
        return view('admin.users_management.users.add_user',['data'=>$data]);
    }
    public function edit_user($id)
    {
        $data['departments'] = departments::select('id','department')->get();
        $data['user'] = DB::table('users')->where('users.id',$id)
        ->join('departments','users.dep_id','=','departments.id')
        ->select('users.id','users.nom','users.prenom','users.position','users.status','users.status_text','departments.department','users.email','users.contact','users.profil','users.dep_id')
        ->first();
        return view('admin.users_management.users.user_edit',['data'=>$data]);
    }
    public function profil_user($id)
    {
       
        $data['user'] = DB::table('users')->where('users.id',$id)
        ->join('departments','users.dep_id','=','departments.id')
        ->select('users.id','users.nom','users.prenom','users.position','users.status','users.status_text','departments.department','users.email','users.contact','users.profil','users.last_login')
        ->first();
        return view('admin.users_management.users.user_profil',['data'=>$data]);
    }
    public function user_login_details()
    {
        $data['users'] = User::select('nom','prenom','last_login','login_details','ip_address')->get();
        return view('admin.users_management.users.login_details',['data'=>$data]);
    }
    public function user_update_status($id)
    {
        $status_code =  User::where('id',$id)->select('status')->first();
        if($status_code->status == 0)
        {
            $status = 1;
            $text = "ACTIF";

        }
        else
        {
            $status = 0;
            $text = "INACTIF";
        }
        User::where('id',$id)
         ->update(['status'=> $status,'status_text'=> $text]);

        return redirect()->back()->with('success','account status was modified');
    }

    //ADMINS GET

    public function admins()
    {
        $data['admins'] = DB::table('admins')
        ->join('departments','admins.dep_id','=','departments.id')
        ->select('admins.id','admins.nom','admins.prenom','admins.position','admins.status','admins.status_text','departments.department')
        ->get();
        return view('admin.users_management.admins.admins_list',['data'=>$data]);
    }
    public function add_admin()
    {
        $data['departments'] = departments::select('id','department')->get();
        return view('admin.users_management.admins.add_admin',['data'=>$data]);
    }
    public function edit_admin($id)
    {
        $data['departments'] = departments::select('id','department')->get();
        $data['admin'] = DB::table('admins')->where('admins.id',$id)
        ->join('departments','admins.dep_id','=','departments.id')
        ->select('admins.id','admins.nom','admins.prenom','admins.position','admins.status','admins.status_text','departments.department','admins.email','admins.contact','admins.profil','admins.dep_id')
        ->first();
        return view('admin.users_management.admins.admin_edit',['data'=>$data]);
    }
    public function profil_admin($id)
    {
       
        $data['admin'] = DB::table('admins')->where('admins.id',$id)
        ->join('departments','admins.dep_id','=','departments.id')
        ->select('admins.id','admins.nom','admins.prenom','admins.position','admins.status','admins.status_text','departments.department','admins.email','admins.contact','admins.profil','admins.last_login')
        ->first();
        return view('admin.users_management.admins.admin_profil',['data'=>$data]);
    }
    public function admin_login_details()
    {
        $data['admins'] = Admins::select('nom','prenom','last_login','login_details','ip_address')->get();
        return view('admin.users_management.admins.login_details',['data'=>$data]);
    }

    public function admin_update_status($id)
    {
        $status_code =  Admins::where('id',$id)->select('status')->first();
        if($status_code->status == 0)
        {
            $status = 1;
            $text = "ACTIF";

        }
        else
        {
            $status = 0;
            $text = "INACTIF";
        }
        Admins::where('id',$id)
         ->update(['status'=> $status,'status_text'=> $text]);

        return redirect()->back()->with('success','account status was modified');
    }


    //FARMERS GET
    public function farmers()
    {
      
        $data['farmers'] =  DB::table('farmers')
        ->join('farmer_crops_counts','farmers.id','=','farmer_crops_counts.farmer_id')
        ->join('zones','farmers.zone_id','=','zones.id')
       ->select('farmers.id','farmers.nom','farmers.prenom','farmers.localite','farmers.contact','farmer_crops_counts.count','zones.zone')
        ->get();
        //print_r($data['farmers'][0]);
        return view('admin.farmers_management.farmers_list',['data'=>$data]);
    }
    public function add_farmer()
    {
        $data['crops'] = crops::select('id','crop')->get();
        $data['zones'] = zones::select('id','zone')->get();
        $data['languages'] = local_languages::select('id','langue')->get();
        return view('admin.farmers_management.add_farmer',['data'=>$data]);
    }

    public function edit_farmer($id)
    {
        $data['crops'] = crops::select('id','crop')->get();
        $data['farmer'] = farmers::where('id',$id)->select('id','nom','prenom','zone_id','localite','contact','language_id')->first();
        $data['zones'] = zones::select('id','zone')->get();
        $data['languages'] = local_languages::select('id','langue')->get();
        return view('admin.farmers_management.edit_farmer',['data'=>$data]);
    }

    public function profil_farmer($id)
    {
       
        $data['farmer'] = DB::table('farmers')->where('farmers.id',$id)
        ->join('zones','farmers.zone_id','=','zones.id')
        ->join('local_languages','farmers.language_id','=','local_languages.id')
        ->select('farmers.nom','farmers.prenom','farmers.contact','farmers.localite','zones.zone','local_languages.langue','farmers.created_at','farmers.created_by_type as creator','farmers.created_by_id as creator_id')
        ->first();

        $data['crops'] = DB::table('farmer_crops')->where('farmer_crops.farmer_id',$id)
        ->join('crops','farmer_crops.crop_id','=','crops.id')
        ->select('crops.crop','farmer_crops.crop_size')
        ->get();

        if($data['farmer']->creator == 'admin')
        {
            $data['creator'] = Admins::where('id',$data['farmer']->creator_id)->select('nom','prenom')->first();
        }
        else
        {
            $data['creator'] = User::where('id',$data['farmer']->creator_id)->select('nom','prenom')->first(); 
        }
        return view('admin.farmers_management.farmer_profil',['data'=>$data]);
    }


    //REPORT GET
    public function farmers_report()
    {
        $data['totalsummary'] = DB::table('totalsummaries')->select('farmers','crops','zones')->first();
        $data['summary'] = totalsummaries::where('id',1)->select('farmers','crops','zones')->first();
        $crops = DB::table('cropsummaries')
        ->join('crops','cropsummaries.crop_id','=','crops.id')
        ->select('crops.crop','cropsummaries.value')
        ->get();
        
        $zones = DB::table('zonesummaries')
        ->join('zones','zonesummaries.zone_id','=','zones.id')
        ->select('zones.zone','zonesummaries.value')
        ->get();

        $data['crop_name'] = array();
        $data['crop_value'] = array();

        $data['zone_name'] = array();
        $data['zone_value'] = array();


        foreach($crops as $crop)
        {
            $data['crop_name'][] = $crop->crop;
            $data['crop_value'][] = $crop->value;
        }

        foreach($zones as $zone)
        {
            $data['zone_name'][] = $zone->zone;
            $data['zone_value'][] = $zone->value;
        }

        return view('admin.reports.farmers',['data'=>$data]);
    }

    public function daily_reports_dates()
    {
        $data['dates'] = daily::select('date')->distinct()->orderBy('created_at', 'ASC')->get();
        return view('admin.reports.daily_reports_dates',['data'=>$data]);
       // print($data['dates']);
    }

    public function daily_reports($date)
    {
        $data['date'] = $date;
        $data['reports'] =  DB::table('daily')->where('date',$date)
        ->join('users','daily.user_id','=','users.id')
        ->join('departments','users.dep_id','=','departments.id')
        ->select('users.nom','users.prenom','users.position','departments.department','daily.activities','daily.observations')
        ->orderBy('daily.created_at', 'ASC')
        ->get();
        return view('admin.reports.daily_reports',['data'=>$data]);
    }

    //DEMONSTRATIONS GET
    public function sales_dates()
    {
        $data['dates'] = sales::select('date')->distinct()->orderBy('created_at', 'ASC')->get();
        return view('admin.sales.sales_dates',['data'=>$data]);
    }

    public function sales($date)
    {
        $data['date'] = $date;
        $data['sales'] =  DB::table('sales')->where('date',$date)
        ->join('users','sales.user_id','=','users.id')
        ->join('test_products','sales.product_id','=','test_products.id')
        ->select('users.nom','users.prenom','test_products.product','sales.cartons','observations')
        ->orderBy('sales.created_at', 'ASC')
        ->get();
        return view('admin.sales.sales',['data'=>$data]);
    }


    //POST ROUTES

    public function farmer_registration(Request $request)
    {
        $this->validate($request, [
            'nom' => ['required'],
            'prenom' => ['required'],
            'localite' => ['required'],
            'contact' => ['required'],
            'zone' => ['required'],
            'crops' => ['required'],
            'langue' => ['required'],
            
        ]);

        $farmer = new farmers;
        $farmer->nom = $request->input('nom');
        $farmer->prenom = $request->input('prenom');
        $farmer->localite = $request->input('localite');
        $farmer->contact = $request->input('contact');
        $farmer->zone_id = $request->input('zone');
        $farmer->language_id = $request->input('langue');
        $farmer->created_by_type = "admin";
        $farmer->created_by_id = Auth::user()->id;
        $farmer->save();

        $crops = $request->input('crops');
        $sizes = $request->input('sizes');

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
           


        return redirect()->back()->with('success','operation success');

    }

    public function farmer_update_account(Request $request,$id)
    {
        
        $this->validate($request, [
            'nom' => ['required'],
            'prenom' => ['required'],
            'localite' => ['required'],
            'contact' => ['required'],
            'zone' => ['required'],
            'langue' => ['required'],
            
        ]);

        try
        {
            
            farmers::where('id',$id)
            ->update(
                [
                'nom'=> $request->input('nom'),
                'prenom'=> $request->input('prenom'),
                'language_id'=>$request->input('langue'),
                'localite'=>$request->input('localite'),
                'zone_id'=>$request->input('zone'),
                'contact'=>$request->input('contact'),        
                ]
               );

            return redirect()->back()->with('success','operation success');
            
        }

        catch(\Exception $e)
        {
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062)
            {
                return redirect()->back()->with('error','duplicate data');
            }
            else
            {
                //return redirect()->back()->with('error','make sure you entered correct data');
                echo $e;
            }
        }

    }






    public function admin_registration(Request $request)
    {
        
        $this->validate($request, [
            'nom' => ['required'],
            'prenom' => ['required'],
            'departement' => ['required'],
            'position' => ['required'],
            'email' => ['required'],
            'contact' => ['required'],
            'profil' => ['required','max:1999'],
        ]);

        try
        {
            $filenameWithExt = $request->file('profil')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('profil')->getClientOriginalExtension();
            //upload Image
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // upload Image
            $path = $request->file('profil')->storeAs('public/admins/profil_images',$fileNameToStore);

            $admin = new Admins;
            $admin->nom = $request->input('nom');
            $admin->prenom = $request->input('prenom');
            $admin->dep_id = $request->input('departement');
            $admin->position = $request->input('position');
            $admin->email = $request->input('email');
            $admin->contact = $request->input('contact');
            $admin->profil = $fileNameToStore;
            $admin->status = 1;
            $admin->default_password = rand(1000,9999);
            $admin->password = Hash::make($admin->default_password);
            $admin->ip_address = 'en attente';
            $admin->last_login = 'en attente';
            $admin->login_details = 'en attente';
            $admin->save();
            totalsummaries::where('id',1)->increment('users');

            return redirect()->back()->with('success','operation success');
            
        }

        catch(\Exception $e)
        {
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062)
            {
                return redirect()->back()->with('error','email address already used');
            }
            else
            {
                //return redirect()->back()->with('error','make sure you entered correct data');
                echo $e;
            }
        }

    }

    public function admin_update_account(Request $request,$id)
    {
        
        $this->validate($request, [
            'nom' => ['required'],
            'prenom' => ['required'],
            'departement' => ['required'],
            'position' => ['required'],
            'email' => ['required'],
            'contact' => ['required'],
        ]);

        try
        {
            
            Admins::where('id',$id)
            ->update(
                [
                'nom'=> $request->input('nom'),
                'prenom'=> $request->input('prenom'),
                'dep_id'=>$request->input('departement'),
                'position'=>$request->input('position'),
                'email'=>$request->input('email'),
                'contact'=>$request->input('contact'),        
                ]
               );

            return redirect()->back()->with('success','operation success');
            
        }

        catch(\Exception $e)
        {
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062)
            {
                return redirect()->back()->with('error','email address already used');
            }
            else
            {
                //return redirect()->back()->with('error','make sure you entered correct data');
                echo $e;
            }
        }

    }

    


    public function user_registration(Request $request)
    {
        
        $this->validate($request, [
            'nom' => ['required'],
            'prenom' => ['required'],
            'departement' => ['required'],
            'position' => ['required'],
            'email' => ['required'],
            'contact' => ['required'],
            'profil' => ['required','max:1999'],
        ]);

        try
        {
            $filenameWithExt = $request->file('profil')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('profil')->getClientOriginalExtension();
            //upload Image
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // upload Image
            $path = $request->file('profil')->storeAs('public/users/profil_images',$fileNameToStore);

            $user = new User;
            $user->nom = $request->input('nom');
            $user->prenom = $request->input('prenom');
            $user->dep_id = $request->input('departement');
            $user->position = $request->input('position');
            $user->email = $request->input('email');
            $user->contact = $request->input('contact');
            $user->profil = $fileNameToStore;
            $user->status = 1;
            $user->default_password = rand(1000,9999);
            $user->password = Hash::make($user->default_password);
            $user->ip_address = 'en attente';
            $user->last_login = 'en attente';
            $user->login_details = 'en attente';
            $user->save();

            totalsummaries::where('id',1)->increment('users');

            return redirect()->back()->with('success','operation success');
            
        }

        catch(\Exception $e)
        {
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062)
            {
                return redirect()->back()->with('error','email address already used');
            }
            else
            {
                //return redirect()->back()->with('error','make sure you entered correct data');
                echo $e;
            }
        }

    }

    public function user_update_account(Request $request,$id)
    {
        
        $this->validate($request, [
            'nom' => ['required'],
            'prenom' => ['required'],
            'departement' => ['required'],
            'position' => ['required'],
            'email' => ['required'],
            'contact' => ['required'],
            
           
        ]);

        try
        {
           

            User::where('id',$id)
            ->update(
                [
                'nom'=> $request->input('nom'),
                'prenom'=> $request->input('prenom'),
                'dep_id'=>$request->input('departement'),
                'position'=>$request->input('position'),
                'email'=>$request->input('email'),
                'contact'=>$request->input('contact'),       
                ]
               );

            return redirect()->back()->with('success','operation success');
            
        }

        catch(\Exception $e)
        {
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062)
            {
                return redirect()->back()->with('error','email address already used');
            }
            else
            {
                //return redirect()->back()->with('error','make sure you entered correct data');
                echo $e;
            }
        }

    }



}
