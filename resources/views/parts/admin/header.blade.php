<div class="admin-hello">Привет, {{\App\User::where('id_user', Auth::id())->value('name_user')}}!</div> 
<div class="admin-status">Вы - админ</div>