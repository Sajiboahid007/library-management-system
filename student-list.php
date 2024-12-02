<?php
include('./topbar.php');
include('./sidebar.php');
?>
<div class="row">
    <div class="col-sm-4">
        <h2>Student List</h2>
    </div>
    <div class="col-sm-4">
    </div>
    <div class="col-sm-4 text-end">
        <button id="createNew" class="btn btn-success"><i class="fa fa-plus"></i> Add</button>
    </div>
</div>
<div>
    <table class="table table-hover table-bordered">
        <thead>
            <tr style="background-color: red;">
                <th>Unique Id</th>
                <th>Name</th>
                <th>Image</th>
                <th>Department Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="studentbody"></tbody>
        <tfoot></tfoot>
    </table>
</div>
<?php
include('./footer.php');
?>
<script>
    (function() {
        const buildHtml = (response) => {
            let htmlData = '';
            response?.data?.forEach(item => {

                htmlData +=
                    `<tr>
                        <td>${item.UniqueId}</td>
                        <td>${item.Name}</td>
                        <td> </td>
                        <td>${item.DepartmentName}</td>
                        <td>${item.Phone}</td>
                        <td>${item.Email}</td>
                        <td>
                        <button class = 'btn btn-success btn-sm btnCanEdit' itemId = '${item.Id}'> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button>
                        <button class = 'btn btn-danger btn-sm btnCanDelete' itemId = '${item.Id}'> <i class="fa fa-trash" aria-hidden="true"></i> </button>

                        </td>
                    </tr>`

            });
            $("#studentbody").html(htmlData);
        }
        const addCreateForm = async () => {
            try {
                const response = await GetAjax('./student-add.php');
                const departmentList = await GetAjax(`${baseUrl}department/get`);
                let departmentOptions = '';
                departmentList.data?.forEach(item => departmentOptions += `<option value = '${item.Id}'> ${item.Name}</option>`);
                openModal("Create Student Form", response);
                $("#DepartmentId").html(departmentOptions);

            } catch (error) {
                console.error(error)

            }
        }

        const get = async () => {
            try {
                const response = await GetAjax(`${baseUrl}student/get`);
                buildHtml(response);

            } catch (error) {
                console.log(error)

            }
        }
        const save = async (formdata) => {
            try {
                const response = await SaveAjax(`${baseUrl}student/save`, formdata);
                closeModal();
                get();
                successMessage("Successfully Saved");
            } catch (error) {
                errorMessage(error);
            }
        }
        const update = async (formData) => {
            try {
                const response = await UpdateAjax(`${baseUrl}student/update/${formData?.Id}`, formData);
                closeModal();
                get();
                successMessage("Successfully Updated");
            } catch (error) {
                errorMessage(error);
            }
        }
        const Delete = async (id) => {
            try {
                const response = await DeleteAjax(`${baseUrl}student/delete/${id}`);
                get();
                successMessage("Successfully Deleted");
            } catch (error) {
                errorMessage(error)
            }
        }

        $(document).on("click", '.btnCanDelete', function() {
            const itemId = $(this).attr('itemId');
            const response = deleteConfirmation();
            if (response) {
                Delete(itemId);
            }
        })
        $("#updateItem").click(function() {
            const formData = getFormData("studentUpdate");
            update(formData);
        })
        $(document).on("click", '.btnCanEdit', async function() {
            const id = $(this).attr('itemId');
            const response = await GetAjax(`${baseUrl}student/get/${id}`);
            const htmlUpdate = await GetAjax(`./student-update.php`);

            const departmentList = await GetAjax(`${baseUrl}department/get`);
            let departmentOptions = '';
            departmentList.data?.forEach(item => departmentOptions += `<option value = '${item.Id}'> ${item.Name}</option>`);
            openModal('Student Update', htmlUpdate, true);
            $("#DepartmentId").html(departmentOptions);
            setFormData('studentUpdate', response?.data);
        })
        $("#saveItem").click(function() {
            const formData = getFormData("studentCreate");
            save(formData);
        })
        $("#createNew").click(function() {
            addCreateForm();
        })
        $(document).ready(function() {
            get();
        })

    })();
</script>