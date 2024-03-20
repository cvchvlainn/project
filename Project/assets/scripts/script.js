/* ИЗМЕНЕНИЕ ПРИ НАВЕДЕНИИ НА ПОИСК */
let search = document.querySelector(".search");
let searchInput = document.querySelector(".search input");

searchInput.addEventListener("mouseover", () => {
  search.style.background = "rgba(255, 255, 255, 0.20)";
});

searchInput.addEventListener("mouseout", () => {
  search.style.background = "rgba(255, 255, 255, 0.15)";
});

/* БУРГЕР-МЕНЮ */
let buttonMenuButton = document.querySelector(".burger-menu-button");
let burgerMenu = document.querySelector(".burger-menu");

buttonMenuButton.addEventListener("click", (e) => {
  e.preventDefault();
  burgerMenu.classList.toggle("active");
  if(burgerMenu.classList.contains("active")) {
    burgerMenu.style.display = "flex";
  } else {
    burgerMenu.style.display = "none";
  }
});

/* РАСКРЫВАЮЩИЕСЯ СПИСКИ */
let listButtons = document.querySelectorAll(".open-main-list");

listButtons.forEach((btn) => {
  btn.addEventListener("click", () => {
    let id = btn.dataset.id;
    let arrow = document.querySelector(`.open-main-list span[data-id="${id}"]`);
    let mainListBlock = document.querySelector(`.main-list-block[data-id="${id}"]`);
    let mainListHeight = document.querySelector(`.main-list-height[data-id="${id}"]`);
    let hiddenListBlock = document.querySelector(`.hidden-list-block[data-id="${id}"]`);
    let hiddenListHeight = document.querySelector(`.hidden-list-height[data-id="${id}"]`);

    mainListBlock.classList.toggle("active");
    if(mainListBlock.classList.contains("active")) {
      mainListBlock.style.height = `${mainListHeight.offsetHeight + 10}px`;
      arrow.style.transform = "rotate(225deg)";
      if(hiddenListBlock.classList.contains("active")) {
        mainListBlock.style.height = `${mainListHeight.offsetHeight + hiddenListHeight.offsetHeight + 10}px`;
      } else {
        mainListBlock.style.height = `${mainListHeight.offsetHeight + 10}px`;
      }
    } else {
      mainListBlock.style.height = "0px";
      arrow.style.transform = "rotate(45deg)";
    }
  });
});

let moreButtons = document.querySelectorAll(".more-button");

moreButtons.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    e.preventDefault();
    let id = btn.dataset.id;
    let hiddenListBlock = document.querySelector(`.hidden-list-block[data-id="${id}"]`);
    let hiddenListHeight = document.querySelector(`.hidden-list-height[data-id="${id}"]`);
    let mainListBlock = document.querySelector(`.main-list-block[data-id="${id}"]`);
    let mainListHeight = document.querySelector(`.main-list-height[data-id="${id}"]`);

    hiddenListBlock.classList.toggle("active");
    if(hiddenListBlock.classList.contains("active")) {
      mainListBlock.style.height = `${mainListHeight.offsetHeight + hiddenListHeight.offsetHeight - btn.offsetHeight + 10}px`;
      hiddenListBlock.style.height = `${hiddenListHeight.offsetHeight}px`;
      btn.style.display = "none";
    } else {
      hiddenListBlock.style.height = "0px";
    }
  });
});

let smallerButtons = document.querySelectorAll(".smaller-button");

smallerButtons.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    e.preventDefault();
    let id = btn.dataset.id;
    let moreButton = document.querySelector(`.more-button[data-id="${id}"]`);
    let hiddenListBlock = document.querySelector(`.hidden-list-block[data-id="${id}"]`);
    let mainListBlock = document.querySelector(`.main-list-block[data-id="${id}"]`);
    let mainListHeight = document.querySelector(`.main-list-height[data-id="${id}"]`);

    hiddenListBlock.classList.toggle("active");
    if(!hiddenListBlock.classList.contains("active")) {
      mainListBlock.style.height = `${mainListHeight.offsetHeight + btn.offsetHeight + 10}px`;
      hiddenListBlock.style.height = "0px";
      moreButton.style.display = "block";
    }
  });
});

// МЕНЮ ASIDE
let openAsideMenu = document.querySelector(".open-aside-menu");
let asideHidden = document.querySelector(".aside-hidden");

openAsideMenu.addEventListener("click", (e) => {
  e.preventDefault();
  asideHidden.classList.toggle("active");
  if(asideHidden.classList.contains("active")) {
    asideHidden.style.left = "0px";
  } else {
    asideHidden.style.left = "-280px";
  }
});

function windowResize() {
  if (window.innerWidth > 1200) {
    asideHidden.style.left = "-280px";
    asideHidden.classList.remove("active");
  }
}

window.addEventListener("resize", windowResize);

// СПИСОК СОРТИРОВКИ
let sectionSelect = document.querySelector(".section-select");
let sectionSelectOptions = document.querySelector(".section-select-options");
let arrow = document.querySelector(".section-select span");

if(sectionSelect != undefined) {
  sectionSelect.addEventListener("click", () => {
    sectionSelectOptions.classList.toggle("active");
    if(sectionSelectOptions.classList.contains("active")) {
      arrow.style.transform = "rotate(225deg)";
      sectionSelectOptions.style.display = "flex";
    } else {
      arrow.style.transform = "rotate(45deg)";
      sectionSelectOptions.style.display = "none";
      sectionSelect.style.borderRadius = "5px";  }
  });
}

// МОДАЛЬНОЕ ОКНО
let openModal = document.querySelectorAll(".auth-and-reg");
let closeModal = document.querySelector(".close");
let modalShadow = document.querySelector(".modal-shadow");
let body = document.querySelector("body");

openModal.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    e.preventDefault();
    modalShadow.style.display = "flex";
    body.style.overflow = "hidden";
  });
});

closeModal.addEventListener("click", () => {
  modalShadow.style.display = "none";
  body.style.overflow = "";
});

let showSignUp = document.querySelector(".show-sign-up span");
let formSignUp = document.querySelector(".sign-up");
let showLogIn = document.querySelector(".show-log-in span");
let formLogIn = document.querySelector(".log-in");

showSignUp.addEventListener("click", () => {
  formSignUp.style.display = "flex";
  formLogIn.style.display = "none";
});

showLogIn.addEventListener("click", () => {
  formSignUp.style.display = "none";
  formLogIn.style.display = "flex";
});

// ДОБАВЛЕНИЕ ПОСТА
let standartPostButton = document.querySelectorAll(".standart-post");
let imagePostButton = document.querySelectorAll(".image-post");
let post1 = document.querySelector("#post-1");
let post2 = document.querySelector("#post-2");

if(standartPostButton != undefined) {
  standartPostButton.forEach((btn) => {
    btn.addEventListener("click", () => {
      post1.style.display = "flex";
      post2.style.display = "none";
    });
  });
}

if(imagePostButton != undefined) {
  imagePostButton.forEach((btn) => {
    btn.addEventListener("click", () => {
      post1.style.display = "none";
      post2.style.display = "flex";
    });
  });
}

// CUSTOM SELECT
let communityChoice = document.querySelectorAll(".community-choice");
let topicsSelect = document.querySelectorAll(".topics-select");

communityChoice.forEach((btn) => {
  btn.addEventListener("click", () => {
    let id = btn.dataset.select;
    let topicsSelect = document.querySelector(`.topics-select[data-select="${id}"]`);

    topicsSelect.classList.toggle("active");
    if(topicsSelect.classList.contains("active")) {
      topicsSelect.style.display = "flex";
    } else {
      topicsSelect.style.display = "none";
    }
  });
});

let namePlaceholder = document.querySelectorAll(".name-placeholder");

namePlaceholder.forEach((placeholder) => {
  let id = placeholder.dataset.select;
  let topicsOption = document.querySelectorAll(`.topics-select[data-select="${id}"] .topics-option`);

  topicsOption.forEach((option) => {
    option.addEventListener("click", () => {
      let selectedValue = option.dataset.value;
      let selectedOption = document.querySelector(`.selected-value[data-select="${id}"]`);

      selectedOption.value = selectedValue;
      placeholder.style.color = "white";
      placeholder.textContent = option.textContent;
    });
  });
})

// ПРИМЕЧАНИЕ
let noteImg = document.querySelectorAll(".note-img");
let noteDiv = document.querySelectorAll(".note-div");

noteImg.forEach((img, index) => {
  img.addEventListener("mouseover", () => {
    noteDiv[index].style.display = "block";
  });

  img.addEventListener("mouseout", () => {
    noteDiv[index].style.display = "none";
  });
});

// АССИНХРОННЫЙ ЗАПРОС
document.addEventListener("DOMContentLoaded", () => {
  const forms = document.querySelectorAll(".async-form");

  forms.forEach((form) => {
    form.addEventListener("submit", async (e) => {
      e.preventDefault();
      let data = new FormData(form);

      try {
        const response = await fetch("./vendor/action/likes.php", {
          method: "POST",
          body: data,
        });

        if (response.ok) {
            const updatedLikes = await response.text();
            
            if(updatedLikes.length != 0) {
              form.querySelector('button[name="like"] span').textContent = updatedLikes;

              let likeImg = form.querySelector('.like img');
              likeImg.classList.toggle("active-like");

              if(likeImg.classList.contains("active-like")) {
                likeImg.src = "./assets/images/like-active.png";
              } else {
                likeImg.src = "./assets/images/like-dislike.png";
              }
            
            }
        } else {
          console.error("Ошибка сервера:", response.status);
        }
      } catch (error) {
        console.error("Ошибка получения:", error);
      }
    });
  });
});

// АВАТАР
document.addEventListener("DOMContentLoaded", () => {
  const fileInput = document.querySelector("#avatar-file");
  const form = document.querySelector("#avatar-form");

  fileInput.addEventListener("change", () => {
      form.submit();
  });
});