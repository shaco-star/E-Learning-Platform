export function createInstructorCard(instructor) {
  const instructorCard = `
    <div class="instructor-card">
      <img src="${instructor.imgSrc}" alt="instructor background image">
      <div class="instructor-card-description flex">
        <div class="instructor-text">
          <p class="course-name">${instructor.instructorName}</p>
          <p class="instructor-role">${instructor.instructorRole}</p>
          <span class="stars-rating">${instructor.starsRating}</span>
        </div>
        <img class="circular-img" src="${instructor.instructorImgSrc}" alt="instructor image">
      </div>
    </div>
  `;

  const main = document.querySelector('.instructors-card-container');
  main.innerHTML += instructorCard;
}
