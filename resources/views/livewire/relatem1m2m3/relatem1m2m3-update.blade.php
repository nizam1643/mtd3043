<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" wire:model="relate_id">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Year</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Year" wire:model="m1_id">
                        @error('m1_id') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Group</label>
                        <input type="text" class="form-control" id="exampleFormControlInput2" wire:model="m2_id" placeholder="Enter Group">
                        @error('m2_id') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput3">Subject</label>
                        <input type="text" class="form-control" id="exampleFormControlInput3" placeholder="Enter Subject" wire:model="m3_id">
                        @error('m3_id') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="formFile" class="form-labe4">Teacher</label>
                        <input type="text" class="form-control" id="exampleFormControlInput4" wire:model="user_id" placeholder="Enter Teacher">
                        @error('user_id') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Save changes</button>
            </div>
       </div>
    </div>
</div>
