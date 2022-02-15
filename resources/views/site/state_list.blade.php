
    <option value="" selected disabled>----Select State----</option>
    @foreach($state as $key=>$val)
    <option value="{{$val->code}}">{{$val->name}}</option>
    @endforeach