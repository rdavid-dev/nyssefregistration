
    <option value="" selected disabled>----Select School Type----</option>
    @foreach($school_type as $key=>$value)
    <option value="{{$value->id}}">{{$value->type}}</option>
    @endforeach