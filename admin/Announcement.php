<?php
require_once('AdminHeader.php');
?>
<!-- include libraries(jQuery, bootstrap) -->
<!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

<!-- include summernote css/js -->
<!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<form method="post"> -->

<script src="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.2/dist/quill.js"></script>
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.2/dist/quill.snow.css" rel="stylesheet">

<!-- <textarea id="summernote" name="editordata"></textarea>
</form> -->
<div class="container-fluid">
  <div class="row ">
    <div class="container-fluid col-12 mb-4">
      <div class="row rounded p-2 shadow" style="background: #eeefef;">
        <div class="col-md-6 mb-4">
          <label class="fs-4">Announcement</label>
          <div id="editor" style="height: 60px;">

          </div>
        </div>

        <div class="col-md-6">
          <label class="fs-4">Upload Picture (optional)</label>
          <div class="input-group mb-3">
            <input type="file" class="form-control" id="inputGroupFile02">
            <label class="input-group-text" for="inputGroupFile02">Upload</label>

          </div>
          <button type="button" class="btn btn-primary " id="newAnnouncement" style="width: 100%">New</button>
        </div>

      </div>
    </div>


    <div class="table-responsive">
      
        <label>Announcement List</label>
    

      <table class="table" id="table_announcement">
        <thead>
          <tr>
            <th>No.</th>
            <th>Announcement</th>
            <th>Image</th>
            <th>Created at</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>
  </div>
</div>
<script>
  // $(document).ready(function() {
  //     $('#summernote').summernote();
  // });




  let toolbaroptions = [
    ['bold', 'italic', 'underline', 'strike'],
    [{ header: [1, 2, 3, 4, 5, 6, false] }],
    [{ 'color': [] }, { 'background': [] }],
    [{ 'font': [] }],
  ];
  const quill = new Quill('#editor', {
    modules: {
      toolbar: toolbaroptions,
    },
    theme: 'snow'
  });


  $(document).ready(function () {
    let text;

    $("#newAnnouncement").click(function (e) {
      e.preventDefault();

      let text = quill.root.innerHTML;
      let file = $('#inputGroupFile02')[0].files[0];

      // Create FormData object to store both text and image
      let formData = new FormData();
      formData.append('announcement', text);
      formData.append('image', file);
      for (let entry of formData.entries()) {
        console.log(entry[0] + ': ' + entry[1]);
      }
      $("#place").text(text);

      console.log(file);
      $.ajax({
        type: 'POST',
        url: '../Controller/AnnouncementController.php',
        data: {
          text: text,
          file: file,
        },
        dataType: 'json',
        success: function (response) {
          // Handle the response from the server
          console.log(response);
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.error(jqXHR, textStatus, errorThrown);
        }
      });


    });
  });
  fetchAnnouncement();

  function fetchAnnouncement() {
    $.ajax({
      type: 'POST',
      url: '../Controller/AnnouncementController.php',
      data: {
        fetch_data: 'fetch_announcement'
      },
      dataType: 'json',
      success: function (data) {
        // console.log(data);
        $("#table_announcement").dataTable({
          "data": data,
          "responsive": true,
          "columns": [
            {
              "data": null,
              "orderable": false,
              "render": function (data, type, row, meta) {
                return meta.row + 1;
              }

            },
            {
              "data": "announcement_text"
            },
            {
              "data": "announcement_image",
              "orderable": false,
              "render": function (data, type, row, meta) {
                return '<img src="../asset/img/' + data + '" alt="Announcement Image" style="height: 100px;">';
              }
            },
            {
              "data": "date_created"
            },
            {
              "data": "announcment_id",
              "orderable": false,
              "render": function (data, type, row, meta) {
                var buttons = '';

                buttons += '<button type="button" class="btn btn-outline-primary EditAccountBtn me-2" data-bs-id="' + data + '" data-bs-toggle="modal" data-bs-target="#EditAccountModal">Edit</button>' +
                  '<button type="button" class="btn btn-outline-danger RemoveAccountBtn me-2" data-bs-id="' + data + '">Remove</button>' +'<button type="button" class="btn btn-outline-secondary ArchiveAccountBtn" data-bs-id="' + data + '" data-bs-value="1">Archive</button>';
  
                  // buttons += ;
                

                return buttons;
              }
            }

          ],
        });

      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.error(jqXHR, textStatus, errorThrown);
      }
    });
  }
</script>

<?php
require_once('AdminFooter.php');
?>