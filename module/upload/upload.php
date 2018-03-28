<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a> UPLOAD FILES</h3>
    </div>

    <div class="panel-body">
        <div class="content-row">
    	   <h2 class="content-row-title">Select Files From Your Computer
            </h2>

            <form action="" method="post" enctype="multipart/form-data" id="js-upload-form">
    	       <div class="form-inline">
    		        <div class="form-group">
    	       		  <input type="file" name="files[]" id="js-upload-files" multiple>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary" id="js-upload-submit">Upload Files</button>
                </div>
            </form>

            <h2 class="content-row-title">Or drag and drop files below</h2>
            <div class="upload-drop-zone" id="drop-zone">
                Just drag and drop files here
            </div>

            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                   <span class="sr-only">60% Complete</span>
                </div>
            </div>


        </div><!--END OF CONTENT-->
    </div>
</div>