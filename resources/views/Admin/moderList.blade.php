@include('parts/head')
<div class="app">
    <main class="main-admin">
      @include('parts/admin/header') 
      <div class="table-ttl">Таблица участников</div> 
        <table>
            <thead style="text-align: center; font-size: 18px; color: white; background-color: #1e7e34;">
            <tr>
                <td>Имя куратора</td>
                <td>Название станции</td>
            </tr>
            <tbody style="text-align: center;">
            <?php $moders = \App\Moders::all() ?>
            @foreach( $moders as $moder)
                <tr>
                    <td><a href="/admin/moderInfo/{{$moder->id_user_moder}}">{{\App\User::where('id_user', $moder->id_user_moder)->value('name_user')}}</a></td>
                    <td>{{\App\Stations::where('id_station', $moder->id_station_moder)->value('name_station')}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </main>


  </div><!-- end app -->

@include('parts/foot')