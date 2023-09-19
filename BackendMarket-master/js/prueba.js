const $input = document.querySelector("#label-cta");

const $credit_card = document.querySelector("#credit-card");
const $fecha = document.querySelector("#fecha");
const $cvv = document.querySelector("#cvv");
const $address = document.querySelector("#address");
const $cta = document.querySelector("#form-cta");


$input.addEventListener("click", ()=>{
    console.log("Se preciono");
    $credit_card.classList.toggle("is-disabled");
    $credit_card.toggleAttribute("disabled");
    $fecha.classList.toggle("is-disabled");
    $fecha.toggleAttribute("disabled");
    $cvv.classList.toggle("is-disabled");
    $cvv.toggleAttribute("disabled");
    $address.classList.toggle("is-disabled");
    $address.toggleAttribute("disabled");
    $cta.classList.toggle("is-disabled");
    $cta.toggleAttribute("disabled");
  })