<!-- Sidebar menu starts here -->
<ul class="sidebar-menu">

    <li class="{{ Request::is('home') ? 'active' : ''}}"><a href="{{ URL::to('/home') }}"><i class='fa fa-dashboard'></i><span>Home</span></a></li>

    <li class="header">Modules</li>

    <li class="{{ Request::is('authentication') ? 'active' : ''}}"><a href="{{ URL::to('/authentication') }}"><i class='fa fa-key'></i><span> Authentication Logs</span></a></li>
    <li class="{{ Request::is('security') ? 'active' : ''}}"><a href="{{ URL::to('/security') }}"><i class='fa fa-user-secret'></i><span> Security Logs</span></a></li>
    <li class="{{ Request::is('nids') ? 'active' : ''}}"><a href="{{ URL::to('/nids') }}"><i class='fa fa-cogs'></i><span> NIDS Logs</span></a></li>
    <li class="{{ Request::is('usblogs') ? 'active' : ''}}"><a href="{{ URL::to('/usblogs') }}"><i class='fa fa-usb'></i><span> USB Logs</span></a></li>
    <li class="{{ Request::is('changelogs') ? 'active' : ''}}"><a href="{{ URL::to('/changelogs') }}"><i class='fa fa-file-o'></i><span> Change Logs</span></a></li>
    <li class="{{ Request::is('vpnlogs') ? 'active' : ''}}"><a href="{{ URL::to('/vpnlogs') }}"><i class='fa fa-cubes'></i><span> VPN Logs</span></a></li>

</ul>
<!-- Sidebar menu ends here -->
