const flashData = $(".flash-data").data("flashdata");

if (flashData) {
  Swal.fire({
    title: "Berhasil !",
    text: flashData,
    icon: "success",
    confirmButtonText: "OKE",
  });
}
