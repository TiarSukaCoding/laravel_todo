<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\todo;
use Illuminate\Support\Facades\Auth;

class TodoIndex extends Component
{
    public $statusUp = false;
    public $todo;

    protected $listeners = [
        'todoStored' => 'handleStored',
        'todoUpdated' => 'handleUpdated'
    ];

    public function render()
    {
        $this->todo = todo::where('user_id',Auth::user()->id)->get();
        return view('livewire.todo-index');
    }

    public function getTodo($id)
    {
        $this->statusUpdate = true;
        $todo = todo::findOrFail($id);
        $this->emit('getTodo', $todo);
    }

    public function destroy($id){
        if ($id){
            $data = todo::findOrFail($id);
            $data->delete();
            session()->flash('message', 'todo berhasil di hapus');
        }
    }


    public function markDone($todoId)
    {
        if($todoId){
            $todo = todo::findOrFail($todoId);
            $todo->update([
                'status' => 'done'
            ]);
        }

        session()->flash('message', 'Todo'.$todo['title'].' berhasi di update');
        
    }

    public function handleStored($todo)
    {
        # membuat data todo
        session()->flash('message', 'Todo '.$todo['title'].' berhasil di buat');
    }

    public function handleUpdated($todo)
    {
        # mengupdate data todo
        session()->flash('message', 'Todo'.$todo['title'].' berhasi di update');
    }
}

