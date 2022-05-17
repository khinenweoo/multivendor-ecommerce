<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class BlogComponent extends Component
{
    public $blog_title, $blog_desc, $blog_image, $status;

    public function render()
    {
        return view('livewire.admin.blog-component');
    }

    public function fetchPost()
    {
        
    }
    
}
