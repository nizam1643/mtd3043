<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
CREATE
</button>

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Subject</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Subject" wire:model="subject">
                        @error('subject') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Subject Code</label>
                        <input type="text" class="form-control" id="exampleFormControlInput2" wire:model="subject_code" placeholder="Enter Group Code">
                        @error('subject_code') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput3">Description</label>
                        <textarea type="text" class="form-control" id="exampleFormControlInput3" placeholder="Enter Description" wire:model="desc"></textarea>
                        @error('desc') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="formFile" class="form-labe4">Thumbnail Image</label>
                        <input type="file" class="form-control-file" id="exampleFormControlInput4" wire:model="thumbnail" placeholder="Enter Thumbnail Image">
                        @error('thumbnail') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Year</label>
                        <select class="form-control" name="year_id" id="exampleFormControlSelect1" wire:model="year_id">
                            @foreach ($year as $itemyear)
                                <option value="{{ $itemyear->id }}">{{ $itemyear->year }}</option>
                            @endforeach
                        </select>
                        @error('year_id') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Group</label>
                        <select class="form-control" name="group_id" id="exampleFormControlSelect2" wire:model="group_id">
                            @foreach ($group as $itemgroup)
                                <option value="{{ $itemgroup->id }}">{{ $itemgroup->group }}</option>
                            @endforeach
                        </select>
                        @error('group_id') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save changes</button>
            </div>
        </div>
    </div>
</div>

