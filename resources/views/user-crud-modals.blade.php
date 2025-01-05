<x-custom_modal id="addUserModal" title="Add User">
    <form method="POST" action="{{route('user.store')}}" enctype='multipart/form-data'>
        @csrf
        <div class="mb-3">
            <label for="UserName" class="form-label">Name</label>
            <input type="text" class="form-control" id="UserName" name="UserName" placeholder="name">
        </div>
        <div class="mb-3">
            <label for="UserEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="UserEmail" name="UserEmail" placeholder="email">
        </div>
        <div class="mb-3">
            <label for="UserRole" class="form-label">Role</label>
            <select name="UserRole" id="UserRole" class="form-control">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="UserPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="UserPassword" name="UserPassword" placeholder=" Password For User">
        </div>

        <button type="submit" class="btn btn-success text-light">Add</button>
        @slot('footer')

        @endslot
    </form>
</x-custom_modal>
<x-custom_modal id="editUserModal" title="Edit User">
    <form  method="POST" enctype='multipart/form-data'>
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="UserName" class="form-label">Name</label>
            <input type="text" class="form-control" id="userName" name="UserName" placeholder="name">
        </div>
        <div class="mb-3">
            <label for="UserEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="userEmail" name="UserEmail" placeholder="email">
        </div>
        <div class="mb-3">
            <label for="UserRole" class="form-label">Role</label>
            <select name="UserRole" id="userRole" class="form-control">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>


        <button type="submit" class="btn btn-success text-light">Edit</button>
        @slot('footer')

        @endslot
    </form>
</x-custom_modal>
<x-custom_modal id="deleteUserModal" title="Delete User">
    <form method="POST" enctype="multipart/form-data">
        @method('DELETE')
        @csrf
        <div class="modal-body text-center">
            <h3 class="mb-3">Are you sure you want to delete this user?</h3>
            <p class="text-muted">This action is inreversible. Once deleted, the user cannot be restored.</p>

            <div class="d-flex justify-content-center gap-2 mt-4">
                <button type="submit" class="btn btn-danger text-light">Yes, Delete</button>
                <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Cancel</button>
            </div>
        </div>

        @slot('footer')

        @endslot
    </form>
</x-custom_modal>

