// Dark mode
const buttonMode = document.getElementById("flexSwitchCheckDefault");
const statusMode = document.getElementById("status-mode");
const navbar = document.querySelector(".navbar");
const navbarCollapse = document.querySelector(".collapse");
const footer = document.querySelector(".footer");
const content = document.querySelector(".content");
const boxContent = document.querySelector(".box-content");
const boxComment = document.querySelector(".box-comment");
const boxNewPost = document.querySelector(".box-new-post");
const cardNewPost = document.querySelectorAll(".box-new-post > .card");
const boxNavigation = document.querySelector(".box-navigation");
const boxSocialMedia = document.querySelector(".box-social-media");
const boxContact = document.querySelector(".box-contact");
const cardAllPost = document.querySelectorAll(
  ".box-all-post > div > a > .card"
);
const formLoginRegister = document.querySelector(".form-login-register");
const linkActive = document.querySelector(".active");
const boxPreview = document.querySelector(".box-preview");
const boxPreviewLabel = document.getElementById("box-label-preview");

if (localStorage.getItem("status") === "") {
  localStorage.setItem("status", "Light");
}

statusMode.innerText = localStorage.getItem("status");

const setMode = () => {
  if (buttonMode.checked) {
    localStorage.setItem("status", "Dark");
    setToDark();
  } else {
    localStorage.setItem("status", "Light");
    setToLight();
  }
  statusMode.innerText = localStorage.getItem("status");
};

const setToDark = () => {
  navbar.classList.remove("bg-white");
  navbar.classList.add("bg-dark", "navbar-dark", "text-white");

  navbarCollapse.classList.add("bg-dark", "text-white");

  if (linkActive) {
    linkActive.classList.remove("active");
    linkActive.classList.add("active-dark");
  }

  footer.classList.add("dark", "text-white");

  content.classList.remove("bg-light");
  content.classList.add("dark", "text-white");

  if (boxContent && boxComment && boxNewPost) {
    boxContent.classList.remove("bg-white");
    boxContent.classList.add("bg-dark", "text-white");

    boxComment.classList.remove("bg-white");
    boxComment.classList.add("bg-dark", "text-white");

    boxNewPost.classList.remove("bg-white");
    boxNewPost.classList.add("bg-dark", "text-white");
  }

  if (boxPreview && boxPreviewLabel) {
    boxPreview.classList.remove("bg-white");
    boxPreview.classList.add("bg-dark", "text-white");

    boxPreviewLabel.classList.remove("bg-white");
    boxPreviewLabel.classList.add("bg-dark", "text-white");
  }

  if (formLoginRegister) {
    formLoginRegister.classList.add("bg-dark", "text-white");
  }

  boxNavigation.classList.add("bg-dark", "text-white");

  boxSocialMedia.classList.add("bg-dark", "text-white");

  boxContact.classList.add("bg-dark", "text-white");

  //   if (cardNewPost) {
  //     for (i in cardNewPost) {
  //         cardNewPost[i].classList.add("bg-secondary");
  //     }
  //   }
};

const setToLight = () => {
  navbar.classList.remove("bg-dark", "navbar-dark", "text-white");
  navbar.classList.add("bg-white");

  navbarCollapse.classList.remove("bg-dark", "text-white");

  if (linkActive) {
    linkActive.classList.remove("active-dark");
    linkActive.classList.add("active");
  }

  content.classList.remove("dark");
  content.classList.add("bg-light");

  footer.classList.remove("dark", "text-white");

  content.classList.remove("dark", "text-white");
  content.classList.add("bg-light");

  if (boxContent && boxComment && boxNewPost) {
    boxContent.classList.remove("bg-dark", "text-white");
    boxContent.classList.add("bg-white");

    boxComment.classList.remove("bg-dark", "text-white");
    boxComment.classList.add("bg-white");

    boxNewPost.classList.remove("bg-dark", "text-white");
    boxNewPost.classList.add("bg-white");
  }

  if (boxPreview && boxPreviewLabel) {
    boxPreview.classList.remove("bg-dark", "text-white");
    boxPreview.classList.add("bg-white");

    boxPreviewLabel.classList.remove("bg-dark", "text-white");
    boxPreviewLabel.classList.add("bg-white");
  }

  if (formLoginRegister) {
    formLoginRegister.classList.remove("bg-dark", "text-white");
  }

  boxNavigation.classList.remove("bg-dark", "text-white");

  boxSocialMedia.classList.remove("bg-dark", "text-white");

  boxContact.classList.remove("bg-dark", "text-white");

  //   if (cardNewPost) {
  //     for (i in cardNewPost) {
  //         cardNewPost[i].classList.remove("bg-secondary");
  //     }
  //   }
};

if (localStorage.getItem("status") === "Dark") {
  buttonMode.checked = true;
  setToDark();
}

// End dark mode
