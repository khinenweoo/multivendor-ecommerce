<?php

namespace App\Http\Livewire\Seller;

use Livewire\Component;
use App\Models\Shop;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class BannerComponent extends Component
{
    use WithFileUploads;
    protected $shop;
    public $banner_image;
    public $newimage;
    public $updateMode = false;


    public function render()
    {
        $this->shop = Shop::where(['seller_id' => auth('seller')->user()->id])->first();
        return view('livewire.seller.banner-component', ['shop' => $this->shop]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submit()
    {
        $dataValid = $this->validate([
            'banner_image' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);

        $str = Str::random(10);
        $ext = strtolower($this->banner_image->getClientOriginalExtension()); 
        $imageFullName = $str.'.'.$ext;

        $upload_image = $this->banner_image->storeAs('shop_banners', $imageFullName, 'public');

        if(isset($upload_image)) {

            $shop = Shop::where(['seller_id' => auth('seller')->user()->id])->first();
            $shop->banner = $imageFullName;
            $shop->update();
        }

        session()->flash('message', 'Banner Image uploaded successfully.');
        return redirect()->back();
    }
}
