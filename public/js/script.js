const select = document.querySelectorAll(".select2");
for (let i = 0; i < select.length; i++) {
    const div = select[i].querySelector("#div");
    const options = select[i].querySelector("#options");
    div.addEventListener("click", () => {
        div.classList.toggle("active");
        options.classList.toggle("display");
        select[i].classList.toggle("shadow");
    });
    const option = options.querySelectorAll("div");
    for (let i = 0; i < option.length; i++) {
        option[i].addEventListener("click", () => {
            div.querySelector("span").innerHTML = option[i].innerHTML;
        });
    }
}
