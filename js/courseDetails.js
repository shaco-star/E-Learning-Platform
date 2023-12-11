let urlParams = new URLSearchParams(window.location.search);

let id = parseInt(urlParams.get("id"));

// let courses;
// let filter;

// fetch("data/courses.json")
//   .then((response) => response.json())
//   .then((json) => {
//     console.log(id);
//     let courses = json.courses;
//     filter = courses.filter((item) => item.id === id);
//     // console.log(filter);
//   })
//   .catch((err) => console.error(err));

document.getElementById("default").click();

// TAB menu function
function openTab(evt, tab) {
  var i, tabContent, tabLinks;

  tabContent = document.querySelectorAll(".tabcontent");
  tabContent.forEach((element) => {
    element.style.display = "none";
  });

  tabLinks = document.querySelectorAll(".tablinks");
  for (i = 0; i < tabLinks.length; i++) {
    tabLinks[i].className = tabLinks[i].className.replace(" active", "");
  }

  document.getElementById(tab).style.display = "block";
  evt.currentTarget.className += " active";
}

// -----------------Toggle menu ---------------

//course curriculum toggle function
$(document).ready(function () {
  $(".section-toggle").click(function () {
    $(this).closest(".section").toggleClass("close");
  });
});

// course details data
$.getJSON("data/courses.json", function (courses) {
  let coursesArray = courses.courses;
  let filteredCourses = coursesArray.filter(function (course) {
    return course.id === id;
  });
  let course = filteredCourses[0];

  $(".heading").text(course.name);
  $(".course-heading").text(course.name);
  $(".duration").text(course.duration);
  $(".student").text(course.enrollment);
  $(".lessons").text(course.lessonsNum);
  $(".level").text(course.skillLevel);
  $(".language").text(course.language);
  $(".quiz").text(course.numberOfQuizzes);
  $(".cert").text(course.cert);
  $(".pass").text(course.duration);
  $(".deadline").text(course.enrollmentDeadline);
  $(".instructorName").text(course.instructor.name);
  $(".price-btn span").text(course.price);

  console.log(filteredCourses);
});
