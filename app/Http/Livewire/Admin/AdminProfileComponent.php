<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
class AdminProfileComponent extends Component
{
    use WithFileUploads;
    public $name, $username, $role, $email, $nrc_number, $phone, $profile_photo, $address, $about;
    public $company_name;
    public $admin_id;
    public $newphoto;

    public function mount() {
        $user = Admin::find(auth('admin')->user()->id);
        $this->name = $user->name;
        $this->username = $user->username;
        $this->role = $user->role;
        $this->email = $user->email;
        $this->nrc_number = $user->nrc_number;
        $this->mobile = $user->mobile;
        $this->viber_no = $user->viber_no;
        $this->profile_photo = $user->profile_photo;
        $this->address = $user->address;
        $this->about = $user->about;
    }

    public function render()
    {
        return view('livewire.admin.admin-profile-component');
    }

}
