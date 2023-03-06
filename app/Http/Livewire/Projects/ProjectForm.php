<?php

namespace App\Http\Livewire\Projects;

use App\Models\Delivery;
use App\Models\Project;
use App\Traits\WithToaster;
use App\Models\Promotion;
use App\Models\PromotionType;
use Livewire\Component;

class ProjectForm extends Component
{
    use WithToaster;

    public $project;
    public $edit = false;

    protected $listeners = [
        'projectEdit'   => 'edit',
        'projectDelete' => 'delete',
    ];

    public function mount() {
        $this->project = new Project();

        $this->edit = false;
    }

    public function render()
    {
        return view('livewire.projects.project-form');
    }

    public function submit() 
    {
        $this->validate();
        $updated = $this->project->id > 0;

        $this->project->save();

        $this->alert("success", "Success", "Project successfully ".($updated ? "updated" : "added"));

        $this->refreshAll();
    }

    public function edit(Project $project) 
    {
        $this->resetValidation();
        
        $this->edit = true;
        $this->project = $project;
    }

    public function delete(Project $project) 
    {
        Delivery::where('project_id', $project->id)->delete();

        $project->delete();
        $this->alert("success", "Success", "Project deleted");

        $this->refreshAll();

        return;
    }

    public function cancel() 
    {
        $this->resetValidation();
        $this->refreshAll();
    }

    public function refreshAll() 
    {
        $this->mount(new Project());        
        $this->emit('refreshComponent');
        $this->emit('pg:eventRefresh-default');
    }

    public function rules() {
        return [
            "project.name" => [
                "required",
                "min:2",
                "max:32"
            ]
        ];
    }

    public function messages() {
        return [
            "project.name.required" => "You must enter a project name",
        ];
    }
}
