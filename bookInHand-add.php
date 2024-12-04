<form id="createBorrowBook">
    <div class="row">
        <div class="col-sm-6">
            <label class="col-form-label">Student Name</label>
            <div class="col-sm-12">
                <select id="StudentId" class="form-control" name="StudentId">

                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <label class="col-form-label">Book Name</label>
            <div class="col-sm-12">
                <select id="BookId" class="form-control" name="BookId">

                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <label for="borrowDate">Borrow Date</label>
            <input type="date" class="form-control" name="BorrowDate" required>
        </div>
        <div class="col-sm-6">
            <label for="borrowDate">Expiry Date</label>
            <input type="date" class="form-control" name="ExpiryDate" required>
        </div>
        <div class="col-sm-6">
            <label class="form-check-label" for="flexSwitchCheckDefault">Is Active</label>
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" checked name="IsActive">
            </div>
        </div>
</form>