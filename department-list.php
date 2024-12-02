<?php
include('./topbar.php');
include('./sidebar.php');
?>
<div class="row">
    <div class="col-sm-4">
        <h2>Department List</h2>
    </div>
    <div class="col-sm-4">

    </div>
    <div class="col-sm-4 text-end">
        <button id="createNew" class="btn btn-success btn-sm">
            <i class="fa fa-plus"></i> Add
        </button>
    </div>

</div>
<table class="table table-hover table-bordered">
    <thead>
        <th>Name</th>
        <th>Create Date</th>
        <th>Action</th>
    </thead>
    <tbody id="departmentTBody">

    </tbody>
    <tfoot>

    </tfoot>
</table>

<?php
include('./footer.php');
?>


<script>
    (function() {
        const buildHtml = response => {
            let htmlData = '';
            response?.data?.forEach(item => {
                htmlData += `<tr> 
                    <td> ${item.Name} </td>
                    <td> ${GetFormattedDate(item.CreateDate)} </td>
                    <td> 
                        <button class = 'btn btn-success btn-sm btnCanEdit' itemId = '${item.Id}'> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button>
                        <button class = 'btn btn-danger btn-sm btnCanDelete' itemId = '${item.Id}'> <i class="fa fa-trash" aria-hidden="true"></i> </button>
                    </td>
                </tr>`;
            });

            $("#departmentTBody").html(htmlData);
        }

        const addCreateForm = async () => {
            try {
                const response = await GetAjax('./department-add.php');
                openModal('Create Department', response);
            } catch (error) {
                console.error(error);
            }
        }

        const get = async () => {
            try {
                const response = await GetAjax(`${baseUrl}department/get`);
                buildHtml(response);
            } catch (error) {
                console.error(error);
            }
        }

        const save = async formData => {
            try {
                const url = baseUrl + "department/save";
                const response = await SaveAjax(url, formData);
                closeModal();
                get();
                successMessage('Department Created Successfully');
            } catch (error) {
                errorMessage(error);
            }
        }

        const deleteItem = async itemId => {
            try {
                const response = await DeleteAjax(`${baseUrl}department/delete/${itemId}`);
                get();
                successMessage('Department deleted successfully');

            } catch (error) {

            }
        }

        const update = async formData => {
            try {
                const response = await UpdateAjax(`${baseUrl}department/update/${formData?.Id}`, formData);
                closeModal();
                get();
                successMessage('Department Updated Successfully');
            } catch (error) {
                errorMessage(error);
            }
        }

        $("#createNew").click(function() {
            addCreateForm();
        })

        $("#saveItem").click(function() {
            const formData = getFormData('departmentCreate');
            save(formData);
        });

        $("#updateItem").click(function() {
            const formData = getFormData('departmentUpdate');
            update(formData);
        });

        $(document).on("click", '.btnCanEdit', async function() {
            const itemId = $(this).attr('itemId');
            const response = await GetAjax(`${baseUrl}department/get/${itemId}`);
            const updatedHtml = await GetAjax('./department-update.php');
            openModal('Department Update', updatedHtml, true);
            setFormData('departmentUpdate', response?.data);
        });

        $(document).on("click", ".btnCanDelete", async function() {
            const itemId = $(this).attr('itemId');
            const response = await deleteConfirmation();
            if (response) {
                deleteItem(itemId);
            }
        })

        $(document).ready(function() {
            get();
        })
    })();
</script>