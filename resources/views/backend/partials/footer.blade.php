<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        Powered by <a href="{{ getenv('POWERED_BY_URL') }}" target="_blank"><img src="{{ getenv('POWERED_BY_BADGE_IMAGE') }}" style="height: 19px;vertical-align: top;" /></a>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy <?= date('Y');?> <a href="#">{{ getenv('SITE_NAME') }}</a>.</strong> All rights reserved.
</footer>