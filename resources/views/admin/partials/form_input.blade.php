<label for="{{$name}}" class="text-black">{{$title}}</label>
<br>
<input id="{{$name}}" type="{{$type??'text'}}"
       class="form-control text-black @error($name) is-invalid @enderror" name="{{$name}}"
       value="{{ $value ?? old($name) }}" {{($required??true)?'required':''}} autocomplete="name" autofocus>

@error('name')
<br>
<span class="" role="alert">
                                        <p class="text-danger">{{ $message }}</p>
                                    </span>
@enderror

<br>
