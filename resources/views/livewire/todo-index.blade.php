<div>
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Detail</th>
        <th scope="col">Status</th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($todo as $item)
        <tr>
            <th scope="row">{{ $item->id }}</th>
            <td>{{ $item->title }}</td>
            <td>{{ $item->detail }}</td>
            <td>{{ $item->status }}</td>
            <td>
                @if ($item->status != 'done')
                <button wire:click="markDone({{ $item->id }})"=ass="btn-sm-sucess">Mark As Done</button>
                @endif
                <button wire:click="getTodo({{ $item->id }})" class="btn btn-sm btn-info">Edit</button>
                <button wire:click="destroy({{ $item->id }})" class="btn btn-sm btn-danger">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
