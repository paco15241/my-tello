<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($card->name) ? $card->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('card_list_id') ? 'has-error' : ''}}">
    <label for="card_list_id" class="control-label">{{ 'Card List Id' }}</label>
    <input class="form-control" name="card_list_id" type="number" id="card_list_id" value="{{ isset($card->card_list_id) ? $card->card_list_id : ''}}" >
    {!! $errors->first('card_list_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('position') ? 'has-error' : ''}}">
    <label for="position" class="control-label">{{ 'Position' }}</label>
    <input class="form-control" name="position" type="number" id="position" value="{{ isset($card->position) ? $card->position : ''}}" >
    {!! $errors->first('position', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
