function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
}

function setLanguage(lang) {

    setCookie( 'lang', lang, 365 );
    document.documentElement.lang = lang;
    window.location.reload();
    
}

// dropdown to change language
document.addEventListener("DOMContentLoaded", () => {
  const langContainer = document.getElementById("lang-container");
  const langToggle = document.getElementById("lang-toggle");
  const langMenu = document.getElementById("lang-menu");

  langToggle.addEventListener("click", (e) => {
    e.stopPropagation();
    langContainer.classList.toggle("open");
  });

  document.addEventListener("click", (e) => {
    if (!langContainer.contains(e.target)) {
      langContainer.classList.remove("open");
    }
  });

  document.querySelectorAll(".lang-link").forEach((link) => {
    link.addEventListener("click", (e) => {
      e.preventDefault();
      const lang = link.dataset.lang;
      setLanguage(lang);
      langContainer.classList.remove("open");
    });
  });
});