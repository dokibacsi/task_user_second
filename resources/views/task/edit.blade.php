<form action="/api/tasks/{{$task->id}}" method="post">

    {{csrf_field()}}
    {{method_field('PUT')}}
    <input type="text" name="title" placeholder="TITLE">
    <input type="text" name="description" placeholder="DESCRIPTION">
    <select name="user_id" id="User Id">
        @foreach ($users as $user)
        <option value="{{$user->id}}"
            {{$user->id == $task->user_id ? 'selected' : ''}} > {{$user->name}}
        </option>
        @endforeach
    </select>
    <input type="date" name="end_date" placeholder="End_date">
    <select name="status" id="STATUS">
        <option value="1" <?php echo $task->status == 1 ? 'selected' : '' ?>>
            Open
        </option>
        <option value="0" <?php echo $task->status == 0 ? 'selected' : '' ?>>
            Closed</option>
    </select>
    <input type="submit" value="OK!">
</form>