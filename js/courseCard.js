export function createCourseCard(course) {
  console.log(`create card function: ${course}`);
  
  // Create elements
  let courseCard = `
    <div class="course-card grid animation">
      <img class="course-img" src="${course.courseImg}" alt="course image">
      <div class="course-details-container">
        <div class="course-heading flex">
          <div class="lessons flex">
            <img src="assets/play.png" alt="play image">
            <span>${course.lessonsNum} Lessons</span>
          </div>
          <span class="tag">${course.tag}</span>
        </div>
        <p class="course-name">${course.name}</p>
        <div class="instructor-container">
          <div class="holder">
            <img class="circular-img" src="${course.instructor.img}" alt="course instructor img">
            <div class="instructor-details-card flex">
              <span class="instructor-name">${course.instructor.name}</span>
              <span class="instructor-role">${course.instructor.role}</span>
            </div>
          </div>
        </div>
        <div class="learn-more-card flex">
          <div class="stars-rating">${course.rating}</div>
          <a href="courseDetails.html?id=${course.id}">Learn More+</a>
        </div>
      </div>
    </div>
  `;

  // Add Child
  let cardContainer = document.querySelector('.courses-container');
  cardContainer.innerHTML += courseCard;
}
