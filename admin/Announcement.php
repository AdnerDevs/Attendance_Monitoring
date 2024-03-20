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

  fetchAnnouncement();
  
  let announcement_id;
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


    $("#newAnnouncement").click(function (e) {
        e.preventDefault();

        // Get the text from the Quill editor
        let text = quill.root.innerHTML;

        // Get the selected file
        let fileInput = $('#inputGroupFile02');
        let file = fileInput.prop('files')[0];

        // Create FormData object
        let formData = new FormData();
        formData.append('text_sample', text);
        
        // Append file to FormData if it exists
        if (file) {
            formData.append('file_sample', file);
        }

        // Send AJAX request
        $.ajax({
            type: 'POST',
            url: '../Controller/AnnouncementController.php',
            data: formData,
            processData: false, // Don't process the data
            contentType: false, // Don't set content type
            dataType: 'json',
            success: function (response) {
                // Handle the response from the server
            
                if(response.failed == "You can't upload files of this type"){
      
                  $('#inputGroupFile02').val('');
                  alert(response.failed);
                }
                if(response.failed == "Sorry, your file is too large."){
                  
                  $('#inputGroupFile02').val('');
                  alert(response.failed);
                }
                if(response.success == true){
                  $("#table_announcement").DataTable().destroy();
                  alert("New announcement uploaded");
                 
                  fetchAnnouncement();
                }

            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error(jqXHR, textStatus, errorThrown);
            }
        });
    });


    $(".RemoveAccountBtn").click(function(e){
      e.preventDefault();
      announcement_id = $(this).data('bs-id');
      alert('click');
      $.ajax({
        type: 'POST',
        url: '../Controller/AnnouncementController.php',
        data: {
          delete_announcement: announcement_id
        },
        dataType: 'json',
        success: function(response){
          console.log(response);
        },
        error: function (error){
          console.log(error);
        }
      });
    });
});


 

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
              "data": "announcement_text",
              "render": function(data, type, row) {
                  // Render HTML content
                 return data;
              }
            },
            {
              "data": "announcement_image",
              "orderable": false,
              "render": function (data, type, row, meta) {
                if (data && data.trim() !== "") {
                    return '<img src="../asset/upload/' + data + '" alt="Announcement Image" style="height: 100px;">';
                } else {
                    return 'No Image Uploaded';
                }
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
                  '<button type="button" class="btn btn-outline-danger RemoveAccountBtn me-2" data-bs-id="' + data + '">Remove</button>';
                  if (row.isArchive == 1) {
                                                buttons += '<button type="button" class="btn btn-outline-warning ArchiveAccountBtn" data-bs-id="' + data + '" data-bs-value="0">Unarchive</button>';
                                            } else {
                                                buttons += '<button type="button" class="btn btn-outline-secondary ArchiveAccountBtn" data-bs-id="' + data + '" data-bs-value="1">Archive</button>';
                                            }

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