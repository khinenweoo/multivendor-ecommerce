<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class UserComponent extends Component
{
    protected $users;
    public $deleteId;

    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = 'asc';

    public function render()
    {
        $this->fetchUsers();
        return view('livewire.admin.user-component', [
            'users' => $this->users
        ]);
    }
    public function fetchUsers() 
    {
        $users = User::search($this->search)
        ->simplePaginate($this->perPage);
        $this->users = $users;
    }
}
