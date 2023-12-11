import { createCategoryCard } from "./catergoryCard.js";
import { createCourseCard } from "./courseCard.js";
import { createInstructorCard } from "./instructorCard.js";

let courses;
let category;
let allCards;
let instructors;


const profImg = document.querySelector(".profImg")
const imgUrl = "./assets/laura-jones.jpg"
profImg.src = imgUrl


fetch("data/courses.json")
  .then((response) => response.json())
  .then((json) => {
    courses = json.courses;
    courses.map((el) => {
      createCourseCard(el);
    });
  })
  .catch((err) => console.error(err));

fetch("data/category.json")
  .then((response) => response.json())
  .then((json) => {
    category = json.categories;
    category.map((el) => {
      createCategoryCard(el);
    });
  })

  .catch((err) => console.error(err));

fetch("data/instructor.json")
  .then((response) => response.json())
  .then((json) => {
    instructors = json.instructors;
    instructors.map((el) => {
      createInstructorCard(el);
    });
  })

  .catch((err) => console.error(err));

/////////////
const courseCategoryList = document.querySelectorAll(
  ".course-section-list li a"
);

var parent = document.querySelector(".courses-container");
parent.addEventListener("DOMNodeInserted", function (e) {
  allCards = document.querySelectorAll(".courses-container .course-card");
  window.addEventListener("load", function () {
    document.querySelector(".courses-container .course-card").style.display =
      "none";
  });
});

courseCategoryList.forEach((el) => {
  el.addEventListener("click", () => {
    if (!el.classList.contains("active")) {
      courseCategoryList.forEach((item) => item.classList.remove("active"));
      el.classList.add("active");
      let tag = el.innerHTML;

      if (tag !== "All") {
        console.log("safe");
        let filter = courses.filter((item) => item.tag === tag);
        allCards.forEach((card) => card.remove());
        filter.map((el) => {
          createCourseCard(el);
        });
      } else {
        allCards.forEach((card) => card.remove());
        courses.map((el) => createCourseCard(el));
      }
    }
  });
});


// ----------------NAV BAR------------------------

const sectionHeroEl = document.querySelector(".section-hero");

const observer = new IntersectionObserver(
  (entries) => {
    const ent = entries[0];
    // console.log(ent)
    if (ent.isIntersecting === false) {
      document.body.classList.add("sticky");
    } else {
      document.body.classList.remove("sticky");
    }
  },
  {
    //In the viewport
    root: null,
    threshold: 0,
    rootMargin: "-80px",
  }
);
observer.observe(sectionHeroEl);




// allLinks.forEach((link) => {
//   link.addEventListener("click", (e) => {
//     e.preventDefault();
//     const href = link.getAttribute("href");
//     console.log(href);
//     if (href === "#") {
//       window.scrollTo({
//         top: 0,
//         behavior: "smooth",
//       });
//     }
//     if (href !== "#" && href.startsWith("#")) {
//       const sectionEl = document.querySelector(href);
//       sectionEl.scrollIntoView({ behavior: "smooth" });
//     }

//     if (link.classList.contains("main-nav-link")) {
//       headerEL.classList.toggle("nav-open");
//     }
//   });
// });