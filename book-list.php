<?php
include('./topbar.php');
include('./sidebar.php');
?>

<div class="row">
    <div class="col sim-4">
        <h2>Book List</h2>
    </div>
    <div class="col sm-4"></div>
    <div class="col sm-4 text-end">
        <button id="createBookAdd" class="btn btn-success"><i class="fa fa-plus"></i> Add</button>
    </div>
    <table class="table table-hover table-bordered text-center">
        <thead>
            <th>Book Name</th>
            <th>Image Url</th>
            <th>Author Name</th>
            <th>Publisher</th>
            <th>Number of Copy</th>
            <th>Action</th>
        </thead>
        <tbody id="bookListBody"></tbody>
        <tfoot></tfoot>
    </table>

</div>
<?php
include('./footer.php');
?>
<script>
    const buildthtml = (response) => {
        let htmlData = '';
        response?.data?.forEach(item => {
            let available = `<td><span class="badge badge-custom-danger">${item.NumberOfCopy}</span></td>`;
            if (available) {
                available = `<td><span class="badge badge-custom-success">${item.NumberOfCopy}</span></td>`
            }
            htmlData +=
                `<tr>
                    <td>${item.BookName}</td>
                    <td></td>
                    <td>${item.AuthorName}</td>
                    <td>${item.Publisher}</td>
                    ${available}
                    <td>
                        <button class="btn btn-success btn-sm btnEdit" itemId="${item.Id}"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button>
                        <button class="btn btn-danger btn-sm btnDelete" itemId="${item.Id}">  <i class="fa fa-trash" aria-hidden="true"></i>  </button>
                    </td>
            </tr>`
        });

        $("#bookListBody").html(htmlData)
    }

    const get = async () => {
        try {
            const response = await GetAjax(`${baseUrl}book/get`);
            buildthtml(response);
        } catch (error) {
            console.error(error)
        }
    }

    const addCreateForm = async () => {
        try {
            const response = await GetAjax('./book-add.php');
            openModal("Book List Create", response);
        } catch (error) {
            console.error(error);
        }
    }
    const save = async (formData) => {
        try {
            const response = await SaveAjax(`${baseUrl}book/save`, formData);
            successMessage("Successfully Book Create");
            closeModal();
            get();
        } catch (error) {
            errorMessage(error);
        }
    }
    const update = async (formData) => {
        console.log(formData);
        console.log(`${formData.Id}`);
        try {
            const response = await UpdateAjax(`${baseUrl}book/update/${formData?.Id}`, formData);
            closeModal();
            get();
            successMessage('Department Updated Successfully');

        } catch (error) {
            errorMessage(error);
        }
    }
    const Delete = async (itemId) => {
        try {
            const resposne = DeleteAjax(`${baseUrl}book/delete/${itemId}`);
            successMessage("Successfully Deleted");
            get();
        } catch (error) {
            console.error(error)
        }
    }


    $(document).on("click", '.btnEdit', async function() {
        const itemId = $(this).attr('itemId');
        console.log(itemId);
        const response = await GetAjax(`${baseUrl}book/get/${itemId}`);
        const updatedHtml = await GetAjax('./book-update.php');
        openModal('Book Update', updatedHtml, true);
        setFormData('bookUpdate', response?.data);
    });

    $(document).on("click", ".btnDelete", async function() {
        const itemId = $(this).attr("itemId");
        const resposne = await deleteConfirmation();
        if (resposne) {
            Delete(itemId);
        }

    })


    $("#updateItem").click(function() {
        const formData = getFormData('bookUpdate');
        update(formData);
        console.log(formData);
    })
    $("#saveItem").click(function() {
        const formData = getFormData("createBook");
        save(formData);
    })
    $("#createBookAdd").click(function() {
        addCreateForm();
    })
    $(document).ready(function() {
        get();
    })
</script>