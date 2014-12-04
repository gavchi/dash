<!-- begin dashboard-item  -->
<div class="dashboard-item">
    <a class="dashboard-item__more jsDashboard"></a>
    <div class="dashboard-item__inner">
        <div class="dashboard-item__pic dashboard-item__pic-depth"></div>
        <div class="dashboard-item__title">{{$data['pageDepth']}} страниц</div>
        <div class="dashboard-item__desc">Cреднее количество страниц за сеанс</div>
        <div class="dashboard-item-full">
            <a class="dashboard-item-full__close jsDashboardClose"></a>
            <!-- begin dashboard-item-full__content  -->
            <div class="dashboard-item-full__content">
            <table class="topPageData">
            <thead>
            <tr>
                <td class="pageElement"><b>Страница</b></td>
                <td class="dataElement"><b>Просмотры</b></td>
            </tr>
            </thead>
            <tbody>
            @foreach($data['TopPageByDate'] as $page)
            <tr>
                <td class="pageElement">{{$page[0]}}</td>
                <td class="dataElement"><b>{{$page[1]}}</b> ({{$page[2]}} %)</td>
            </tr>
            @endforeach
            </tbody>
            </table>
            </div>
            <!-- end dashboard-item-full__content -->
        </div>
    </div>
</div>
<!-- end dashboard-item -->