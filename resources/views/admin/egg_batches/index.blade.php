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
                        <th class="nftmax-table__column-2 nftmax-table__h2">Quantity</th>
                        <th class="nftmax-table__column-3 nftmax-table__h3">Quality</th>
                        <th class="nftmax-table__column-4 nftmax-table__h4">Price</th>
                        <th class="nftmax-table__column-5 nftmax-table__h5">Actions</th>
                    </tr>
                </thead>
                <!-- NFTMax Table Body -->
                <tbody class="nftmax-table__body">
                    @foreach ($batches as $batch)
                        <tr>
                            <td class="nftmax-table__column-1 nftmax-table__data-1">
                                <div class="nftmax-table__product">
                                    <div class="nftmax-table__product-img">
                                        <img src="img/trending-img-4.png" alt="Batch Image">
                                    </div>
                                    <div class="nftmax-table__product-content">
                                        <h4 class="nftmax-table__product-title">{{ $batch->batch_name }}</h4>
                                    </div>
                                </div>
                            </td>
                            <td class="nftmax-table__column-3 nftmax-table__data-3">
                                <span class="nftmax-table__text">{{ $batch->quantity }}</span>
                            </td>
                            <td class="nftmax-table__column-3 nftmax-table__data-3">
                                <span class="nftmax-table__text">{{ $batch->quality }}</span>
                            </td>
                            <td class="nftmax-table__column-3 nftmax-table__data-3">
                                <span class="nftmax-table__text">P{{ $batch->price }}</span>
                            </td>
                            <td class="nftmax-table__column-5 nftmax-table__data-5">
                                <!-- Edit Button -->
                                <button type="button" class="nftmax-btn nftmax-btn__primary radius" data-bs-toggle="modal" data-bs-target="#editBatchModal-{{ $batch->batch_id }}">
                                    Edit
                                </button>

                                <!-- Delete Button -->
                                <form action="{{ route('batches.eggs.destroy', $batch->batch_id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="nftmax-btn nftmax-btn__danger radius" onclick="return confirm('Are you sure you want to delete this batch?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- Edit Batch Modal -->
                        <div class="modal fade" id="editBatchModal-{{ $batch->batch_id }}" tabindex="-1" aria-labelledby="editBatchModalLabel-{{ $batch->batch_id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editBatchModalLabel-{{ $batch->batch_id }}">Edit Batch</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('batches.eggs.update', $batch->batch_id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label for="batch_name_{{ $batch->batch_id }}" class="form-label">Batch Name</label>
                                                <input type="text" name="batch_name" id="batch_name_{{ $batch->batch_id }}" class="nftmax__item-input" value="{{ $batch->batch_name }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="quantity_{{ $batch->batch_id }}" class="form-label">Quantity</label>
                                                <input type="number" name="quantity" id="quantity_{{ $batch->batch_id }}" class="nftmax__item-input" value="{{ $batch->quantity }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="quality_{{ $batch->batch_id }}" class="form-label">Quality</label>
                                                <select name="quality" id="quality_{{ $batch->batch_id }}" class="nftmax__item-input" required>
                                                    <option value="small" {{ $batch->quality == 'small' ? 'selected' : '' }}>Small</option>
                                                    <option value="medium" {{ $batch->quality == 'medium' ? 'selected' : '' }}>Medium</option>
                                                    <option value="large" {{ $batch->quality == 'large' ? 'selected' : '' }}>Large</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="price_{{ $batch->batch_id }}" class="form-label">Price</label>
                                                <input type="number" step="0.01" name="price" id="price_{{ $batch->batch_id }}" class="nftmax__item-input" value="{{ $batch->price }}" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </div>
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
                <h5 class="modal-title" id="createBatchModalLabel">Create Batch</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('batches.eggs.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="batch_name" class="form-label">Batch Name</label>
                        <input type="text" name="batch_name" id="batch_name" class="nftmax__item-input" required>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" name="quantity" id="quantity" class="nftmax__item-input" required>
                    </div>
                    <div class="mb-3">
                        <label for="quality" class="form-label">Quality</label>
                        <select name="quality" id="quality" class="nftmax__item-input" required>
                            <option value="small">Small</option>
                            <option value="medium">Medium</option>
                            <option value="large">Large</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" step="0.01" name="price" id="price" class="nftmax__item-input" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
