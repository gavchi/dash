<!-- begin dashboard-item  -->
<div class="dashboard-item">
    <a class="dashboard-item__more jsDashboard"></a>
    <div class="dashboard-item__inner">
        <div class="dashboard-item__pic dashboard-item__pic-views"></div>
        <div class="dashboard-item__title">{{$data['allUsers']}} визитов</div>
        <div class="dashboard-item__desc">График посещаемости сайта</div>
        <div class="dashboard-item-full">
            <a class="dashboard-item-full__close jsDashboardClose"></a>
            <!-- begin dashboard-item-full__content  -->
            <div class="dashboard-item-full__content">
                <div class="dashboard-chart__wrap">
                    <div class="dashboard-chart__full jsChartVisitsMonth"></div>
                    <div class="dashboard-chart__date jsChartVisitsMonthDate"></div>
                    <div class="dashboard-chart__x-title jsChartVisitsMonthXTitle"></div>
                </div>
            </div>
            <!-- end dashboard-item-full__content -->
        </div>
    </div>
</div>
<!-- end dashboard-item -->