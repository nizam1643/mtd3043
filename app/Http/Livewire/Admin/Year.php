<?php

namespace App\Http\Livewire\Admin\Year;

use App\Models\M1Year;
use Livewire\Component;

class Year extends Component
{
    public $year, $batch_code, $year_id;
    public $updateMode = false;

    public function render()
    {
        $this->year = M1Year::all();
        return view('livewire.admin.year');
    }

    private function resetInputFields(){
        $this->year = '';
        $this->bacth_code = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'year' => 'required|integer',
            'batch_code' => 'required',
        ]);

        M1Year::create($validatedDate);

        session()->flash('message', 'Users Created Successfully.');

        $this->resetInputFields();

        $this->emit('userStore'); // Close model to using to jquery

    }

    public function edit($id)
    {
        $this->updateMode = true;
        $user = M1Year::where('id',$id)->first();
        $this->year_id = $id;
        $this->year = $user->year;
        $this->batch_code = $user->batch_code;

    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();


    }

    public function update()
    {
        $validatedDate = $this->validate([
            'year' => 'required|integer',
            'batch_code' => 'required',
        ]);

        if ($this->user_id) {
            $user = M1Year::find($this->user_id);
            $user->update([
                'year' => $this->year,
                'batch_code' => $this->batch_code,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Users Updated Successfully.');
            $this->resetInputFields();

        }
    }

    public function delete($id)
    {
        if($id){
            M1Year::where('id',$id)->delete();
            session()->flash('message', 'Users Deleted Successfully.');
        }
    }
}
