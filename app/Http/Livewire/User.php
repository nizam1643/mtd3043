<?php

namespace App\Http\Livewire;

use App\Models\User as ModelsUser;
use Livewire\Component;
use Livewire\WithPagination;

class User extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $searchTerm, $name, $email, $level, $user_id;
    public $updateMode = false;

    protected $rules = [
        'name' => 'required',
        'email' => 'unique:App\Models\User,email',
        'level' => 'required',

    ];

    public function render()
    {

        $searchTerm = '%'.$this->searchTerm.'%';
        return view('livewire.user.user',[
            'users' => ModelsUser::where('name','like', $searchTerm)->paginate(5)
        ]);
    }

    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->level = '';
    }

    public function store()
    {
        $this->validate();

        ModelsUser::create([
            'name' => $this->name,
            'email' => $this->email,
            'system_level' => $this->level,
        ]);

        session()->flash('message', 'Created Successfully.');

        $this->resetInputFields();

        $this->emit('userStore'); // Close model to using to jquery

    }

    public function edit($id)
    {
        $this->updateMode = true;
        $user = ModelsUser::where('id',$id)->first();
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->level = $user->system_level;

    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();


    }

    public function update()
    {

        if ($this->user_id) {
            $group = ModelsUser::find($this->user_id);
            $group->update([
                'name' => $this->name,
                'email' => $this->email,
                'system_level' => $this->level,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Updated Successfully.');
            $this->resetInputFields();

        }
    }

    public function delete($id)
    {
        if($id){
            ModelsUser::where('id',$id)->delete();
            session()->flash('message', 'Deleted Successfully.');
        }
    }
}

