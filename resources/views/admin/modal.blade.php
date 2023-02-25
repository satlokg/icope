{{-- module --}}
<div class="modal fade add-module" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="card">
            <div class="card-body">
              <h4 class="card-title">Add New Module</h4>
              {{-- <p class="card-description">
                Basic form layout
              </p> --}}
              <form class="forms-sample" id="add-module">
                @csrf
                <input type="hidden" name="id" value="">
                <div class="form-group">
                  <label for="exampleInputitle">Title</label>
                  <p id="titleErr" class="text-danger"></p>
                  <input type="text" class="form-control" id="exampleInputitle" placeholder="Title" name="title">
                </div>
                <div class="form-group">
                  <label for="Description">Short Description</label>
                  <p id="descErr" class="text-danger"></p>
                  <input type="text" class="form-control" id="Description" placeholder="Short Description" name="description">
                </div>

                <div class="form-group">
                    <label for="vdo_link">Video Link</label>
                    <input type="text" class="form-control" id="vdo_link" placeholder="Vedio Link" name="vdo_link">
                    <small>For multiple link use (,) for separate</small>
                </div>
                <div class="form-group">
                <label for="presentation">Presentation link</label>
                <input type="text" class="form-control" id="presentation" placeholder="Presentation link" name="presentation_link">
                <small>For multiple link use (,) for separate</small>
                </div>
                <div class="form-group">
                  <label for="presentation">Presentation link</label>
                  <input type="number" class="form-control" name="sequences">
                  <small>Use number for list sequences</small>
                  </div>
                <div class="form-group">
                    <label for="presentation">Html Page</label>
                    <input type="file" class="form-control" name="file">
                </div>
                {{-- <div class="form-group">
                <label for="presentation">Detail</label>
                <p id="detailErr" class="text-danger"></p>
                <textarea id="summernote" name="detail" id="detail" rows="100"></textarea>
                </div> --}}
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>
{{-- assessment --}}
<div class="modal fade assessment" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="card">
            <div class="card-body">
              <h4 class="card-title">Assessment</h4>
              <div class="col-lg-12">
                <div class="row">
                    <div class="text-right align-items-center justify-content-end mt-10">
                        <a class="btn btn-sm btn-info" href="#" onclick="addAssessment();">Add Question</a>
                        {{-- <a class="btn btn-sm btn-info" href="#" onclick="addModule();">List</a> --}}

                    </div>
                </div>
              </div>
              <div class="col-lg-12">
                    <table class="table table-striped table-bordered" id="assessment">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Options</th>
                                <th class="dt-control" style="width: 200px !important ">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
              </div>
            </div>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
  </div>
{{--add assessment --}}
<div class="modal fade add-assessment" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="card">
            <div class="card-body">
              <h4 class="card-title">Add Assessment</h4>
                <form class="forms-sample" id="add-assessment">
                    @csrf
                    <input type="hidden" id="ass_id" name="id" value="0">
                    <input type="hidden" id="module_id" name="module_id" value="0">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="assTitle">Assessment Title</label>
                        <p class="asstitleErr"></p>
                        <input type="text" class="form-control" id="assTitle" placeholder="Assessment Title" name="title">
                    </div>
                    <div class="form-group">
                      <label for="assTitle">Sequence</label>
                      <p class="asstitleErr"></p>
                      <input type="number" class="form-control" name="sequences">
                  </div>
                </div>
                <div class="col-lg-12">
                    <fieldset class="scheduler-border">
						<legend class="scheduler-border">Options</legend>
                        <div id="addMoreAss">
                          <div class="row optAss" style="margin-bottom: 10px">
							<div class="col-lg-10">
								<input id="propertytype_other" name="options[0][option]" type="text" placeholder="option 1" value="" class="form-control">
                            </div>
                            <div class="col-lg-2">
							    <input type="checkbox" id="fmane" value="yes" name="options[0][correct]" class="aopt">
							</div>
                          </div>
                          <div class="row optAss" style="margin-bottom: 10px">
							<div class="col-lg-10">
								<input id="propertytype_other" name="options[1][option]" type="text" value="" placeholder="option 2" class="form-control">
                            </div>
                            <div class="col-lg-2">
							    <input type="checkbox" id="fmane" value="yes" name="options[1][correct]" class="aopt">
							</div>
                          </div>
                        </div>
                          <button type="button" class="btn btn-sm btn-success" onclick="$(this).addMore()">Add More</button>
                          <button type="button" class="btn btn-sm btn-danger" onclick="$(this).removeLast()">Remove Last</button>
					</fieldset>


                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>
{{-- upload --}}
<div class="modal fade uploadImages" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="card">
            <div class="card-body">
              <h4 class="card-title">upload Images</h4>
              <div class="col-lg-12">
                <form id="uploadform" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-3"><h4>Select Images</h4></div>
                        <div class="col-md-6">
                            <input type="file" name="file[]" id="file" accept="image/*" multiple />
                        </div>
                        <div class="col-md-3">
                            <input type="submit" name="upload" value="Upload" class="btn btn-success" />
                        </div>
                    </div>
                </form>
                <br />
                <div class="progress">
                    <div class="progress-bar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                        0%
                    </div>
                </div>
                <br />
                <div id="success" class="row">

                </div>
              </div>
            </div>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
  </div>
{{--add assessment --}}
