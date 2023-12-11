$(document).ready(function () {
  let courseList = $("#course-list");

  $("#add-course").click(function (e) {
      e.preventDefault();

      let courseName = $("#course-name").val().trim();
      if (courseName === "") {
          alert("Please enter a course name.");
          return;
      }

      let courseId = new Date().getTime();
      let listItem = createListItem(courseId, courseName);
      courseList.append(listItem);
      $("#course-name").val("");
  });

  courseList.on("click", ".edit", function () {
      let listItem = $(this).closest("li");
      let courseId = listItem.attr("data-id");
      let courseName = listItem.find(".course-name").text();
      $("#course-id").val(courseId);
      $("#course-name").val(courseName);
      $("#add-course").hide();
      $("#update-course").show();
  });
  
  $("#update-course").click(function (e) {
      e.preventDefault();
  
      let courseName = $("#course-name").val().trim();
      if (courseName === "") {
          alert("Please enter a course name.");
          return;
      }
  
      let courseId = $("#course-id").val();
      let listItem = courseList.find(`[data-id='${courseId}']`);
      listItem.find(".course-name").text(courseName);
  
      $("#course-id").val("");
      $("#course-name").val("");
      $("#update-course").hide();
      $("#add-course").show();
  });
  
  courseList.on("click", ".delete", function () {
      if (confirm("Are you sure you want to delete this course?")) {
          $(this).closest("li").remove();
      }
  });
  
  function createListItem(courseId, courseName) {
      return `
          <li data-id="${courseId}">
              <span class="course-name">${courseName}</span>
              <div>
                  <button class="edit">Edit</button>
                  <button class="delete">Delete</button>
              </div>
          </li>
      `;
  }
});

$(document).ready(function () {
  let itemList = $("#item-list");

  $("#add-item").click(function (e) {
      e.preventDefault();

      let itemName = $("#item-name").val().trim();
      let itemType = $("#item-type").val();

      if (itemName === "") {
          alert("Please enter a name for the lesson or quiz.");
          return;
      }

      let itemId = new Date().getTime();
      let listItem = createListItem(itemId, itemName, itemType);
      itemList.append(listItem);
      $("#item-name").val("");
  });

  function createListItem(itemId, itemName, itemType) {
      return `
          <li data-id="${itemId}">
              <span>${itemType === "lesson" ? "Lesson" : "Quiz"}: ${itemName}</span>
          </li>
      `;
  }
});

$(document).ready(function () {
  const studentScores = [
      { name: "Ahmed", score: 85 },
      { name: "Gamal", score: 90 },
      { name: "Karim", score: 95 },
  ];

  const scoreTableBody = $("#score-table tbody");

  studentScores.forEach(student => {
      const tableRow = createTableRow(student.name, student.score);
      scoreTableBody.append(tableRow);
  });

  function createTableRow(studentName, studentScore) {
      return `
          <tr>
              <td>${studentName}</td>
              <td>${studentScore}</td>
          </tr>
      `;
  }
});

$(document).ready(function () {
  const comments = [
      { id: 1, studentName: "Ahmed", text: "I have a question about the assignment." },
      { id: 2, studentName: "Gamal", text: "Can you provide more examples?" },
      { id: 3, studentName: "Karim", text: "I'm having trouble understanding this topic." },
  ];

  
  const commentList = $("#comment-list");

  comments.forEach(comment => {
      const listItem = createListItem(comment.id, comment.studentName, comment.text);
      commentList.append(listItem);
  });

  
  commentList.on("click", ".reply-btn", function () {
      const replyForm = $(this).closest("li").find(".reply-form");
      replyForm.toggle();
  });

  commentList.on("submit", ".reply-form", function (e) {
      e.preventDefault();
      const replyText = $(this).find(".reply-text").val().trim();

      if (replyText === "") {
          alert("Please enter a reply.");
          return;
      }

      alert(`Reply submitted: ${replyText}`);
      $(this).find(".reply-text").val("");
      $(this).hide();
  });

  function createListItem(commentId, studentName, commentText) {
      return `
          <li data-id="${commentId}">
              <div class="comment">
                  <strong>${studentName}:</strong> ${commentText}
              </div>
              <button class="reply-btn">Reply</button>
              <form class="reply-form">
                  <input type="text" class="reply-text" placeholder="Your reply...">
                  <button type="submit">Submit</button>
              </form>
          </li>
      `;
  }
});



















$(document).ready(function () {
    // Sample data
    const instructorProfile = {
        name: "Magdy",
        email: "Magdy.123@eelu.com",
        bio: "Magdy is an experienced instructor with a passion for teaching and sharing knowledge."
    };
  
    // Display instructor profile
    $("#profile-name").text(instructorProfile.name);
    $("#profile-email").text(instructorProfile.email);
    $("#profile-bio").text(instructorProfile.bio);
  });
















