@extends('admin.admin_dashboard')

@section('admin')
<div class="nftmax-table mg-top-40">
    <div class="nftmax-table__heading">
        <h3 class="nftmax-table__title mb-0">Batches Table<span class="nftmax-table__badge">435</span></h3>
        <button type="button" class="nftmax-btn nftmax-btn__secondary radius" data-bs-toggle="modal" data-bs-target="#createBatchModal">
            Create Batch
        </button>
    </div>
    
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="table_1" role="tabpanel" aria-labelledby="table_1">
            <!-- NFTMax Table -->
            <table id="nftmax-table__main" class="nftmax-table__main nftmax-table__main-v1">
                <!-- NFTMax Table Head -->
                <thead class="nftmax-table__head">
                    <tr>
                        <th class="nftmax-table__column-1 nftmax-table__h1">Batches</th>
                        <th class="nftmax-table__column-2 nftmax-table__h2">Arrival Date</th>
                        <th class="nftmax-table__column-3 nftmax-table__h3">Supplier Name</th>
                        <th class="nftmax-table__column-4 nftmax-table__h4">Status</th>
                        <th class="nftmax-table__column-4 nftmax-table__h4">Quantity</th>
                        <th class="nftmax-table__column-4 nftmax-table__h4">Price</th>
                        <th class="nftmax-table__column-5 nftmax-table__h5">Actions</th> <!-- New Actions Column -->
                    </tr>
                </thead>
                <!-- NFTMax Table Body -->
                <tbody class="nftmax-table__body">
                    @foreach ($batches as $batch)
                        <tr>
                            <td class="nftmax-table__column-1 nftmax-table__data-1">
                                <div class="nftmax-table__product">
                                    <div class="nftmax-table__product-img">
                                        <img src="{{ asset($batch->batch_image ?? 'default-image-path.png') }}" alt="Batch Image">
                                    </div>
                                    <div class="nftmax-table__product-content">
                                        <h4 class="nftmax-table__product-title">{{ $batch->batch_name }}</h4>
                                    </div>
                                </div>
                            </td>
                            <td class="nftmax-table__column-2 nftmax-table__data-2">
                                <span class="nftmax-table__text">{{ $batch->arrival_date }}</span>
                            </td>
                            <td class="nftmax-table__column-3 nftmax-table__data-3">
                                <span class="nftmax-table__text">{{ $batch->supplier_name }}</span>
                            </td>
                            
                            <td class="nftmax-table__column-4 nftmax-table__data-4">
                                @if ($batch->status == 'Processing')
                                    <div class="nftmax-table__status nftmax-sbcolor">Processing</div>
                                @elseif ($batch->status == 'Complete')
                                    <div class="nftmax-table__status nftmax-gbcolor">Completed</div>
                                @endif
                            </td>
                            <td class="nftmax-table__column-3 nftmax-table__data-3">
                                <span class="nftmax-table__text">{{ $batch->quantity }}</span>
                            </td>
                            <td class="nftmax-table__column-3 nftmax-table__data-3">
                                <span class="nftmax-table__text">P{{ $batch->price }}</span>
                            </td>
                            <td class="nftmax-table__column-5 nftmax-table__data-5">
                                <!-- Edit Button -->
                                <button 
                                    class="nftmax-btn nftmax-btn__primary radius"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editBatchModal{{ $batch->batch_id }}">
                                    Edit
                                </button>
                                
                                <!-- Delete Button -->
                                <form action="{{ route('admin.batches.destroy', $batch->batch_id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="nftmax-btn nftmax-btn__danger radius" onclick="return confirm('Are you sure you want to delete this batch?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        
                        <!-- Edit Modal -->
                        <div class="modal fade" id="editBatchModal{{ $batch->batch_id }}" tabindex="-1" aria-labelledby="editBatchModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editBatchModalLabel">Edit Batch</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('admin.batches.update', $batch->batch_id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <!-- Batch Name -->
                                            <div class="mb-3">
                                                <label for="batchName{{ $batch->batch_id }}" class="form-label">Batch Name</label>
                                                <input type="text" class="nftmax__item-input" id="batchName{{ $batch->batch_id }}" name="batch_name" value="{{ $batch->batch_name }}" required>
                                            </div>
                        
                                            <!-- Arrival Date -->
                                            <div class="mb-3">
                                                <label for="arrivalDate{{ $batch->batch_id }}" class="form-label">Arrival Date</label>
                                                <input type="date" class="nftmax__item-input" id="arrivalDate{{ $batch->batch_id }}" name="arrival_date" value="{{ $batch->arrival_date }}" required>
                                            </div>
                        
                                            <!-- Supplier Name -->
                                            <div class="mb-3">
                                                <label for="supplierName{{ $batch->batch_id }}" class="form-label">Supplier Name</label>
                                                <input type="text" class="nftmax__item-input" id="supplierName{{ $batch->batch_id }}" name="supplier_name" value="{{ $batch->supplier_name }}" required>
                                            </div>
                        
                                            <!-- Quantity -->
                                            <div class="mb-3">
                                                <label for="quantity{{ $batch->batch_id }}" class="form-label">Quantity</label>
                                                <input type="number" class="nftmax__item-input" id="quantity{{ $batch->batch_id }}" name="quantity" value="{{ $batch->quantity }}" required min="1">
                                            </div>
                        
                                            <!-- Price -->
                                            <div class="mb-3">
                                                <label for="price{{ $batch->batch_id }}" class="form-label">Price</label>
                                                <input type="number" class="nftmax__item-input" id="price{{ $batch->batch_id }}" name="price" value="{{ $batch->price }}" required step="0.01" min="0">
                                            </div>
                        
                                            <!-- Status -->
                                            <div class="mb-3">
                                                <label for="status{{ $batch->batch_id }}" class="form-label">Status</label>
                                                <select class="nftmax__item-input" id="status{{ $batch->batch_id }}" name="status" required>
                                                    <option value="Processing" {{ $batch->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                                                    <option value="Complete" {{ $batch->status == 'Complete' ? 'selected' : '' }}>Complete</option>
                                                </select>
                                            </div>
                        
                                            <!-- Batch Image -->
                                            <div class="mb-3">
                                                <label for="batchImage{{ $batch->batch_id }}" class="form-label">Batch Image</label>
                                                <input type="file" class="nftmax__item-input" id="batchImage{{ $batch->batch_id }}" name="batch_image" accept="image/*">
                                                @if ($batch->batch_image)
                                                    <div class="mt-2">
                                                        <img src="{{ asset($batch->batch_image) }}" alt="Batch Image" style="width: 100px; height: auto;">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="nftmax-btn nftmax-btn__primary radius" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="nftmax-btn nftmax-btn__secondary radius">Update Batch</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    @endforeach
                </tbody>
                <!-- End NFTMax Table Body -->
            </table>
            <!-- End NFTMax Table -->
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="createBatchModal" tabindex="-1" aria-labelledby="createBatchModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createBatchModalLabel">Create New Batch</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.batches.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <!-- Batch Name -->
                    <div class="mb-3">
                        <label for="batchName" class="form-label">Batch Name</label>
                        <input type="text" class="nftmax__item-input" id="batchName" name="batch_name" required>
                    </div>
                    
                    <!-- Arrival Date -->
                    <div class="mb-3">
                        <label for="arrivalDate" class="form-label">Arrival Date</label>
                        <input type="date" class="nftmax__item-input" id="arrivalDate" name="arrival_date" required>
                    </div>
                    
                    <!-- Supplier Name -->
                    <div class="mb-3">
                        <label for="supplierName" class="form-label">Supplier Name</label>
                        <input type="text" class="nftmax__item-input" id="supplierName" name="supplier_name" required>
                    </div>
                    
                    <!-- Quantity -->
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="nftmax__item-input" id="quantity" name="quantity" required min="1">
                    </div>
                    
                    <!-- Price -->
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="nftmax__item-input" id="price" name="price" required step="0.01" min="0">
                    </div>
                    
                    <!-- Status (Optional) -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="nftmax__item-input" id="status" name="status">
                            <option value="Processing" selected>Processing</option>
                            <option value="Complete">Complete</option>
                        </select>
                    </div>
                    
                    <!-- Batch Images (Optional) -->
                    <div class="mb-3">
                        <label for="batchImages" class="form-label">Batch Images</label>
                        <input type="file" class="nftmax__item-input" id="batchImages" name="batch_images" accept="image/*">
                        <small class="form-text text-muted">You can upload an image to represent this batch (optional).</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="nftmax-btn nftmax-btn__primary radius" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="nftmax-btn nftmax-btn__secondary radius">Create Batch</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
