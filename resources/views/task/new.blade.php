<form action="/api/tasks/" method="post">

    {{csrf_field()}}
    <input type="text" name="title" placeholder="TITLE">
    <input type="text" name="description" placeholder="DESCRIPTION">
    <select name="user_id" id="User Id">
        @foreach ($users as $user)
        <option value="{{$user->id}}" > {{$user->name}} </option>
        @endforeach
    </select>
    <input type="date" name="end_date" placeholder="End_date">
    <select name="status" id="STATUS">
        <option value="1">OPEN</option>
        <option value="0">CLOSED</option>
    </select>
    <input type="submit" value="OK!">
</form>