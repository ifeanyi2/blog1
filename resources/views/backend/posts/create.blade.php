@extends('admin.admin_master')
@section('title', 'Create Beautiful Articles')
@section('admin')

<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
          <h4 class="card-title">Create Post</h4>
          <form class="forms-sample" action="{{route('store.post')}}" method="post" enctype="multipart/form-data">
              @csrf
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="title_en">Title English</label>
                    <input type="text" class="form-control" id="title_en" name="title_en">
                      @error('title_en')
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>


            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option disabled selected>-- Select Category</option>
                        @foreach ($category as $row)
                            <option value="{{ $row->id }}">{{ $row->category_en }} </option>
                        @endforeach

                    </select>
                       @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="subcategory_id">Sub Category</label>
                    <select name="subcategory_id" id="subcategory_id" class="form-control">
                        <option value="" disabled selected> -- Select Subcategory </option>

                    </select>
                </div>

            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="district_id">District</label>
                    <select name="district_id" id="district_id" class="form-control">
                        <option disabled selected>-- select District</option>
                        @foreach ($district as $row)
                            <option value="{{ $row->id }}">{{ $row->district_en }} || {{ $row->district_hin }}</option>
                        @endforeach

                    </select>
                       @error('district_id')
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="subdistrict_id">Sub District</label>
                    <select name="subdistrict_id" id="subdistrict_id" class="form-control">
                        <option disabled selected>-- select Sub District</option>
                    </select>
                </div>
            </div>

              <div class="mb-3">
                  <label for="formFile" class="form-label">Add Media</label>
                  <input class="form-control" type="file" id="image" name="image">
                     @error('image')
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
              </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="tags_en">Tags English</label>
                    <input type="text" class="form-control" id="tags_en" name="tags_en">
                       @error('tags_en')
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>


            </div>
            <div class="form-group">
                <label for="summernote">Details English</label>
                <textarea class="form-control" id="summernote" name="details_en" rows="4"></textarea>
                   @error('details_en')
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
            </div>

            <hr class="line" color="crimson">
            <h4>Extra Options</h4>
            <div class="row">
                <div class="form-check col-md-2">
                    <label class="form-check-label">
                    <input type="checkbox" name="headline" class="form-check-input" value="1"> Headline </label>
                </div>
                <div class="form-check col-md-4">
                    <label class="form-check-label" for="bigthumbnail">
                    <input type="checkbox" name="bigthumbnail" id="bigthumbnail" class="form-check-input" value="1"> General Big Thumbnail </label>
                </div>
                <div class="form-check col-md-2">
                    <label class="form-check-label">
                    <input type="checkbox" name="first_section" class="form-check-input" value="1"> First Section </label>
                </div>
                <div class="form-check col-md-4">
                    <label class="form-check-label">
                    <input type="checkbox" name="first_section_thumbnail" class="form-check-input" value="1"> First Section Thumbnail </label>
                </div>
            </div>
            <br><br>
            <button type="submit" class="btn  btn-outline-primary mr-2">Submit</button>

          </form>
        </div>
      </div>
</div>
{{-- this is for category --}}
<script type="text/javascript">
    $(document).ready(function() {
          $('select[name="category_id"]').on('change', function(){
              var category_id = $(this).val();
              if(category_id) {
                  $.ajax({
                      url: "{{  url('/get/subcategory/') }}/"+category_id,
                      type:"GET",
                      dataType:"json",
                      success:function(data) {
                         $("#subcategory_id").empty();
                               $.each(data,function(key,value){
                                   $("#subcategory_id").append('<option value="'+value.id+'">'+value.subcategory_en+'</option>');
                               });
                      },

                  });
              } else {
                  alert('danger');
              }
          });
      });
 </script>
{{-- this is for category --}}
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="district_id"]').on('change', function(){
            const district_id = $(this).val();
            if(district_id) {
                $.ajax({
                    url: "{{  url('/get/subdistrict/') }}/"+district_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        $("#subdistrict_id").empty();
                        $.each(data,function(key,value){
                            $("#subdistrict_id").append('<option value="'+value.id+'">'+value.subdistrict_en+'</option>');
                        });
                    },

                });
            } else {
                alert('danger');
            }
        });
    });
</script>
@endsection
