let menu = document.querySelector(".menu")
let aside = document.querySelector("aside")

menu.addEventListener("click", () => {
    aside.classList.toggle("show")
})

let hasil = 20 / 52 * 100
console.log(Math.floor(hasil));


let dropdown = document.querySelectorAll(".dropdown")
dropdown.forEach(e => {
    e.parentElement.addEventListener("click", () => {
        e.parentElement.classList.toggle("active")
    })
})


let modalTrigger = document.querySelector('.modalTrigger')
let containerModal = document.querySelector('.containerModal')
let close = document.querySelector('.close')

modalTrigger.addEventListener('click', () => {
    containerModal.classList.toggle('active')
})

close.addEventListener('click', () => {
    containerModal.classList.toggle('active')
})