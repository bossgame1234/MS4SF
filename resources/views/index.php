<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Farm management </title>
</head>
<body>
<h1>FARM</h1>
<!-- POST quote -->
<section>
    <p>POST farm/</p>
    <form action="farm" method="POST">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <div>
            <label for="name">Name: </label>
            <input type="text" id="name" name="name" />
        </div>
        <div>
            <label for="latitude">Latitude: </label>
            <input type="text" id="latitude" name="latitude" />
        </div>
        <div>
            <label for="longitude">Longitude: </label>
            <input type="text" id="longitude" name="longitude" />
        </div>
        <div>
            <label for="address">Address: </label>
            <input type="text" id="address" name="address" />
        </div>
        <div>
            <label for="description">Description: </label>
            <input type="text" id="description" name="description" />
        </div>
        <button type="submit">Submit</button>
    </form>
</section>
<!-- GET quote -->
<section>
    <p>GET quote/</p>
    <a href="farm">get a list of farms</a>
</section>
<!-- GET quote/:id -->
<section>
    <p>GET quote/1</p>
    <a href="farm/1">get farm with id = 1</a>
</section>
</body>
</html>