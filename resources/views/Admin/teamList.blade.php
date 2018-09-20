@include('parts/head')
<div class="app">
    <main class="main-admin">
      @include('parts/admin/header') 
      <div class="table-ttl">Таблица участников</div> 
        <table>
            <thead style="text-align: center; font-size: 18px; color: white; background-color: #cc2255;">
            <tr>
                <td>Название команды</td>
                <td>Капитан команды</td>
            </tr>
            <tbody style="text-align: center;">
            <?php $teams = \App\Commands::all() ?>
            @foreach( $teams as $team)
                <tr>
                    <td><a href="/admin/commandInfo/{{$team->id_com}}">{{$team->name_com}}</a></td>
                    <td>{{\App\User::where('id_user', $team->cap_com)->value('name_user')}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </main>


  </div><!-- end app -->
@include('parts/foot')