<div>
    @if($isModalOpen)
        <div class="modal fade show" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true" style="display: block;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="reportModalLabel">Report</h5>
                        <button type="button" class="btn-close" wire:click="closeReportModal" aria-label="Zamknij"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" wire:submit.prevent="report">
                            <div class="row m-0 mb-3 mt-3">
                                <p class="m-0 p-0">Category</p>
                                <select class="form-select ban_category" name="" id="" wire:model="category" required>
                                    <option value="" selected>Select Category</option>
                                    @foreach (App\Enums\BanReason::TYPES as $role)
                                    <option value="{{ $role }}">{{ $role }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row m-0 mb-3 mt-3">
                                <p class="m-0 p-0">Reason</p>
                                <textarea class="form-control" name="ban_reason" id="" cols="30" rows="4" wire:model="reason"></textarea>
                            </div>
                            <div class="row m-0">
                                <button class="btn btn-danger" type="submit">Report</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-backdrop fade show"></div>
    @endif
</div>