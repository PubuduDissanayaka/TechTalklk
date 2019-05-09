<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($job->title) ? $job->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <textarea class="form-control" rows="5" name="description" type="textarea" id="description" >{{ isset($job->description) ? $job->description : ''}}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('jobrole') ? 'has-error' : ''}}">
    <label for="jobrole" class="control-label">{{ 'Jobrole' }}</label>
    <input class="form-control" name="jobrole" type="text" id="jobrole" value="{{ isset($job->jobrole) ? $job->jobrole : ''}}" >
    {!! $errors->first('jobrole', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
    <label for="category" class="control-label">{{ 'Category' }}</label>
    <select name="category" class="form-control" id="category" >
        <option value="1">one</option>
        <option value="2">two</option>
    {{-- @foreach (json_decode('{"technology": "Technology", "tips": "Tips", "health": "Health"} image', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($job->category) && $job->category == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach --}}
</select>
    {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
