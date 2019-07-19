<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
// As we aren’t using Laravel auth, we return true in the function callback 
// so that everybody can use this channel to broadcast events.
Broadcast::channel('newTask', function(){
    return true;
});
Broadcast::channel('taskRemoved', function(){
    return true;
});