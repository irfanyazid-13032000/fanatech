<label for="approver" class="form-label">Approver {{$i+1}}</label>
<select class="form-select" name="approver[]" aria-label="approver" value="{{ old('approver') }}" required>
  <option value="0">pilih</option>
  <option value="1">1</option>
  <option value="2">2</option>
</select>
@error('approver')
 <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
@enderror