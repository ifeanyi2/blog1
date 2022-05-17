@extends('admin.admin_master')
@section('title', 'Edit: '.$editvideos->title)
@section('admin')

@php
    $sub = DB::table('subcategories')->where('category_id', $editvideos->category_id)->get();
    $subdist = DB::table('subdistricts')->where('district_id', $editvideos->district_id)->get();
@endphp

<div class="content-wrapper bg-light">
    <div class="card">
        <div class="card-body">
          <h4 class="card-title">Edit Video Post</h4>
          <form class="forms-sample" action="{{ route('update.videos', $editvideos->id) }}" method="post" enctype="multipart/form-data">
              @csrf
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $editvideos->title}}">
                      @error('title')
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
                            <option value="{{ $row->id }}"
                                <?php if($row->id == $editvideos->category_id){
                                    echo "selected";
                                } ?>
                                >{{ $row->category_en }}</option>
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
                        @foreach ($sub as $row)
                            <option value="{{ $row->id }}"
                                <?php if($row->id == $editvideos->subcategory_id){
                                    echo "selected";
                                } ?>
                                >{{ $row->subcategory_en }}</option>
                        @endforeach

                    </select>
                      @error('subcategory_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>

            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="district_id">District</label>
                    <select name="district_id" id="district_id" class="form-control">
                        <option disabled selected>-- select District</option>
                        @foreach ($district as $row)
                            <option value="{{ $row->id }}"
                                <?php if($row->id == $editvideos->district_id){
                                    echo "selected";
                                }?>
                                >{{ $row->district_en }}</option>
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
                        @foreach ($subdist as $row)
                            <option value="{{ $row->id }}"
                                <?php if($row->id == $editvideos->subdistrict_id){
                                    echo "selected";
                                }?>
                                >{{ $row->subdistrict_en }}</option>
                        @endforeach
                    </select>
                      @error('subdistrict-ID')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="tags_en">New Video</label>
                    <input class="form-control" type="file" id="video" name="video">
                      @error('video')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="tags_hin">Old Video</label><br>
                    <a href="{{ asset($editvideos->video) }}" data-lity>
                      <video src="{{ URL::to($editvideos->video) }}" width="100"></video>
                    </a>
                    <input class="form-control" type="hidden" name="oldvideo" value="{{ $editvideos->video }}">
                </div>

            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="tags_en"> Add New Thumbnail</label>
                    <input class="form-control" accept="image/*" type="file" id="thumbnail" name="thumbnail">
                      @error('thumbnail')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="">Old Thumbnail</label><br>
                    <a href="{{ asset($editvideos->thumbnail) }}" data-lity>
                      <img src="{{ URL::to($editvideos->thumbnail) }}" width="100" alt="">
                    </a>
                    <input class="form-control" type="hidden" name="oldthumbnail" value="{{ $editvideos->thumbnail }}">
                </div>

            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="tags_en">Tags</label>
                    <input type="text" class="form-control" id="tags_en" name="tags_en" value="{{ $editvideos->tags_en }}">
                      @error('tags_en')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>


            </div>
            <div class="form-group">
                <label for="summernote">Details</label>
                <textarea class="form-control" id="summernote" name="description_en" rows="4">
                    {{ $editvideos->description_en }}
                </textarea>
                @error('description_en')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <hr class="line" color="crimson">
            <h4>Extra Options</h4>
            <div class="row">
                <div class="form-check col-md-2">
                    <label class="form-check-label">
                    <input type="checkbox" name="headline" class="form-check-input" value="1"
                    <?php if($editvideos->headline == 1){ echo "checked";}?>
                    > Headline </label>
                </div>
                <div class="form-check col-md-4">
                    <label class="form-check-label" for="bigthumbnail">
                    <input type="checkbox" name="bigthumbnail" id="bigthumbnail" class="form-check-input" value="1"
                    <?php if($editvideos->bigthumbnail == 1){ echo "checked";}?>

                    > General Big Thumbnail </label>
                </div>
                <div class="form-check col-md-2">
                    <label class="form-check-label">
                    <input type="checkbox" name="first_section" class="form-check-input" value="1"
                    <?php if($editvideos->first_section == 1){ echo "checked";}?>
                    > First Section </label>
                </div>
                <div class="form-check col-md-4">
                    <label class="form-check-label">
                    <input type="checkbox" name="first_section_thumbnail" class="form-check-input" value="1"
                    <?php if($editvideos->first_section_thumbnail == 1){ echo "checked";}?>
                    > First Section Thumbnail </label>
                </div>
            </div>
            <br><br>
            <button type="submit" class="btn  btn-outline-info mr-2">Update</button>

          </form>
        </div>
      </div>
</div>
@endsection
