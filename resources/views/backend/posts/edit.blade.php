@extends('admin.admin_master')
@section('title', 'Edit:: '.$post->title_en)
@section('admin')

@php
    $sub = DB::table('subcategories')->where('category_id', $post->category_id)->get();
    $subdist = DB::table('subdistricts')->where('district_id', $post->district_id)->get();
@endphp

<div class="content-wrapper bg-light">
    <div class="card">
        <div class="card-body">
          <h4 class="card-title">Edit Post</h4>
          <form class="forms-sample" action="{{route('update.post', $post->id)}}" method="post" enctype="multipart/form-data">
              @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="title_en">Title English</label>
                    <input type="text" class="form-control" id="title_en" name="title_en" value="{{ $post->title_en}}">
                </div>


            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option disabled selected>-- Select Category</option>
                        @foreach ($category as $row)
                            <option value="{{ $row->id }}"
                                <?php if($row->id == $post->category_id){
                                    echo "selected";
                                } ?>
                                >{{ $row->category_en }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="subcategory_id">Sub Category</label>
                    <select name="subcategory_id" id="subcategory_id" class="form-control">
                        <option value="" disabled selected> -- Select Subcategory </option>
                        @foreach ($sub as $row)
                            <option value="{{ $row->id }}"
                                <?php if($row->id == $post->subcategory_id){
                                    echo "selected";
                                } ?>
                                >{{ $row->subcategory_en }} </option>
                        @endforeach

                    </select>
                </div>

            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="district_id">District</label>
                    <select name="district_id" id="district_id" class="form-control">
                        <option disabled selected>-- select District</option>
                        @foreach ($district as $row)
                            <option value="{{ $row->id }}"
                                <?php if($row->id == $post->district_id){
                                    echo "selected";
                                }?>
                                >{{ $row->district_en }} </option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="subdistrict_id">Sub District</label>
                    <select name="subdistrict_id" id="subdistrict_id" class="form-control">
                        <option disabled selected>-- select Sub District</option>
                        @foreach ($subdist as $row)
                            <option value="{{ $row->id }}"
                                <?php if($row->id == $post->subdistrict_id){
                                    echo "selected";
                                }?>
                                >{{ $row->subdistrict_en }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="tags_en">New Image</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
                <div class="form-group col-md-6">
                    <label for="tags_hin">Old Image</label>
                    <img src="{{ URL::to($post->image) }}" width="200" alt="">
                    <input class="form-control" type="hidden" name="oldimage" value="{{ $post->image }}">
                </div>

            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="tags_en">Tags English</label>
                    <input type="text" class="form-control" id="tags_en" name="tags_en" value="{{ $post->tags_en }}">
                </div>

            </div>
            <div class="form-group">
                <label for="summernote">Details English</label>
                <textarea class="form-control" id="summernote" name="details_en" rows="4">
                    {{ $post->details_en }}
                </textarea>
            </div>
            
            <hr class="line" color="crimson">
            <h4>Extra Options</h4>
            <div class="row">
                <div class="form-check col-md-2">
                    <label class="form-check-label">
                    <input type="checkbox" name="headline" class="form-check-input" value="1"
                    <?php if($post->headline == 1){ echo "checked";}?>
                    > Headline </label>
                </div>
                <div class="form-check col-md-4">
                    <label class="form-check-label" for="bigthumbnail">
                    <input type="checkbox" name="bigthumbnail" id="bigthumbnail" class="form-check-input" value="1"
                    <?php if($post->bigthumbnail == 1){ echo "checked";}?>

                    > General Big Thumbnail </label>
                </div>
                <div class="form-check col-md-2">
                    <label class="form-check-label">
                    <input type="checkbox" name="first_section" class="form-check-input" value="1"
                    <?php if($post->first_section == 1){ echo "checked";}?>
                    > First Section </label>
                </div>
                <div class="form-check col-md-4">
                    <label class="form-check-label">
                    <input type="checkbox" name="first_section_thumbnail" class="form-check-input" value="1"
                    <?php if($post->first_section_thumbnail == 1){ echo "checked";}?>
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
