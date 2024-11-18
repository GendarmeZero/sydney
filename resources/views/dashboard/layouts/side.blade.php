<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" data-bg-class="bg-menu-theme">
    <div class="app-brand demo">
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
            <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
        </a>
    </div>

    <div class="menu-inner-shadow" style="display: block;"></div>

    <ul class="menu-inner py-1 ps">
        <!-- Home Section (Now styled like other sections) -->
        <li class="menu-item ">
            <a href="{{route('dashboard')}}" class="menu-link">
                <i class="menu-icon fa fa-home"></i> <!-- FontAwesome Home Icon -->
                <div class="text-truncate">Home</div> <!-- Just the text, no badge -->
            </a>
        </li>

        <!-- Events and Notes Section -->
        <li class="menu-header small text-uppercase section-title">
            <span class="menu-header-text">Events and Notes</span>
        </li>

        <li class="menu-item">
            <a href="{{ route('events.index') }}" class="menu-link">
                <i class="menu-icon fa fa-calendar-alt"></i> <!-- FontAwesome Calendar Icon -->
                <div class="text-truncate">Events</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="" class="menu-link">
                <i class="menu-icon fa fa-sticky-note"></i> <!-- FontAwesome Sticky Note Icon -->
                <div class="text-truncate">Notes</div>
            </a>
        </li>

        <!-- Employees Section -->
        <li class="menu-header small text-uppercase section-title">
            <span class="menu-header-text">Employees</span>
        </li>

        <li class="menu-item">
            <a href="{{route('dashboard.employees')}}" class="menu-link">
                <i class="menu-icon fa fa-users"></i> <!-- FontAwesome Users Icon -->
                <div class="text-truncate">Employees</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('resumes.index') }}" class="menu-link">
                <i class="menu-icon fa fa-file-alt"></i> <!-- FontAwesome File Icon -->
                <div class="text-truncate">Resumes</div>
            </a>
        </li>

        <!-- Components Section -->
        <li class="menu-header small text-uppercase section-title">
            <span class="menu-header-text">Components</span>
        </li>

        <li class="menu-item">
            <a href="icons-boxicons.html" class="menu-link">
                <i class="menu-icon fa fa-cogs"></i> <!-- FontAwesome Cogs Icon -->
                <div class="text-truncate">Boxicons</div>
            </a>
        </li>
    </ul>
</aside>
