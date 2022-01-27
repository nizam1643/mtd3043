<?php

namespace App\Http\Livewire;

use App\Models\M1Year;
use App\Models\M2Group;
use App\Models\M3Subject;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Subject extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $searchTerm, $subject, $subject_code, $desc, $thumbnail, $year_id, $year, $group_id, $group, $subject_id;
    public $updateMode = false;

    protected $rules = [
        'subject'  => 'required',
        'subject_code' => 'unique:App\Models\M3Subject,subject_code',
        'desc' => 'required',
        'thumbnail'  => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048|dimensions:max_width=600px,max_height=400px',
        'year_id' => 'required',
        'group_id' => 'required',
    ];

    public function render()
    {

        $this->year = M1Year::all();
        $this->group = M2Group::all();
        $searchTerm = '%'.$this->searchTerm.'%';
        return view('livewire.subject.subject',[
            'subjects' => M3Subject::where('subject','like', $searchTerm)->paginate(5)
        ]);
    }

    private function resetInputFields(){
        $this->subject = '';
        $this->subject_code = '';
        $this->desc = '';
        $this->thumbnail = '';
        $this->year_id = '';
        $this->group_id = '';
    }

    public function store()
    {
        $data=$this->validate();
        //dd($data);

        $filename = $this->thumbnail->store('documents','public');

        $data['thumbnail'] = $filename;

        M3Subject::create($data);

        session()->flash('message', 'Created Successfully.');

        $this->resetInputFields();

        $this->emit('userStore'); // Close model to using to jquery

    }

    public function edit($id)
    {
        $this->updateMode = true;
        $subject = M3Subject::where('id',$id)->first();
        $this->subject_id = $id;
        $this->subject = $subject->subject;
        $this->subject_code = $subject->subject_code;
        $this->desc = $subject->desc;
        $this->thumbnail = $subject->thumbnail;
        $this->year_id = $subject->year_id;
        $this->group_id = $subject->group_id;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();


    }

    public function update()
    {

        if ($this->subject_id && $this->thumbnail == NULL) {
            $subject = M3Subject::find($this->subject_id);
            $subject->update([
                'subject' => $this->subject,
                'subject_code' => $this->subject_code,
                'desc' => $this->desc,
                'thumbnail' => $this->thumbnail->store('documents','public'),
                'year_id' => $this->year_id,
                'group_id' => $this->group_id,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Updated Successfully.');
            $this->resetInputFields();
        }else {
            $subject = M3Subject::find($this->subject_id);
            $subject->update([
                'subject' => $this->subject,
                'subject_code' => $this->subject_code,
                'desc' => $this->desc,
                'year_id' => $this->year_id,
                'group_id' => $this->group_id,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Updated Successfully.');
            $this->resetInputFields();
        }
    }

    public function delete($id)
    {
        if($id){
            M3Subject::where('id',$id)->delete();
            session()->flash('message', 'Deleted Successfully.');
        }
    }
}
