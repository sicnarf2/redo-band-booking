<div class="modal fade" id="updateModal{{$band->id}}" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark text-light">
                <h5 class="modal-title text-center" id="updateModalLabel">Update band</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('bands.update', $band->id) }}" method="POST" class="p-4">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="band_name" class="form-label">Band Name</label>
                        <input type="text" name="band_name" id="band_name" class="form-control" placeholder="Enter your Band name" value="{{$band->band_name}}">
                        @error('band_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="genre" class="form-label">Genre</label>
                        <input type="text" name="genre" id="genre" class="form-control" placeholder="Enter your genre" value="{{$band->genre}}">
                        @error('genre')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="year_started" class="form-label">Year Started</label>
                        <input type="number" name="year_started" id="year_started" class="form-control" placeholder="Enter year_started" value="{{$band->year_started}}">
                        @error('year_started')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="membersCount" class="form-label">Number of Members</label>
                        <input type="number" name="membersCount" id="membersCount" class="form-control" placeholder="Enter number of members" value="{{$band->membersCount}}">
                        @error('membersCount')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
