<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="addNewItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewModalTitle"></h5>
                <button type="button" id="addNewItemCrossButton" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" id="modalBody">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="addNewItemCloseButton" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="saveItem">Save</button>
                <button type="button" class="btn btn-success" id="updateItem">Update</button>
            </div>
        </div>
    </div>
</div>

</div>
</main>
</div>
</div>
</body>

</html>

<script src="./application-constant.js"></script>
<script src="./application-helper.js"></script>
<script src="./application-modal-operation.js"></script>
<script src="./application-notification.js"></script>
<script src="./ajax-library.js"></script>