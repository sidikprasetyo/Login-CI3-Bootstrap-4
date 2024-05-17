const flashData = $('.flash-data').data('flashdata');
if (flashData) {
    Swal.fire({
        title: 'Success',
        text: flashData, // Perhatikan ada spasi setelah 'Berhasil'
        icon: 'success'
    });
}

const flashDataa = $('.flashData').data('flashdata');
if (flashDataa) {
    Swal.fire({
        title: 'Failed',
        text: flashDataa, // Perhatikan ada spasi setelah 'Berhasil'
        icon: 'error'
    });
}

$('.custom-file-input').on('change', function(){
  let fileName = $(this).val().split('\\').pop();
  $(this).next('.custom-file-label').addClass("selected").html(fileName);
});