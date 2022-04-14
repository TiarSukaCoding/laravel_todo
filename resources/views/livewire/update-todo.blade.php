<div class="card">
    <div class="card-header">
        <div>{{ __('Edit ToDo') }}</div>
    </div>
    <div class="card-body">
        <form wire:submit.prevent="update({{ Auth::user()->id }})">
            <input type="hidden" name="id" wire:model="todoId">
            <div class="form-group">
                <label for="title">Title</label>
                <input wire:model="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title">
                @error('title')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="detail">Detail</label>
                <textarea wire:model="detail" class="form-control @error('detail') is-invalid @enderror" name="detail" id="detail" cols="30" rows="3"></textarea>
                @error('detail')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select wire:model="status" id="status" class="form-control @error('status') is-invalid @enderror" id="status">
                    <option value="">Please select</option>
                    <option value="waiting">Waiting</option>
                    <option value="on-process">On-Process</option>
                    <option value="done">Done</option>
                </select>
                @error('status')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
