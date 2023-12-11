const fs = require("fs");

fs.readFile("data/courses.json", "utf8", (err, data) => {
  if (err) throw err;
  const courses = JSON.parse(data);
  console.log(courses);
});
