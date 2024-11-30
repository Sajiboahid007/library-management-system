function GetFormattedDate(dateString) {
  const date = new Date(dateString);
  // Extract parts
  const day = String(date.getDate()).padStart(2, "0");
  const monthNames = [
    "Jan",
    "Feb",
    "Mar",
    "Apr",
    "May",
    "Jun",
    "Jul",
    "Aug",
    "Sep",
    "Oct",
    "Nov",
    "Dec",
  ];
  const month = monthNames[date.getMonth()];
  const year = date.getFullYear();
  const hours = String(date.getHours()).padStart(2, "0");
  const minutes = String(date.getMinutes()).padStart(2, "0");
  const seconds = String(date.getSeconds()).padStart(2, "0");

  return `${day}-${month}-${year} ${hours}:${minutes}:${seconds}`;
}

const getFormData = (formId) => {
  const form = document.getElementById(formId);
  const formData = {};

  for (let i = 0; i < form.elements.length; i++) {
    const field = form.elements[i];
    if (field.name) {
      formData[field.name] = field.value;
    }
  }
  return formData;
};

function setFormData(formId, response) {
  const form = document.getElementById(formId);
  if (Array.isArray(response)) {
    response = response[0];
  }

  for (const key in response) {
    const input = form.querySelector(`[name="${key}"], [id="${key}"]`);
    if (input) {
      input.value = response[key];
    }
  }
}
