<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;
use Carbon\Carbon;

class CouponComponent extends Component
{
    protected $coupons;
    public $deleteId;

    public function render()
    {
        $coupons = Coupon::all();
        return view('livewire.admin.coupon-component', ['coupons'=>$coupons]);
    }


    public function confirmDelete($coupon_id)
    {
        $this->deleteId = $coupon_id;
    }

    public function deleteCoupon()
    {
        if($this->deleteId){
            Coupon::find($this->deleteId)->delete();
            session()->flash('message', 'Coupon has been deleted successfully!');
        }
    }

}
