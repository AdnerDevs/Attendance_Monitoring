<?php
require_once ('AdminHeader.php');
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
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="modal fade" id="AnnouncementModal" tabindex="-1" aria-labelledby="AnnouncementModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="AnnouncementModalTitle"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row rounded p-2 ">
          <div class="col-md-6 mb-4">
            <label class="">Announcement</label>
            <div id="editor2" style="height: 100px;">
              
            </div>
          </div>

          <div class="col-md-6">
          
           
            <label class="">Upload New Image Picture (optional)</label>
            <div class="input-group mb-3">
              <input type="file" class="form-control" id="inputGroupFile03">
              <label class="input-group-text" for="inputGroupFile03">Upload</label>

            </div>
            <div class="image_preview" >
              <!-- <img src="" alt="Preview Image" style="max-height: 100px;"> -->
            </div>
            <!-- <button type="button" class="btn btn-primary " id="updateAnnouncement" style="width: 100%">New</button> -->
          </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary updateAnnouncement" id="updateAnnouncement" data-bs-dismiss="modal">Save changes</button>
        <input type="hidden" id="old_image">
      </div>
    </div>
  </div>
</div>


<script>


  let announcement_id;
  let quill2;
  let toolbaroptions = [
    ['bold', 'italic', 'underline', 'strike'],
    [{
      header: [1, 2, 3, 4, 5, 6, false]
    }],
    [{
      'color': []
    }, {
      'background': []
    }],
    [{
      'font': []
    }],
  ];
  const quill = new Quill('#editor', {
    modules: {
      toolbar: toolbaroptions,
    },
    theme: 'snow'
  });


    quill2 = new Quill('#editor2', {
        modules: {
            toolbar: toolbaroptions,
        },
        theme: 'snow'
    });


  $(document).ready(function () {

    

    fetchAnnouncement();



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

          if (response.failed == "You can't upload files of this type") {

            $('#inputGroupFile02').val('');
            alert(response.failed);
          }
          if (response.failed == "Sorry, your file is too large.") {

            $('#inputGroupFile02').val('');
            alert(response.failed);
          }
          if (response.success == true) {
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
            "columns": [{
              "data": null,
              "render": function (data, type, row, meta) {
                return meta.row + 1;
              }

            },
            {
              "data": "announcement_text",
              "render": function (data, type, row) {
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
              "data": "isArchive",
              "render": function (data, type, row, meta) {
                if (data == 1) {
                  return '<span class="text-warning">Archived</span>'
                } else {
                  return '<span class="text-success">Active</span>'
                }
              }
            },
            {
              "data": "announcment_id",
              "orderable": false,
              "render": function (data, type, row, meta) {
                var buttons = '';

                buttons += '<button type="button" class="btn btn-outline-primary EditAccountBtn me-2" data-bs-id="' + data + '" data-bs-toggle="modal" data-bs-target="#AnnouncementModal">Edit</button>' +
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


          $("#table_announcement").on("click", ".EditAccountBtn", function (e) {
            e.preventDefault();
            announcement_id = $(this).data("bs-id");
            getAnnouncementById(announcement_id, data);

          });


        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.error(jqXHR, textStatus, errorThrown);
        }
      });
    }


    function getAnnouncementById(announcement_id, data) {
        const announcement = data.find(item => item.announcment_id === announcement_id);

        if (announcement) {
          var imageURL
          quill2.root.innerHTML = announcement.announcement_text;
          if (announcement.announcement_image && announcement.announcement_image.trim() !== "") {
              imageURL = "../asset/upload/" + announcement.announcement_image;
              var imgElement = $("<img>").attr("src", imageURL).addClass("announcement-image").css("max-height", "100px");
              $(".image_preview").html(imgElement);
          } else {
              $(".image_preview").text("No Image uploaded");
          }
          $("#AnnouncementModalTitle").text("Update Announcement");
          $(".updateAnnouncement").val(announcement_id);
      
          $("#old_image").val(announcement.announcement_image);
          
        }


       
    }

    $(document).on("click", "#updateAnnouncement", function(e){
            e.preventDefault();
            announcement_id = $(this).val();
            old_image = $("#old_image").val();
          
            updateAnnouncement(announcement_id, old_image);

    });

    function updateAnnouncement(announcement_id, old_image){
      console.log(announcement_id);

      let text = quill2.root.innerHTML;

        // Get the selected file
        let fileInput = $('#inputGroupFile03');
        let file = fileInput.prop('files')[0];

        // Create FormData object
        let formData = new FormData();
        formData.append('announcement_text', text);
        formData.append('update_announcement_id', announcement_id);
        formData.append('previous_image', old_image);
        // Append file to FormData if it exists
        if (file) {
          formData.append('update_file', file);
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
    
          if (response.failed == "You can't upload files of this type") {

            $('#inputGroupFile03').val('');
            alert(response.failed);
          }
          if (response.failed == "Sorry, your file is too large.") {

            $('#inputGroupFile03').val('');
            alert(response.failed);
          }
          if (response.success == true) {
            $("#table_announcement").DataTable().destroy();
            alert("Announcement has been updated");
            quill2.root.innerHTML = "";
            $("")
            $('#inputGroupFile03').val('');
            fetchAnnouncement();
          }

        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.error(jqXHR, textStatus, errorThrown);
        }
      });


    }

    $(document).on('click', '.RemoveAccountBtn', function (e) {
      e.preventDefault();
      announcement_id = $(this).data('bs-id');
      var confirmRemove = confirm('Are you sure you want to remove this announcement?');

      if (confirmRemove) {

        $.ajax({
          type: 'POST',
          url: '../Controller/AnnouncementController.php',
          data: {
            delete_announcement: announcement_id
          },
          dataType: 'json',
          success: function (response) {
            if (response === 'success') {
              $("#table_announcement").DataTable().destroy();
              fetchAnnouncement();
            }
          },
          error: function (error) {
            console.log(error);
          }
        });
      } else {
        return;
      }
    });

    $(document).on('click', '.ArchiveAccountBtn', function (e) {
      announcement_id = $(this).data('bs-id');
      let value = $(this).data('bs-value');

      $.ajax({
        type: 'POST',
        url: '../Controller/AnnouncementController.php',
        data: {
          archive_announcement: announcement_id,
          archive_value: value
        },
        dataType: 'json',
        success: function (response) {
          if (response.success !== false) {
            $("#table_announcement").DataTable().destroy();
            fetchAnnouncement();
          } else {
            alert(response.failed);
          }
          console.log(response);
        },
        error: function (error) {
          console.log(error);
        }
      });
    });


  });




</script>

<?php
require_once ('AdminFooter.php');
?>