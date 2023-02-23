// import Image from "@ckeditor/ckeditor5-image/src/image";
// import ImageResizeEditing from "@ckeditor/ckeditor5-image/src/imageresize/imageresizeediting";
// import ImageResizeHandles from "@ckeditor/ckeditor5-image/src/imageresize/imageresizehandles";

ClassicEditor.create(document.querySelector("#editor"), {
  ckfinder: {
    uploadUrl: "<?= base_url('mahasiswa/uploadImages') ?>",
  },
  placeholder: "Mulai Kerjakan Laporan !",
})
  .then((editor) => {
    console.log(editor);
  })
  .catch((error) => {
    console.error(error);
  });
