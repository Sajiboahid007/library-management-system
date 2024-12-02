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
                        <button class="btn btn-success btn-sm btnEdite id=${item.Id}"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button>
                        <button class="btn btn-danger btn-sm btnDelete id=${item.Id}">  <i class="fa fa-trash" aria-hidden="true"></i>  </button>
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

    $(document).ready(function() {
        get();
    })
</script>