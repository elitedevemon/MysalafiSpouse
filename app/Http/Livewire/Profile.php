<?php

namespace App\Http\Livewire;

use App\Mail\ProfileCradational;
use App\Mail\UserInformation;
use App\Models\Balance;
use App\Models\User;
use App\Models\UserScholar;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Swift_TransportException;
use Illuminate\Support\Str;

class Profile extends Component
{
    public $user_id;
    protected $queryString = ['user_id'];
    public $email;
    public $schlr;
    public $dob;
    public $gender = 'Male';
    public $profile_code;
    public $type;
    public $ethnicity;
    public $residence;
    public $age;
    public $height;
    public $about;
    public $potential_spouse;
    public $scholars = [];
    public $any_other_information;
    public $visibility;
    public $guardian;
    public $other_scholars;
    public $status;
    public $password;
    
    public function mount()
    {
        if($this->user_id){
            $user = User::find($this->user_id);
            $this->scholars=UserScholar::where('user_id', $this->user_id)->pluck('name');
            // dd($this->scholars);
            $this->email = $user->email;
            $this->other_scholars = $user->other_scholars;
            if($user->other_scholars){
                $this->schlr = true;
            }
            $this->dob = $user->dob;
            $this->gender = $user->gender;
            $this->profile_code = $user->type == 'UK Base' ? substr($user->profile_code,2) : substr($user->profile_code,3); 
            $this->type = $user->type;
            $this->ethnicity = $user->ethnicity;
            $this->residence = $user->residence;
            $this->age = $user->age;
            $this->height = $user->height;
            $this->about = $user->about;
            $this->potential_spouse = $user->potential_spouse;
            $this->other_scholars = $user->other_scholars;
            $this->any_other_information = $user->any_other_information;
            $this->visibility = $user->visibility;
            $this->guardian = $user->guardian;
            $this->status = $user->status;
        }
    }
    public function store()
    {
        // dd($this->scholars);
        $validatedData = $this->validate([
            'email' => 'required|email|unique:users,email',
            'dob' => 'required',
            'residence' => 'required',
            'gender' => 'required',
            'profile_code' => 'required|integer',
            'type' => 'required',
            'ethnicity' => 'required',
            'age' => 'required|integer',
            'height' => 'required',
            'about' => 'required',
            'potential_spouse' => 'required',
            'other_scholars' => $this->schlr ? 'required' : 'nullable',
            'any_other_information' => 'required',
            'visibility' => 'required',
            'status' => 'required',
            'guardian' => $this->gender == 'Female' ? 'required': 'nullable',
            // "scholars"    => "required",
            // "scholars.*"  => "required|string|distinct|min:1",
        ]);
        // dd($validatedData); 
        if($this->gender == 'Female' && $this->type == 'UK Base'){
            $validatedData['profile_code'] = '#F'.$this->profile_code;
        }
        elseif($this->gender == 'Female' && $this->type == 'International'){
            $validatedData['profile_code'] = '#IF'.$this->profile_code;
        }
        elseif($this->gender == 'Male' && $this->type == 'UK Base'){
            $validatedData['profile_code'] = '#M'.$this->profile_code;
        }
        elseif($this->gender == 'Male' && $this->type == 'International'){
            $validatedData['profile_code'] = '#IM'.$this->profile_code;
        }
        $codeAlready = User::where('profile_code', $validatedData['profile_code'])->first();
        if($codeAlready){
            $this->errorBag->add('profile_code', 'Code already taken');
            return;
        }
        $rendomPassword = Str::random(8);
        $password = Hash::make($rendomPassword);
        $validatedData['password'] = $password; 
        $user = User::forceCreate($validatedData);
        $user->other_scholars = $this->other_scholars;
        $lock_profile_date = date('m-d', strtotime($user->dob));
        $currentDate = date('Y-').$lock_profile_date;
        if($currentDate < date('Y-m-d')){
            $user->lock_profile_date  = date('Y-m-d', strtotime($currentDate.'+1 years'));
            // date('Y-m-d', strtotime($currentDate->addYear()))
        }else{
            $user->lock_profile_date  = $currentDate;
        }
        $user->update();
        if(isset($this->scholars)){
            foreach($this->scholars as $item){
                UserScholar::forceCreate([
                    'user_id' => $user->id,
                    'name' => $item,
                ]);
            }
        }
        Balance::forceCreate([
            'user_id' => $user->id,
            'qty' => 1,
            'type' => $user->type == 'International' ? 'International match request' : 'Match request',
        ]);
        try {
            Mail::to($user)->send(new ProfileCradational(['email' => $user->email, 'password' => $rendomPassword]));
        }
        catch(Swift_TransportException $ex){
            $this->errorBag->add('authcode', 'There was an error sending otp');
        }
        session()->flash('message', 'Profile create successfully.');
        return redirect('/superadmin/profile');
        // dd($user->email. '<br>'. $rendomPassword);
        
    }
    public function update()
    {
        // dd();
      
        $validatedData = $this->validate([
            'email' => 'required|email|unique:users,email,'.$this->user_id,
            'dob' => 'required',
            'residence' => 'required',
            'gender' => 'required',
            'profile_code' => 'required',
            'type' => 'required',
            'ethnicity' => 'required',
            'age' => 'required|integer',
            'height' => 'required',
            'about' => 'required',
            'potential_spouse' => 'required',
            // 'scholars' => 'required',
            'any_other_information' => 'required',
            'visibility' => 'required',
            'status' => 'required',
            'guardian' => $this->gender == 'Female' ? 'required': 'nullable',
        ]);
        $user = User::find($this->user_id);
       
        if($user->email != $this->email){
            // dd('ad');
            $rendomPassword = Str::random(8);
            $password = Hash::make($rendomPassword);
            $validatedData['password'] = $password;
            $user->email = $this->email;
            $user->other_scholars = $this->other_scholars;
            $user->password = $password;
            $user->update();
            try {
                Mail::to($user)->send(new ProfileCradational(['email' => $this->email, 'password' => $rendomPassword]));
            }
            catch(Swift_TransportException $ex){
                $this->errorBag->add('authcode', 'There was an error sending otp');
            } 
        }
        $user->other_scholars = $this->other_scholars;
        $user->update();
        
        if($this->gender == 'Female' && $this->type == 'UK Base'){
            $validatedData['profile_code'] = '#F'.$this->profile_code;
        }
        if($this->gender == 'Male' && $this->type == 'UK Base'){
            $validatedData['profile_code'] = '#M'.$this->profile_code;
        }
        if($this->gender == 'Female' && $this->type == 'International'){
            $validatedData['profile_code'] = '#IF'.$this->profile_code;
        }
        if($this->gender == 'Male' && $this->type == 'International'){
            $validatedData['profile_code'] = '#IM'.$this->profile_code;
        }
        $codeAlready = User::where('profile_code', $validatedData['profile_code'])->where('id', '!=', $this->user_id)->first();
        if($codeAlready){
            $this->errorBag->add('profile_code', 'Code already taken');
            return;
        }
        // $validatedData['email'] = $user->email;
        $user->update($validatedData);
        $user->about = $this->about;
        $user->update();
        // if(isset($this->scholars)){
                
                UserScholar::where('user_id', $user->id)->delete();
                
                foreach($this->scholars as $item){
                //    dd($user->id);
                    UserScholar::forceCreate([
                        'user_id' => $user->id,
                        'name' => $item,
                    ]);
                }
        // }
        
        
        session()->flash('message', 'Profile update successfully.');
        return redirect('/superadmin/profile');
        // dd($user->email. '<br>'. $rendomPassword);
        
    }
    public function render()
    {
        return view('livewire.profile');
    }
}
