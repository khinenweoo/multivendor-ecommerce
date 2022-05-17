<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Shop;
use App\Models\Seller;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Carbon\Carbon;

class EditShopComponent extends Component
{
    use WithFileUploads;
    public $shop_id, $shop_name, $shop_slug, $seller_id, $account_type, $shop_status;
    public $shop_logo, $shop_cover, $shop_email, $shop_address, $pickup_address, $deal_date, $format_date;
    public  $owner_name, $role, $email, $mobile, $viber_no;
    public $new_shop_logo, $new_shop_cover;

    public function mount($slug)
    {
        $shop = Shop::where('shop_slug', $slug)->first();
        $this->shop_id = $shop->shop_id;
        $this->shop_name = $shop->shop_name;
        $this->shop_slug = $shop->shop_slug;
        $this->account_type = $shop->account_type;
        $this->seller_id = $shop->seller_id;
        $this->shop_logo = $shop->logo_image;
        $this->shop_cover = $shop->banner;
        $this->shop_email = $shop->business_email;
        $this->shop_address = $shop->business_address;
        $this->pickup_address = $shop->pickup_address;
        $this->deal_date = $shop->featured_expiry_date;
        $this->shop_status = $shop->is_active;
        //seller details 
        $seller = Seller::where('id', $this->seller_id)->first();
        $this->owner_name = $seller->name;
        $this->role = $seller->role;
        $this->email =  $seller->email;
        $this->mobile =  $seller->mobile;
        $this->viber_no =  $seller->viber_no;

        if(!is_null($this->deal_date)){
            $this->format_date = Carbon::parse($this->deal_date)->isoFormat('LLLL');
        }
    }

    public function render()
    {
        return view('livewire.admin.edit-shop-component');
    }

    public function updateShop()
    {
        // update shop logo
        if($this->new_shop_logo) {
            $logo_name = $this->new_shop_logo->getClientOriginalName();
            $upload_logo = $this->new_shop_logo->storeAs('shop_logos', $logo_name, 'public');
        }else {
            $logo_name = $this->shop_logo;
        }
        //update shop cover
        if($this->new_shop_cover) {
            $str = Str::random(7);
            $ext = strtolower($this->new_shop_cover->getClientOriginalExtension()); 
            $coverFullName = $str.'.'.$ext;

            $upload_cover = $this->new_shop_cover->storeAs('shop_banners', $coverFullName, 'public');
        }else{
            $coverFullName = $this->shop_cover;
        }

        $update_shop_data = array(
            'shop_name' => $this->shop_name,
            'shop_slug' => $this->shop_slug,
            'account_type' => $this->account_type,
            'business_email' => $this->shop_email,
            'logo_image' => $logo_name,
            'banner' => $coverFullName,
            'business_address' => $this->shop_address,
            'pickup_address' => $this->pickup_address,
            'featured_expiry_date' => $this->deal_date,
        );

        $updateshop = Shop::updateOrCreate(['shop_id' => $this->shop_id], $update_shop_data);

        session()->flash('message', 'Shop data has been updated successfully.');
        return redirect()->back();
        
    }
}
