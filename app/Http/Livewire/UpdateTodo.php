<?php

namespace App\Http\Livewire;

use App\Models\todo;
use Livewire\Component;

class UpdateTodo extends Component
{
    public $title,$detail,$status,$todoId;

    protected $listeners = [
        'getTodo' => 'showTodo',
    ];

    public function render()
    {
        return view('livewire.update-todo');
    }

    public function showTodo($todo)
    {
        $this->title = $todo['title'];
        $this->detail = $todo['detail'];
        $this->status = $todo['status'];
        $this->todoId = $todo['id'];
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'detail' => 'required',
            'status' => 'required|in:waiting,on-process,done'
        ]);

        if($this->todoId){
            $todo = todo::findOrFail($this->todoId);
            $todo->update([
                'title' => $this->title,
                'detail' => $this->detail,
                'status' => $this->status
            ]);

            $this->resetInput();

            $this->emit('todoUpdated',$todo);
        }
    }

    private function resetInput()
    {
        $this->title = null;
        $this->detail = null;
        $this->status = null;
    }
}
