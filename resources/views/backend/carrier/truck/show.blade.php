<!-- Modal -->
<div class="modal fade" id="truckShow{{ $truck->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Truck Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tbody>
                       <tr>
                    <th scope="row">Plate Number</th>
                        <td>{{ $truck->plate_number ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Trucker Number</th>
                        <td>{{ $truck->trucker_number ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Service Category</th>
                        <td>{{ $truck->service_category ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">In Service</th>
                        <td>
                            <span class="{{ statusInService($truck->in_service ? 'ON' : 'OFF') }}">
                                {{ $truck->in_service ? 'ON' : 'OFF' }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Location</th>
                        <td>{{ $truck->location ?? '-' }}</td>
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
