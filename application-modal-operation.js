const openModal = (title, htmlData, isUpdated = false) => {
  $("#addNewItem").modal({
    backdrop: "static",
    keyboard: false,
  });
  $("#addNewModalTitle").text(title);
  $("#modalBody").html(htmlData);
  if (isUpdated) {
    $("#saveItem").hide();
    $("#updateItem").show();
  } else {
    $("#saveItem").show();
    $("#updateItem").hide();
  }
  $("#addNewItem").modal("show");
};

const closeModal = () => {
  $("#addNewItem").modal("hide");
  $("#modalBody").html("");
};

$("#addNewItemCloseButton").click(function () {
  closeModal();
});

$("#addNewItemCrossButton").click(function () {
  closeModal();
});
