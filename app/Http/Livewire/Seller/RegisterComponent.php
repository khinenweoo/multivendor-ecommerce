<?php

namespace App\Http\Livewire\Seller;

use Livewire\Component;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Shop;
use App\Models\Admin;
use App\Models\Seller;
use Livewire\WithFileUploads;

use App\Notifications\AdminNewShopNotification;
use App\Notifications\SellerRegisterSuccessNotification;
use Illuminate\Support\Facades\Notification;

class RegisterComponent extends Component
{
    use WithFileUploads;
    public $shop_name, $shop_slug;
    public $register_person, $role, $nrc_number, $nrc_front, $nrc_back, $email, $mobile, $viber_no;
    public $account_type, $company_name, $other_category, $business_register_no;
    public $business_location, $pickup_address, $website_url, $business_email, $logo_image;
    public $business_register_form = null;
    public $licence_certi_file = null;
    public $terms;
    public $seller_id, $password;

    public $totalSteps = 3;
    public $currentStep = 1;

    public $category;
    public $main_categories = [];


    public function mount()
    {
        $this->currentStep = 1;
    }

    public function generateslug()
    {
        $this->shop_slug = Str::slug($this->shop_name);
    }

    public function render()
    {
        $parent_categories = Category::whereNull('parent_id')->get();
        return view('livewire.seller.register-component',  ['parent_categories' => $parent_categories]);
    }


    public function increaseStep()
    {
        $this->resetErrorBag();// This method clear the error bag.
        $this->validateData();
        $this->currentStep++;
        if($this->currentStep > $this->totalSteps){
            $this->currentStep = $this->totalSteps;
        }
    }
    public function decreaseStep()
    {
        $this->resetErrorBag();
        
        $this->currentStep--;
        if($this->currentStep < 1){
            $this->currentStep = 1;
        }
    }

    public function validateData()
    {
       
        if($this->currentStep == 1){
            $this->validate([
                'register_person' => 'required|string',
                'email' => 'required|email|unique:sellers,email',
                'password' => 'required|string|min:8',
                'role' => 'required|string',
                'nrc_number' => 'required',
                'nrc_front' => 'required|image|max:1024',
                'nrc_back' => 'required|image|max:1024',
                'mobile' => 'required|numeric|min:12',
                'viber_no' => 'numeric|nullable|min:12',
            ]);         

        }elseif($this->currentStep == 2){

            $this->validate([
                'shop_name' => 'required|string',
                'business_email' => 'required|email|unique:shops,business_email',
                'business_location' => 'required|string',     
                'main_categories' => 'required',
                'other_category' => 'nullable|string',
            ]);

        }
 
    }

    public function shopRegister()
    {
        $this->resetErrorBag();
        if($this->currentStep == 3){
            $this->validate([
                'account_type' => 'required',
                'company_name' => 'nullable|string',
                'business_register_no' => 'nullable|string',
                'business_register_form' => 'nullable|mimes:pdf|max:1024',
                'licence_certi_file' =>  'nullable|mimes:pdf|max:1024',
                'pickup_address' => 'required|string',
                'logo_image' => 'required|mimes:png,jpg,jpeg',
                'website_url' => 'nullable|string',
                'terms' => 'accepted'
            ]);
        }
        
        $nrc_front_name = 'NRC_'.$this->nrc_front->getClientOriginalName();
        $upload_nrc_front = $this->nrc_front->storeAs('sellers_nrc_front', $nrc_front_name, 'public');

        $nrc_back_name = 'NRC_'.$this->nrc_back->getClientOriginalName();
        $upload_nrc_back = $this->nrc_back->storeAs('sellers_nrc_back', $nrc_back_name, 'public');

        if(!is_null($this->business_register_form)){
            $business_register_file = 'B_REG_'.$this->business_register_form->getClientOriginalName();
            $upload_business_regform = $this->business_register_form->storeAs('business_reg_forms', $business_register_file, 'public');
        }else{
            $business_register_file = '';
        }
        
        if(!is_null($this->licence_certi_file)){
            $licencefile = Str::random(10);
            $licencefile_ext = strtolower($this->licence_certi_file->getClientOriginalExtension());
            $licence_certi_file = $licencefile.'.'.$licencefile_ext;
            $upload_licence_certiform = $this->licence_certi_file->storeAs('LicenceandCerti_files', $licence_certi_file, 'public');
        }else{
            $licence_certi_file = '';
        }

        $logo_name = Str::random(10);
        $logo_ext = strtolower($this->logo_image->getClientOriginalExtension());
        $logoFullName = $logo_name.'.'.$logo_ext;
        $upload_logo = $this->logo_image->storeAs('shop_logos', $logoFullName, 'public');

        if($upload_nrc_front && $upload_nrc_back){

            $sellerData = Seller::create([
                'name' => $this->register_person,
                'password' => \Hash::make($this->password),
                'role' => $this->role,
                'email' => $this->email,
                'nrc_number' => $this->nrc_number,
                'nrc_front' => $nrc_front_name,
                'nrc_back' => $nrc_back_name,
                'mobile' => $this->mobile,
                'viber_no' => $this->viber_no,
            ]);
        
            if($sellerData){

                $shoprequestData = Shop::create([
                    'shop_name' => $this->shop_name,
                    'shop_slug' => $this->shop_slug,
                    'seller_id' => $sellerData->id,
                    'main_categories' => $this->main_categories,
                    'account_type' => $this->account_type,
                    'company_name' => $this->company_name,
                    'business_register_no' => $this->business_register_no,
                    'business_register_form' => $business_register_file,
                    'licence_certi_file' => $licence_certi_file,
                    'other_category' => $this->other_category,
                    'business_email' => $this->business_email,
                    'logo_image' => $logoFullName,
                    'website_url' => $this->website_url,
                    'business_address' => $this->business_location,
                    'pickup_address' => $this->pickup_address,
                ]);
                
                $seller = Seller::where('id', $sellerData->id)->first();
                $seller->notify(new SellerRegisterSuccessNotification($sellerData));

                $admins = Admin::all();
                foreach($admins as $admin) {
                    // mailtrap issue
                    // $admin->notify(new AdminNewShopNotification($shoprequestData));
                }
    
                session()->flash('message', 'Your shop has been registered successfully.');
                $this->resetInput();
                return redirect()->route('seller.successpage');
            }
        }

    }

    private function resetInput()
    {
 
        $this->register_person = '';
        $this->role ='';
        $this->nrc_number = '';
        $this->nrc_front = '';
        $this->nrc_back = '';
        $this->email = '';
        $this->mobile = '';
        $this->viber_no = '';
        $this->shop_name = '';
        $this->account_type = '';
        $this->company_name = '';
        $this->business_register_no = '';
        $this->business_register_form = '';
        $this->licence_certi_file = '';
        $this->childcategory = '';

    }
}
