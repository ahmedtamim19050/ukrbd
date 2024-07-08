<x-marchentiger>

    <div class="col-md-6">
        <form action="{{ route('marchentiger.update_password') }}" method="POST">
            @csrf

            <div class="card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title bg-white">Change Password</h4>
                    </div>

                    <div class="card-body">
                        <div class="form-group mb-4">
                            <label for="oldPassword">Old password</label>
                            <input type="password" class="form-control" name="current_password" id="oldPassword">
                        </div>

                        <div class="form-group mb-4">
                            <label for="newPassword">New password</label>
                            <input type="password" class="form-control" name="new_password" id="newPassword">
                        </div>

                        <div class="form-group mb-4">
                            <label for="conPassword">Confirm password</label>
                            <input type="password" class="form-control" name="new_confirm_password" id="conPassword">
                        </div>

                        <div class="d-flex justify-content-end mt-5">
                            <button type="submit" class="btn btn-primary mb-2 btn-pill">Update
                                Profile</button>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>

</x-marchentiger>
