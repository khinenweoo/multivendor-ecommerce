<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Shop;
use App\Models\Seller;

use Illuminate\Support\Facades\Notification;
use App\Notifications\SellerApprovedNotification;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class ViewShopRequestComponent extends Component
{
    use WithFileUploads;
    public $shop_name, $shop_slug, $shop_id, $seller_id;
    public $register_person, $role, $nrc_number, $nrc_front, $nrc_back, $email, $mobile, $viber_no;
    public $account_type, $company_name, $other_category, $business_register_no, $business_register_form, $licence_certi_file;
    public $logo_image, $business_email, $business_address, $pickup_address, $website_url;
    public $is_approved;
    public $category_id, $selectd_category;
    public $new_logo_image;
    public $shop_status;


    public function mount($slug)
    {
        $shop = Shop::where('shop_slug', $slug)->first();
        $this->shop_id = $shop->shop_id;
        $this->shop_name = $shop->shop_name;
        $this->shop_slug = $shop->shop_slug;
        $this->seller_id = $shop->seller_id;
        $this->account_type =  $shop->account_type;
        $this->company_name =  $shop->company_name;
        $this->business_register_no =  $shop->business_register_no;
        $this->business_register_form =  $shop->business_register_form;
        $this->licence_certi_file =  $shop->licence_certi_file;
        $this->other_category =  $shop->other_category;
        $this->business_email =  $shop->business_email;
        $this->logo_image =  $shop->logo_image;
        $this->website_url =  $shop->website_url;
        $this->business_address =  $shop->business_address;
        $this->pickup_address =  $shop->pickup_address;
        $this->shop_status =  $shop->is_active;
        $this->category_id = $shop->category_id;
        // $this->selectd_category =  $shop->category->name;

        $seller = Seller::where('id', $this->seller_id)->first();
        $this->register_person = $seller->name;
        $this->role = $seller->role;
        $this->nrc_number = $seller->nrc_number;
        $this->nrc_front = $seller->nrc_front;
        $this->nrc_back = $seller->nrc_back;
        $this->email =  $seller->email;
        $this->mobile =  $seller->mobile;
        $this->viber_no =  $seller->viber_no;
        $this->is_approved =  $seller->approved;
    }

    public function render()
    {
        return view('livewire.admin.view-shop-request-component');
    }

    public function update()
    {
        if($this->new_logo_image) {

            $logo_name = Str::random(10);
            $logo_ext = strtolower($this->new_logo_image->getClientOriginalExtension());
            $logoFullName = $logo_name.'.'.$logo_ext;
            $upload_logo = $this->new_logo_image->storeAs('shop_logos', $logoFullName, 'public');

        }else {
            $logo_name = $this->logo_image;
        }
        if($this->is_approved == 1){
            $this->shop_status = 1;
        }


        $shopData = array(
            'shop_name' => $this->shop_name,
            'seller_id' => $this->seller_id,
            'category_id' => $this->category_id,
            'company_name' => $this->company_name,
            'account_type' => $this->account_type,
            'other_category' => $this->other_category,
            'business_register_no' => $this->business_register_no,
            'business_register_form' => $this->business_register_form,
            'licence_certi_file' => $this->licence_certi_file,
            'business_address' => $this->business_address,
            'pickup_address' => $this->pickup_address,
            'website_url' => $this->website_url,
            'business_email' => $this->business_email,
            'logo_image' => $logo_name,
            'is_active' => $this->shop_status,
        );

        $sellerData = array(
            'name' => $this->register_person,
            'role' => $this->role,
            'nrc_number' => $this->nrc_number,
            'nrc_front' => $this->nrc_front,
            'nrc_back' => $this->nrc_back,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'viber_no' => $this->viber_no,
            'approved' => $this->is_approved
        );
        $approved_status = $sellerData['approved'];
        
        $updateshop = Shop::updateOrCreate(['shop_id' => $this->shop_id], $shopData);        
        $updateseller = Seller::updateOrCreate(['id' => $this->seller_id], $sellerData); 

        $approved_seller = Seller::where('id', $this->seller_id)->first();


        if($approved_status == 1){
            // $approved_seller->notify(new SellerApprovedNotification($shopData));

            session()->flash('message', 'Shop Request data has been changed!');
            return redirect()->route('admin.shoprequests');
        }else {
            session()->flash('message', 'Shop request data has been updated but account not approve yet.');
            return redirect()->back();
        }
    }
}
