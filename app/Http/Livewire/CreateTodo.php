<?php

namespace App\Http\Livewire;

use App\Models\todo;
use Livewire\Component;

class CreateTodo extends Component
{
    public $title,$detail,$status;
    public function render()
    {
        return view('livewire.create-todo');
    }

    public function store($user_id)
    {
        $this->validate([
            'title' => 'required',
            'detail' => 'required',
            'status' => 'required|in:waiting,on-process,done'
        ]);

        $todo = todo::create([
            'user_id' => $user_id,
            'title' => $this->title,
            'detail' => $this->detail,
            'status' => $this->status
        ]);

        $this->resetInput();

        $this->emit('todoStored', $todo);
    }

    private function resetInput()
    {
        $this->title = null;
        $this->detail = null;
        $this->status = null;
    }
}
