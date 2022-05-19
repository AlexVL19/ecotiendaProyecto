var confirmar = document.getElementById('confirm')

confirmar.addEventListener('click', function() {
    Swal.fire({
        icon: 'success',
        title: '¡Compra completada!',
        timer: 1000
      })
      .then ((result) => {
          if(result.dismiss) {
              parent.location.href="/buy";
          }
      })
});
