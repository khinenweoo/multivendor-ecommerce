<?php

namespace App\Http\Livewire\Seller;

use Livewire\Component;
use App\Models\Seller;
use App\Models\Shop;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SellerProfileComponent extends Component
{
    use WithFileUploads;
    public $name, $username, $role, $email, $nrc_number, $mobile, $viber_no, $profile_photo, $address, $about;
    public $company_name;
    public $seller_id;
    public $newphoto;

    public function mount() {
        $user = Seller::find(auth('seller')->user()->id);
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
        return view('livewire.seller.seller-profile-component');
    }
}
