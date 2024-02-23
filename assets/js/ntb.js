const _el = (type, elem) => {
  if (type === "id") {
    return document.getElementById(elem);
  } else if (type === "qs") {
    return document.querySelector(elem);
  } else if (type === "qsA") {
    return document.querySelectorAll(elem);
  }
  return document.getElementById(elem);
};

const loadingModal = (cmd) => {
  const loadingModal = _el("id", "loadingModal");
  if (cmd === "on") {
    loadingModal.style.display = "flex";
  } else {
    loadingModal.style.display = "none";
  }
};

function rewriteUrl(url) {
  history.pushState({ foo: "bar" }, "", url);
}

function open_iframeOverlay(iframePointer, url) {
  const iframeOverLay = document.getElementById(iframePointer);
  const iframe = document.getElementById("dynamicIframe_" + iframePointer);
  iframe.setAttribute("src", url);
  iframeOverLay.style.display = "flex";
}

function closeIframe(iframePointer) {
  const iframeOverLay = document.getElementById(iframePointer);
  iframeOverLay.style.display = "none";
}

window.addEventListener("message", function (event) {
  if (event.origin === window.location.origin) {
    if (event.data === "userLoggedIn_success") {
      window.location.href = "/app?page=home";
    }
  }
});

function reactivateActiveSidebarLink(page) {
  const sideLinks = document.querySelectorAll(".sideBarLink");
  sideLinks.forEach((item) => {
    item.classList.remove("active");
  });
  document.getElementById(page + "_linkButton").classList.add("active");
}

const xhrAppLoader = (page, ext = "") => {
  loadingModal("on");
  reactivateActiveSidebarLink(page);
  rewriteUrl("/app/?page=" + page);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState === 4) {
      if (this.status === 200) {
        _el("id", "appBody").innerHTML = this.responseText;
      } else if (this.status === 404) {
        Swal.fire({
          title: "Oops!",
          text: "404 Not Found!",
          icon: "error",
        });
      }
      loadingModal("off");
    }
  };
  xhttp.open("GET", "/app/~page-" + page + ext);
  xhttp.send();
};

function logoutUser() {
  swal
    .fire({
      title: "Are you sure you want to logout?",
      text: "If you logout you will no longer be able to use our service till you login.",
      icon: "info",
      showCancelButton: true,
      confirmButtonText: "Yes",
      cancelButtonText: "No",
    })
    .then((result) => {
      if (result.value === true) {
        window.location.href = "/logout";
      }
    });
}

// open_iframeOverlay('iframeOverlay_1','/~login-frame');

function toggleSidebar() {
  const minSideBarCont = _el("id", "minSideBarCont");
  const dataIsToogled = minSideBarCont.getAttribute("data-isToogled");
  const appSidebarFixed = _el("qs", ".appSidebarFixed");
  if (dataIsToogled == "false") {
    minSideBarCont.setAttribute("data-isToogled", "true");
    appSidebarFixed.style.left = "0%";
    _el("qs", "#minSideBarCont i").classList.remove("la-bars");
    _el("qs", "#minSideBarCont i").classList.add("la-times");
  } else {
    minSideBarCont.setAttribute("data-isToogled", "false");
    appSidebarFixed.style.left = "-100%";
    _el("qs", "#minSideBarCont i").classList.remove("la-times");
    _el("qs", "#minSideBarCont i").classList.add("la-bars");
  }
}

window.addEventListener("resize", function () {
  const appSidebarFixed = _el("qs", ".appSidebarFixed");
  if (window.innerWidth > 750) {
    appSidebarFixed.style.left = "0%";
    _el("qs", "#minSideBarCont i").classList.remove("la-bars");
    _el("qs", "#minSideBarCont i").classList.add("la-times");
  } else {
    appSidebarFixed.style.left = "-100%";
    _el("qs", "#minSideBarCont i").classList.remove("la-times");
    _el("qs", "#minSideBarCont i").classList.add("la-bars");
  }
});


function aboutSite(){
  swal.fire({
    title: 'About',
    text: 'JSjoskJOSJOJFDOSJFOSDJFHI',
    showCancelButton: false,
    showCloseButton: true,
    showConfirmButton: false,

  });
}