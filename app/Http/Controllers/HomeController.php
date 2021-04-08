<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /* Displaying user list*/
    public function userList()
    {
        $search = request()->query('search');
        
        if($search){
            $userdata = User::where(request()->query('filter'), 'like', '%' . $search . '%') 
            ->get();
         }else{
            $userdata = User::select('id','name', 'email', 'mobile_no', 'status')->get();    
         }
        
        return view('user-list', compact('userdata'));

    }

    // add or edit user  
    public function addEditUser($id = 0)
    {
        $userdata = new User();

        if($id){
            $userdata = User::find($id);
        }

        return view('add-edit-user', compact('userdata'));
    }

    // View user
    public function viewUser($id = 0)
    {
         $userdata = User::find($id);
         return view('view-user', compact('userdata'));
    }

    // Updating user
    public function storeUser()
    {
        $hashedPassword = Hash::make(request()->password);
        if(request()->id){
           
            if(request()->file('profile_image')){
                $name = request()->file('profile_image')->getClientOriginalName();
                $destinationPath = public_path('/images');
                request()->file('profile_image')->move($destinationPath,$name);
            }

            $user = User::find(request()->id);
            $user->name = request()->name;
            $user->username = request()->username;
            $user->email = request()->email;
            $user->password = $hashedPassword;
            $user->mobile_no = request()->mobile_no;
            $user->address = request()->address;
            $user->city = request()->city;
            $user->state = request()->state;
            $user->country = request()->country;      
            if(request()->file('profile_image')){
            $user->profile_image =  $name;
            }
            $user->dob = request()->dob;
            $user->save();

        }else{
            
            $name ='';
            if(request()->file('profile_image')){
                $name = request()->file('profile_image')->getClientOriginalName();
                $destinationPath = public_path('/images');
                request()->file('profile_image')->move($destinationPath,$name);
            }
            User::create(['name'=>request()->name, 'username'=>request()->username, 'email'=>request()->email, 
            'password'=>$hashedPassword, 'mobile_no'=>request()->mobile_no,
            'profile_image'=> $name, 'dob'=>request()->dob,
            'address'=>request()->address, 'city'=>request()->city,
            'state'=>request()->state, 'country'=>request()->country]);
        }

        return redirect('user-list');

    }

    // Delete user
    public function deleteUser($id = 0)
    {
        $userdata = User::find($id);
        if($userdata->delete()){
            return 'success';
        }  
    }


}
