<h1>Create Activity</h1>

<form method="POST" action="/activities">

    @csrf

    <label>Title</label>
    <br>
    <input type="text" name="title">
    
    <br><br>

    <label>Description</label>
    <br>
    <textarea name="description"></textarea>

    <br><br>

    <button type="submit">
        Save Activity
    </button>

</form>