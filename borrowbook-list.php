<?php
include('./topbar.php');
include('./sidebar.php');
?>
<div class="row">
    <div class="col-sm-4">
        <h2>Borrow Book List</h2>
    </div>
    <div class="col-sm-4"></div>
    <div class="col-sm-4 text-end">
        <button id="createNew" class="btn btn-success"><i class="fa fa-plus"></i> Add</button>
    </div>
</div>
<table class="table table-hover table-bordered">
    <thead>
        <tr class="text-center">
            <td>Student Name</td>
            <td>Book Name</td>
            <td>Borrow Date</td>
            <td>Return Date</td>
            <td>Fine Amount</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody id="bookInHandBody"></tbody>
</table>

<?php
include('./footer.php');
?>


<script>
    const buildHtml = (response) => {
        let htmldata = '';
        response?.data.forEach(item => {
            htmldata +=
                `<tr class="text-center">
            <td>${item.Name}</td>
            <td>${item.BookName}</td>
            <td>${GetFormattedDate(item.BorrowDate)}</td>
            <td>${GetFormattedDate(item.ExpiryDate)}</td>
            <td>${item.FineAmount}</td>
            <td>
                <button class="btn btn-danger btn-sm btnDelete" itemId="${item.Id}"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>             
            </td>
            </tr>`
        })
        $("#bookInHandBody").html(htmldata);
    }
    const get = async () => {
        try {
            const response = await GetAjax(`${baseUrl}bookinhand/get`);
            buildHtml(response);
        } catch (error) {
            errorMessage(error);
        }
    }
    const addCreateForm = async () => {
        try {
            const response = await GetAjax("./bookInHand-add.php");

            const studentNameList = await GetAjax(`${baseUrl}student/get`);
            let studentName = '';
            studentNameList?.data.forEach(item => {
                studentName += `<option value="${item.Id}"> ${item.Name}</option>`
            });
            const bookNameList = await GetAjax(`${baseUrl}book/get`);
            let bookName = '';
            bookNameList?.data.forEach(item => {
                bookName += `<option value="${item.Id}"> ${item.BookName}</option>`
            });
            openModal("Create Borrow List", response);
            $("#StudentId").html(studentName);
            $("#BookId").html(bookName);
        } catch (error) {
            errorMessage(error);
        }
    }
    const save = async (formdata) => {
        try {
            const resposne = await SaveAjax(`${baseUrl}bookinhand/save`, formdata);
            closeModal();
            get();
            successMessage("Successfully Saved");
        } catch (error) {
            errorMessage(error);
        }
    }

    $("#saveItem").click(function() {
        const formData = getFormData('createBorrowBook');
        save(formData);
    });

    $("#createNew").click(function() {
        addCreateForm()
    })
    $(document).ready(function() {
        get();
    })
</script>