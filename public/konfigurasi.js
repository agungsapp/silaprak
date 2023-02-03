// The editor creator to use.

ClassicEditor.create(document.querySelector("#editor"), {
  ckfinder: {
    uploadUrl: "<?= base_url('mahasiswa/uploadImages') ?>",
  },
  placeholder: "Mulai Kerjakan Laporan !",
  // This value must be kept in sync with the language defined in webpack.config.js.
  language: "en",
})
  .then((editor) => {
    console.log(editor);
  })
  .catch((error) => {
    console.error(error);
  });
