<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Carbon\Carbon;

class EditUserComponent extends Component
{
    protected $user;
    public $user_id;
    public $name, $last_name, $email, $phone, $profile_photo, $birth_date, $gender, $classifications, $about;
    public $route;
    
    public function mount($id)
    {
        $user = User::where('id', $id)->first();
        $this->name = $user->name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->profile_photo = $user->profile_photo;

        $this->birth_date =  $user->birth_date;
        $this->gender = $user->gender;
        $this->classifications = $user->classifications;
        $this->about = $user->about;
        $this->user_id = $user->id;

        $this->route = url()->previous();
    }

    // public function changeFormat($birthdate){
    //     return Carbon::createFromFormat('Y-m-d', $birthdate)->format('d-m-Y');
    // }

    public function render()
    {
        $user = $this->user;
        return view('livewire.admin.edit-user-component', ['user' => $user]);
    }

    
    public function update()
    {
      
        $this->validate([
            'name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'email' => 'string|exists:users,email',
            'phone' => 'numeric|nullable|min:10',
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|in:male,female',
            'classifications' => 'nullable|in:standard,silver,gold',
            'about' => 'nullable|string|max:300'
        ]);

        // $birthdate =  Carbon::createFromFormat('d-m-Y', $this->birth_date)->format('Y-m-d');
        $data = array(
            'name' => $this->name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'birth_date' => $this->birth_date,
            'gender' => $this->gender,
            'classifications' => $this->classifications,
            'about' => $this->about,
        );

        $updateUser = User::updateOrCreate(['id' => $this->user_id], $data);
        session()->flash('message', 'User has been updated successfully!');
        $this->resetInput();
        return redirect($this->route);

    }
    public function resetInput() {
        $this->name = null;
        $this->last_name = null;
        $this->email = null;
        $this->phone = null;
        $this->birth_date = null;
        $this->gender = null;
        $this->classifications = null;
        $this->about = null;
    }
}
