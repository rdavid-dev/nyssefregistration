
    <option value="" selected disabled>----Select School Name----</option>
    @foreach($school as $key=>$val)
    <option value="{{$val->id}}">{{$val->name}}-{{$val->city}}, {{$val->state}}</option>
    @endforeach
    <option value="" disabled>-------------------------</option>
    <option value="not">My school is not listed</option>