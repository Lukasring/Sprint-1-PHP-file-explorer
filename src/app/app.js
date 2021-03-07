const tabs = Array.from(document.querySelectorAll(".tab"));
const forms = Array.from(document.querySelectorAll(".form"));
const formCancelBtns = document.querySelectorAll(".form .btn.danger");

const fileInputEl = document.querySelector("input[type='file']");
const fileInputInfo = document.querySelector(".file-upload__file-info");

fileInputEl.addEventListener("change", (e) => {
  fileInputInfo.innerText = e.target.value.split(/(\\|\/)/g).pop();
});

const tabFormMap = {
  "create-dir-tab": "create-dir-form",
  "create-file-tab": "create-file-form",
  "upload-file-tab": "upload-file-form",
};

function removeActive(tabs) {
  for (const tab of tabs) {
    tab.classList.remove("active");
  }
}

function hideForms(forms) {
  for (const form of forms) {
    form.classList.add("hidden");
  }
}

function displayForm(form) {
  form.classList.remove("hidden");
}

for (const btn of formCancelBtns) {
  btn.addEventListener("click", (e) => {
    e.preventDefault();
    hideForms(forms);
    removeActive(tabs);
  });
}

for (const tab of tabs) {
  tab.addEventListener("click", () => {
    tab.classList.add("active");
    const otherTabs = tabs.filter((t) => t.id !== tab.id);
    removeActive(otherTabs);
    hideForms(forms);
    const tabFormId = tabFormMap[tab.id];
    if (tabFormId) {
      const form = forms.find((form) => form.id === tabFormId);
      displayForm(form);
    }
  });
}
