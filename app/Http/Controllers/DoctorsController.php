<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\DoctorInfo;
use App\DoctorType;

class DoctorsController extends Controller
{
    public function index(){
       
        $doctors=User::with('doctorInfo.doctorType')->where('role','d')->paginate(6);
        
        return view('doctors.index')->with( 'doctors',$doctors);
    }

    public function create(){
        $types=DoctorType::all();
        // return $types;
        $types = json_decode(json_encode($types), true);
        $types=array_column($types,'name', 'id');
        return view('admin.doctors.create')->with('types',$types);
    }
    
    public function show($id){
       
        $doctor=User::with('doctorInfo.doctorType')->find($id);
        
        return view('doctors.show')->with( 'doctor', $doctor);
        // return $doctor;
    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'name'=>'required|string',
            'email'=>'required|string',
            'password'=>'required|string',
            'type'=>'required',
        ]);

        $doctor=new User;
        $doctor->name=$request->name;
        $doctor->email=$request->email;
        $doctor->password=Hash::make($request->password);
        $doctor->role='d';

        if($doctor->save()){
            $info = new DoctorInfo;
            $info->bio=$request->bio;
            $info->user_id=$doctor->id;
            $info->doctor_type_id=$request->type;
            if($info->save()){
                return redirect('/admin/doctors')->with('success','Həkim əlavə olundu!');
            }else{
                return redirect('/admin/doctors')->with('error','Həkim məlumatı yüklənmədi!');
            }
        }
        else{
            return redirect('/admin/doctors')->with('error','Həkim yaradılmadı!');
        }
        
    }

    public function destroy($id)
    {
        $doctor=User::find($id);

        if($doctor->profile_image!='noimage.jpg'){
            Storage::delete('public/images/doctors/'.$doctor->cover_image);
        }

        if($doctor->doctorInfo()->delete()){
            $doctor->posts()->delete();
            $doctor->comments()->delete();
            // $info=DoctorInfo::where('doctor_id', $id)->first();
            if($doctor->delete()){
                return redirect('/admin/doctors')->with('success','Həkim Silindi');
            }
        }
        return redirect('/admin/doctors')->with('error','Həkim Silinmədi');
    }
}
