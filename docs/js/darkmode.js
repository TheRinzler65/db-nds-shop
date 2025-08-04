const toggleBtn = document.getElementById("theme-toggle");

const enableDarkmode = () => {
  document.body.classList.add("darkmode");
  localStorage.setItem("darkmode", "active");
};

const disableDarkmode = () => {
  document.body.classList.remove("darkmode");
  localStorage.setItem("darkmode", "inactive");
};

if (localStorage.getItem("darkmode") === "active") {
  enableDarkmode();
}

toggleBtn.addEventListener("click", () => {
  if (document.body.classList.contains("darkmode")) {
    disableDarkmode();
  } else {
    enableDarkmode();
  }
});
