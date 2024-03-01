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
      <div class="row rounded p-2 shadow" style="background: #f3e2ff;">
        <div class="col-md-6 mb-4" style="min-vh-120px;">
          <label class='fs-4'>Announcement</label class='fs-4'>
          <div id="editor" style="height: 60px;">
      
          </div>
        </div>

        <div class="col-md-6">
          <label class='fs-4'>Upload Picture (optional)</label class='fs-4'>
          <div class="input-group mb-3">
            <input type="file" class="form-control" id="inputGroupFile02">
            <label class="input-group-text" for="inputGroupFile02">Upload</label>
          
          </div>
          <button class="btn btn-primary" style="width: 100%">New</button>
        </div>
  
      </div>
    </div>
   
  
    <div class="table-responsive">
      <div class="d-flex flex-row p-2 align-items-center">
        <p class="h4 mb-0 me-2">Announcement List</p>
      </div>
    
    
    
      <table class="table align-middle" id="myTable">
        <thead class="table-dark">
          <tr>
            <th>No.</th>
            <th>Announcement</th>
            <th>Date Created</th>
            <th>Date Updated</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
       
            ?>
            <tr>
              <td>
            
              </td>
              <td>
               
              </td>
              <td>
            
              </td>
              <td>
           
              </td>
    
              <td>
                <button type="button" class="btn btn-primary me-2 EditActivityBtn" id=""
                  data-bs-type="" data-bs-id="" data-bs-toggle="modal"
                  data-bs-target="#EditActivityModal">Edit</button>
                <button type="button" class="btn btn-danger me-2 DeleteActivityBtn"
                  data-bs-id="">delete</button>
                <button type="button" class="btn btn-secondary "
                  data-bs-id="">
                
                </button>
    
              </td>
            </tr>
    
            <?php
    
    
          ?>
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
    ['bold','italic', 'underline', 'strike'],
    [{header:[1,2,3,4,5,6,false]}],
  ];
  const quill = new Quill('#editor', {
    modules:{
      toolbar: toolbaroptions,
    },
    theme: 'snow'
  });
</script>

<?php
require_once('AdminFooter.php');
?>