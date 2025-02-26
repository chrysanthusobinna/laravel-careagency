
@if($user->role === 'family_member')
<!-- Add Family Member Modal -->
<div class="modal fade" id="addFamilyMemberModal" tabindex="-1" aria-labelledby="addFamilyMemberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addFamilyMemberModalLabel">Add Care Beneficiary</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <div class="p-3 border rounded shadow-lg mb-4" style="border-color: rgba(0, 0, 0, 0.1);">
                    <span class="text-muted">
                        Linking a Care Beneficiary to this  Family Member will allow them to manage care for the Care Beneficiary.
                    </span>
                </div>
                

                
                <!-- Hidden Success Message -->
                <div id="modalSuccessMessage" class="d-none text-center">
                    <div class="alert alert-success">
                        <h5>Family Member Linked Successfully!</h5>
                    </div>
                    <button type="button" class="btn btn-primary mt-2" data-bs-dismiss="modal">Close</button>
                </div>
                

                <!-- Hidden Error Message -->
                <div id="modalErrorMessage" class="alert alert-danger d-none"></div>

                <!-- Form Content (Will be hidden on success) -->
                <div id="modalFormContent">
                    <form method="POST" action="{{ route('admin.family-members.add') }}">
                        @csrf
                        <!-- Search Field -->
                        <div class="mb-3">
                            <label for="search_family_member" class="form-label">Search Care Beneficiary</label>
                            <input type="text" class="form-control" id="search_family_member" placeholder="Enter name..." autocomplete="off">
                        </div>

                        <!-- Search Results -->
                        <div class="mb-3">
                            <label class="form-label">Select Care Beneficiary</label>
                            <div id="family_member_results" class="border p-2" style="max-height: 200px; overflow-y: auto;">
                                <p class="text-muted"></p>
                            </div>
                        </div>

                        <!-- Relationship Type -->
                        <div class="mb-3">
                            <label for="relationship_type" class="form-label">Relationship Type</label>
                            <select class="form-control" name="relationship_type" id="relationship_type" required>
                                <option value="Parent">Parent</option>
                                <option value="Sibling">Sibling</option>
                                <option value="Child">Child</option>
                                <option value="Spouse">Spouse</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <!-- Hidden Input to Store Selected User ID -->
                        <input type="hidden" name="role" value="family_member">
                        <input type="hidden" name="family_member_id"  value="{{ $user->id }}" >
                        <input type="hidden" name="care_beneficiary_id"  id="selected_care_beneficiary_id">

                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-secondary">Save</button>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

 

@endif