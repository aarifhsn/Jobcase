/********************* Area Range Value **********************/

var salary_range = document.getElementById("salary_range");

noUiSlider.create(salary_range, {
    start: [9],
    step: 1,
    range: {
        min: [1],
        max: [15],
    },
});

var salary_rangeValue = document.getElementById("salary_range_span");

salary_range.noUiSlider.on("update", function (values, handle) {
    salary_rangeValue.innerHTML = values[handle];
});
