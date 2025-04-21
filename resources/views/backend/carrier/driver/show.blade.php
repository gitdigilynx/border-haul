<!-- Modal -->
<div class="modal fade" id="driverShow{{ $driver->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Driver Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row">Name</th>
                            <td>{{ $driver->name ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Phone Number</th>
                            <td>{{ $driver->phone_number ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-end">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
