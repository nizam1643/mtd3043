<?php

namespace App\Http\Livewire;

use App\Models\M2Group;
use Livewire\Component;
use Livewire\WithPagination;

class Group extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $searchTerm, $group, $group_code, $group_id;
    public $updateMode = false;

    protected $rules = [
        'group' => 'required',
        'group_code' => 'unique:App\Models\M2Group,group_code',
    ];

    public function render()
    {

        $searchTerm = '%'.$this->searchTerm.'%';
        return view('livewire.group.group',[
            'groups' => M2Group::where('group','like', $searchTerm)->paginate(5)
        ]);
    }

    private function resetInputFields(){
        $this->group = '';
        $this->group_code = '';
    }

    public function store()
    {
        $this->validate();

        M2Group::create([
            'group' => $this->group,
            'group_code' => $this->group_code,
        ]);

        session()->flash('message', 'Created Successfully.');

        $this->resetInputFields();

        $this->emit('userStore'); // Close model to using to jquery

    }

    public function edit($id)
    {
        $this->updateMode = true;
        $group = M2Group::where('id',$id)->first();
        $this->group_id = $id;
        $this->group = $group->group;
        $this->group_code = $group->group_code;

    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();


    }

    public function update()
    {

        if ($this->group_id) {
            $group = M2Group::find($this->group_id);
            $group->update([
                'group' => $this->group,
                'group_code' => $this->group_code,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Updated Successfully.');
            $this->resetInputFields();

        }
    }

    public function delete($id)
    {
        if($id){
            M2Group::where('id',$id)->delete();
            session()->flash('message', 'Deleted Successfully.');
        }
    }
}
