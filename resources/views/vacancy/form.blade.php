<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($vacancy->title) ? $vacancy->title : ''}}"  required>
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('details') ? 'has-error' : ''}}">
    <label for="details" class="control-label">{{ 'Details' }}</label>
    <textarea class="form-control" rows="15" name="description" type="textarea" id="details" required>{{ isset($vacancy->details) ? $vacancy->details : ''}} </textarea>
    {!! $errors->first('details', '<p class="help-block">:message</p>') !!}
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('end') ? 'has-error' : ''}}">
                <label for="end" class="control-label">{{ 'End Date' }}</label>
                <input class="form-control" name="end" type="date" id="end" value="{{ isset($vacancy->end) ? $vacancy->end : ''}}" >
                {!! $errors->first('end', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('cover') ? 'has-error' : ''}}">
            <label for="cover" class="control-label">{{ 'Cover Image' }}</label>
            <input class="form-control-file" name="cover" type="file" id="cover" value="{{ isset($vacancy->cover) ? $vacancy->cover : ''}}" >
            {!! $errors->first('cover', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>


<input type="hidden"  name="user_id" value="{{ Auth::user()->id }}" required>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
