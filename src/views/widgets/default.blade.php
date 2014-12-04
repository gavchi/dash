<!-- begin dashboard-item  -->
<div class="dashboard-item">
    @if('full' == $widgetType)
    <a class="dashboard-item__more jsDashboard"></a>
    @endif
    <div class="dashboard-item__inner">
        <div class="dashboard-item__pic dashboard-item__pic-views"></div>
        <div class="dashboard-item__title">
        @if(isset($header))
        {{$header}}
        @endif
        </div>
        <div class="dashboard-item__desc">
        @if(isset($description))
        {{$description}}
        @endif
        </div>
        <div class="dashboard-item-full">
            <a class="dashboard-item-full__close jsDashboardClose"></a>
            <!-- begin dashboard-item-full__content  -->
            <div class="dashboard-item-full__content">
             @if(isset($content))
             {{$content}}
             @endif
            </div>
            <!-- end dashboard-item-full__content -->
        </div>
    </div>
</div>
<!-- end dashboard-item -->