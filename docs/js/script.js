document.addEventListener("DOMContentLoaded", () => {
  const modal = document.getElementById("qr-modal");
  const btnOpen = document.getElementById("btn-show-qr");
  const btnClose = document.getElementById("close-qr-modal");

  btnOpen.addEventListener("click", () => {
    modal.classList.remove("hidden");
  });

  btnClose.addEventListener("click", () => {
    modal.classList.add("hidden");
  });

  modal.addEventListener("click", (e) => {
    if (e.target === modal) {
      modal.classList.add("hidden");
    }
  });

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && !modal.classList.contains("hidden")) {
      modal.classList.add("hidden");
    }
  });
});
