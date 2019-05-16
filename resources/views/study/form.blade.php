<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($study->name) ? $study->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <textarea class="form-control" rows="5" name="description" type="textarea" id="description" >{{ isset($study->description) ? $study->description : ''}}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('cover') ? 'has-error' : ''}}">
    <label for="cover" class="control-label">{{ 'Cover' }}</label>
    <input class="form-control" name="cover" type="file" id="cover" value="{{ isset($study->cover) ? $study->cover : ''}}" >
    {!! $errors->first('cover', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
    <label for="photo" class="control-label">{{ 'Photo' }}</label>
    <input class="form-control" name="photo" type="file" id="photo" value="{{ isset($study->photo) ? $study->photo : ''}}" >
    {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('google') ? 'has-error' : ''}}">
    <label for="google" class="control-label">{{ 'Google' }}</label>
    <textarea class="form-control" rows="5" name="google" type="textarea" id="google" >{{ isset($study->google) ? $study->google : ''}}</textarea>
    {!! $errors->first('google', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($study->user_id) ? $study->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('document') ? 'has-error' : ''}}">
    <label for="document" class="control-label">{{ 'Document' }}</label>
    <input class="form-control" name="document" type="file" id="document" value="{{ isset($study->document) ? $study->document : ''}}" >
    {!! $errors->first('document', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
