<div class="form-group">
    <label for="">Category Name</label>
    <input type="text" class="form-control" name="name" id="" value="{{ $category->name }}">
</div>
<div class="form-group">
    <label for="">Parent Category</label>
    <select name="parent_id" id="" class="form-control">
        <option value="">No Parent</option>
        @foreach($parents as $parent)
        <option value="{{ $parent->id }}" @if($parent->id == $category->parent_id) selected @endif>{{ $parent->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="">Category Description</label>
    <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $category->description }}</textarea>
</div>
<div class="form-group">
    <label for="">Upload Image</label>
    <input type="file" class="form-control" name="image_url" id="">
</div>
<div class="form-group">
    <label for="prodect-status">Product Status</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="status" value="status" id="flexRadioDefault1" @if($category->status == 'active') checked @endif>
        <label class="form-check-label" for="flexRadioDefault1">
            Active
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="status" value="draft" id="flexRadioDefault2" @if($category->status == 'draft') checked @endif>
        <label class="form-check-label" for="flexRadioDefault2">
            Draft
        </label>
    </div>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $button }} Product</button>
</div>