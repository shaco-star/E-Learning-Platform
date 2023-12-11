export function createCategoryCard(category) {
  const categoryCard = `
    <div class="category-card flex">
      <img class="circular-img" src="${category.img}" alt="course category image">
      <div class="category-details-container">
        <p>${category.name}</p>
        <p>${category.courseNumber} Courses</p>
      </div>
    </div>
  `;

  const parent = document.querySelector('.category-container');
  parent.innerHTML += categoryCard;
}
