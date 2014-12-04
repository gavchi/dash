<!-- begin dashboard-item  -->
<div class="dashboard-item">
    @if('full' == $widgetType)
    <a class="dashboard-item__more jsDashboard"></a>
    @endif
    <div class="dashboard-item__inner">
        <div class="dashboard-item__pic dashboard-item__pic-visits"></div>
        <div class="dashboard-item__title">{{$Visitors24}} человек</div>
        <div class="dashboard-item__desc">Число посетителей за&nbsp;последние 24 часа</div>
        <div class="dashboard-item-full">
            <a class="dashboard-item-full__close jsDashboardClose"></a>
            <!-- begin dashboard-item-full__content  -->
            <div class="dashboard-item-full__content">
                <div class="dashboard-chart__wrap">
                </div>
            </div>
            <!-- end dashboard-item-full__content -->
        </div>
    </div>
</div>
<!-- end dashboard-item -->