<form id="studentUpdate">
    <input type="hidden" name="Id" />

    <div class="row">
        <div class="col-sm-6">
            <label class="col-form-label">Unique Id</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" name="UniqueId" placeholder="Unique Id">
            </div>
        </div>
        <div class="col-sm-6">
            <label class="col-form-label">Department Name</label>
            <div class="col-sm-12">
                <select id="DepartmentId" class="form-control" name="DepartmentId">

                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <label class="col-form-label">Name</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" name="Name" placeholder="Student Name">
            </div>
        </div>

        <div class="col-sm-6">
            <label class="col-form-label">Image</label>
            <div class="col-sm-12">
                <input type="file" class="form-control" name="ImageUrl" placeholder="Image Url">
            </div>
        </div>

        <div class="col-sm-6">
            <label class="col-form-label">Phone</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" name="Phone" placeholder="Phone">
            </div>
        </div>

        <div class="col-sm-6">
            <label class="col-form-label">Email</label>
            <div class="col-sm-12">
                <input type="email" class="form-control" name="Email" placeholder="Email">
            </div>
        </div>
    </div>
</form>