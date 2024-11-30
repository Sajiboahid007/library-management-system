const GetAjax = (url) => {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: url,
      method: "GET",
      success: function (response) {
        resolve(response);
      },
      error: function (error) {
        reject(error);
      },
    });
  });
};

const SaveAjax = (url, jsonData) => {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: url,
      method: "POST",
      data: JSON.stringify(jsonData),
      contentType: "application/json",
      success: function (response) {
        resolve(response);
      },
      error: function (error) {
        reject(error);
      },
    });
  });
};

const DeleteAjax = (url) => {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: url,
      method: "DELETE",
      success: function (response) {
        resolve(response);
      },
      error: function (error) {
        reject(error);
      },
    });
  });
};

const UpdateAjax = (url, jsonData) => {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: url,
      method: "PUT",
      data: JSON.stringify(jsonData),
      contentType: "application/json",
      success: function (response) {
        resolve(response);
      },
      error: function (error) {
        reject(error);
      },
    });
  });
};
