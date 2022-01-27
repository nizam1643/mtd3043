<?php

namespace App\Http\Livewire;

use App\Models\M1Year;
use Livewire\Component;
use Livewire\WithPagination;

class Year extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $searchTerm, $year, $batch_code, $year_id;
    public $updateMode = false;

    protected $rules = [
        'year' => 'required|integer|min:2022|digits:4',
        'batch_code' => 'required|size:4|unique:App\Models\M1Year,batch_code',
    ];

    public function render()
    {

        $searchTerm = '%'.$this->searchTerm.'%';
        return view('livewire.year.year',[
            'years' => M1Year::where('year','like', $searchTerm)->paginate(5)
        ]);
    }

    private function resetInputFields(){
        $this->year = '';
        $this->bacth_code = '';
    }

    public function store()
    {
        $this->validate();

        M1Year::create([
            'year' => $this->year,
            'batch_code' => $this->batch_code,
        ]);

        session()->flash('message', 'Created Successfully.');

        $this->resetInputFields();

        $this->emit('userStore'); // Close model to using to jquery

    }

    public function edit($id)
    {
        $this->updateMode = true;
        $year = M1Year::where('id',$id)->first();
        $this->year_id = $id;
        $this->year = $year->year;
        $this->batch_code = $year->batch_code;

    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();


    }

    public function update()
    {

        if ($this->year_id) {
            $user = M1Year::find($this->year_id);
            $user->update([
                'year' => $this->year,
                'batch_code' => $this->batch_code,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Updated Successfully.');
            $this->resetInputFields();

        }
    }

    public function delete($id)
    {
        if($id){
            M1Year::where('id',$id)->delete();
            session()->flash('message', 'Deleted Successfully.');
        }
    }
}
