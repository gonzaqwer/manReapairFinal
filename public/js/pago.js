document
    .getElementById("formularioPago")
    .addEventListener("submit", validarFormulario);

function validarFormulario(evento) {
    evento.preventDefault();
    var usuario = document.getElementById("numeroTarjeta").value;
    if (usuario.length == 0) {
        alert("No has escrito nada en el usuario");
        return;
    }
    // var clave = document.getElementById("clave").value;
    // if (clave.length < 6) {
    //     alert("La clave no es válida");
    //     return;
    // }
    this.submit();
}

// const pago = document.getElementById("botonPagar");
// pago.addEventListener("click", relizarPago);

// function randomDePago() {
//     let numeroRandom = Math.floor(Math.random() * 10);
//     console.log(numeroRandom);
//     if (numeroRandom >= 7 && numeroRandom <= 9) {
//         Swal.fire({
//             icon: "error",
//             title: "Pago rechazado...",
//         });
//         return false;
//     } else {
//         Swal.fire({
//             icon: "success",
//             title: "Pago realizado con exito",
//             showConfirmButton: true,
//             // timer: 1500,
//         }).then(function () {
//             window.location.href = "url";
//         });
//         return true;
//     }
// }

// function relizarPago() {
//     let estadoPago = randomDePago();
//     console.log(estadoPago);
// }
