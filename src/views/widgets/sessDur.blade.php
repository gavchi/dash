<!-- begin dashboard-item  -->
<div class="dashboard-item">
    <a class="dashboard-item__more jsDashboard"></a>
    <a class="dashboard-item__more jsDashboard"></a>
    <div class="dashboard-item__inner">
        <div class="dashboard-item__pic dashboard-item__pic-time"></div>
        <div class="dashboard-item__title">{{$data['sessDur']}} минуты</div>
        <div class="dashboard-item__desc">Среднее время проведенное на&nbsp;сайте</div>
        <div class="dashboard-item-full">
            <a class="dashboard-item-full__close jsDashboardClose"></a>
            <!-- begin dashboard-item-full__content  -->
            <div class="dashboard-item-full__content">
                <div class="dashboard-chart__wrap">
                    <div class="dashboard-chart__full jsChartSessionDurationMonth"></div>
                    <div class="dashboard-chart__date jsChartSessionDurationMonthDate"></div>
                    <div class="dashboard-chart__x-title jsChartSessionDurationMonthXTitle"></div>
                </div>
            </div>
            <!-- end dashboard-item-full__content -->
        </div>
    </div>
</div>
<!-- end dashboard-item -->