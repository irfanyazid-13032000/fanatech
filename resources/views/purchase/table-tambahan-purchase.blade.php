<tr id="tr">
                                  <td>
                                    <select name="purchases[{{$i}}][inventory_id]" id="inventory_id{{$i}}" class="form-control">
                                      <option value="">pilih bahan dasar</option>
                                      @foreach ($inventories as $inventory)
                                      <option value="{{ $inventory->id }}">{{ $inventory->code }} - {{$inventory->name}}</option>
                                      @endforeach
                                    </select>
                                  </td>
                                  <td><input type="text" class="form-control" id="qty{{$i}}" name="purchases[{{$i}}][qty]"></td>
                                  <td><input type="number" class="form-control" name="purchases[{{$i}}][price]" id="price{{$i}}"></td>
                                  <td><span class="btn btn-danger delete-row">delete</span></td>
                                </tr>
                                
                               