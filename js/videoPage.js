$(document).ready(function () {
  $(".section-toggle").click(function () {
    $(this).closest(".section").toggleClass("close");
  });
});

document.getElementById("default").click();
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


function generateCourseCurriculum(){
  return ` <div class="course-curriculum">
  <ul class="curriculum-sections">

  </ul>`
}

function generateCurriculumList(){
  return  ` <li class="section">
  <div class="section-header">
    <div class="section-left">
      <h5 class="section-title">Welcome! Course Introduction</h5>
      <span class="section-toggle">
        <ion-icon class="icon-up" name="chevron-up-outline"></ion-icon>
        <ion-icon class="icon-down" name="chevron-down-outline"></ion-icon>
      </span>
    </div>
  </div>
  <ul class="section-content">
    <li class="preview">
      <a href="coursevideo.html">
        <span>A Beginners Introduction to</span>
        <span class="videoLength"> preview </span>
        <ion-icon name="lock-closed-outline"></ion-icon>
      </a>
    </li>
    <li>
      <a href="#">
        <span>A Beginners Introduction to</span>
        <span class="videoLength"> 5 minute </span>
        <ion-icon name="lock-closed-outline"></ion-icon>
      </a>
    </li>
    <li>
      <a href="#">
        <span>A Beginners Introduction to</span>
        <span class="videoLength">7 minute </span>
        <ion-icon name="lock-closed-outline"></ion-icon>
      </a>
    </li>
  </ul>
</li>
<li class="section">
  <div class="section-header">
    <div class="section-left">
      <h5 class="section-title">Welcome! Course Introduction</h5>
      <span class="section-toggle">
        <ion-icon class="icon-up" name="chevron-up-outline"></ion-icon>
        <ion-icon class="icon-down" name="chevron-down-outline"></ion-icon>
      </span>
    </div>
  </div>
  <ul class="section-content">
    <li>
      <a href="#">
        <span>A Beginners Introduction to</span>
        <span class="videoLength"> 10 minute </span>
        <ion-icon name="lock-closed-outline"></ion-icon>
      </a>
    </li>
    <li>
      <a href="#">
        <span>A Beginners Introduction to</span>
        <span class="videoLength"> 2 minute </span>
        <ion-icon name="lock-closed-outline"></ion-icon>
      </a>
    </li>
    <li>
      <a href="#">
        <span>A Beginners Introduction to</span>
        <span class="videoLength"> 15 minute </span>
        <ion-icon name="lock-closed-outline"></ion-icon>
      </a>
    </li>
  </ul>
</li>`
}