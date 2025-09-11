<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('Cambodian_Red_Cross_Logo.png') }}" alt="LuyTopia Logo" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-light">CRC PMIS</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item" id="dashboard">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            ទំព័រដើម
                        </p>
                    </a>
                </li>
                @if (Auth::user()->hasRole('System Manager'))
                    <li class="nav-item" id="branch">
                        <a href="{{ route('branch.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-university"></i>
                            <p>
                                សាខា
                            </p>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->hasRole('Branch System Operator'))
                    <li class="nav-item" id="sub-branch">
                        <a href="{{ route('sub-branch.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-university"></i>
                            <p>
                                អនុសាខា
                            </p>
                        </a>
                    </li>
                @endif
                <li class="nav-item" id="honorary-committee">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-star"></i>
                        <p>
                            គណ:កិត្តិយស
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item" id="honorary-committee-member-list">
                            <a href="{{ route('honorary-committee-member.index') }}" class="nav-link">
                                <i class="fas fa-angle-double-right nav-icon"></i>
                                <p>តារាងសមាជិក</p>
                            </a>
                        </li>
                        <li class="nav-item" id="honorary-committee-member-create">
                            <a href="{{ route('honorary-committee-member.create') }}" class="nav-link">
                                <i class="fas fa-angle-double-right nav-icon"></i>
                                <p>បង្កើតសមាជិក</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item" id="committee">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-star"></i>
                        <p>
                            គណ:កម្មាធិការ
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item" id="committee-member-list">
                            <a href="{{ route('committee-member.index') }}" class="nav-link">
                                <i class="fas fa-angle-double-right nav-icon"></i>
                                <p>តារាងសមាជិក</p>
                            </a>
                        </li>
                        <li class="nav-item" id="committee-member-create">
                            <a href="{{ route('committee-member.create') }}" class="nav-link">
                                <i class="fas fa-angle-double-right nav-icon"></i>
                                <p>បង្កើតសមាជិក</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @if (Auth::user()->hasPermissionTo('employee_management'))
                    <li class="nav-item" id="employee">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                មន្ត្រីប្រតិបត្តិ
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item" id="employee-list">
                                <a href="{{ route('employee.index') }}" class="nav-link">
                                    <i class="fas fa-angle-double-right nav-icon"></i>
                                    <p>បញ្ជីមន្ត្រីប្រតិបត្តិ</p>
                                </a>
                            </li>
                            <li class="nav-item" id="employee-create">
                                <a href="{{ route('employee.create') }}" class="nav-link">
                                    <i class="fas fa-angle-double-right nav-icon"></i>
                                    <p>បង្កើតមន្ត្រីប្រតិបត្តិ</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->user_level_id == 1)
                    @if (Auth::user()->hasPermissionTo('security_management'))
                        <li class="nav-item" id="security">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-lock"></i>
                                <p>
                                    សុវត្ថិភាព
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @if (Auth::user()->hasPermissionTo('user_management'))
                                    <li class="nav-item" id="user">
                                        <a href="{{ route('user.index') }}" class="nav-link">
                                            <i class="fas fa-angle-double-right nav-icon"></i>
                                            <p>អ្នកប្រើប្រាស់</p>
                                        </a>
                                    </li>
                                @endif
                                @if (Auth::user()->hasPermissionTo('role_management'))
                                    <li class="nav-item" id="role">
                                        <a href="{{ route('role.index') }}" class="nav-link">
                                            <i class="fas fa-angle-double-right nav-icon"></i>
                                            <p>តួនាទី</p>
                                        </a>
                                    </li>
                                @endif
                                @if (Auth::user()->hasPermissionTo('permission_management'))
                                    <li class="nav-item" id="permission">
                                        <a href="{{ route('permission.index') }}" class="nav-link">
                                            <i class="fas fa-angle-double-right nav-icon"></i>
                                            <p>មុខងារប្រព័ន្ធ</p>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                    @if (Auth::user()->hasPermissionTo('setting_management'))
                        <li class="nav-item" id="setting">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-cog"></i>
                                <p>
                                    ការកំណត់
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @if (Auth::user()->hasPermissionTo('department_management'))
                                    <li class="nav-item" id="department">
                                        <a href="{{ route('department.index') }}" class="nav-link">
                                            <i class="fas fa-angle-double-right nav-icon"></i>
                                            <p>នាយកដ្ឋាន</p>
                                        </a>
                                    </li>
                                @endif
                                <li class="nav-item" id="branch">
                                    <a href="{{ route('branch.index') }}" class="nav-link">
                                        <i class="fas fa-angle-double-right nav-icon"></i>
                                        <p>សាខា</p>
                                    </a>
                                </li>
                                {{-- <li class="nav-item" id="committee">
                                    <a href="{{ route('committee.index') }}" class="nav-link">
                                        <i class="fas fa-angle-double-right nav-icon"></i>
                                        <p>គណៈកម្មាធិការ</p>
                                    </a>
                                </li> --}}
                                <li class="nav-item" id="term">
                                    <a href="{{ route('term.index') }}" class="nav-link">
                                        <i class="fas fa-angle-double-right nav-icon"></i>
                                        <p>អាណត្តិ</p>
                                    </a>
                                </li>
                                @if (Auth::user()->hasPermissionTo('province_management'))
                                    <li class="nav-item" id="province">
                                        <a href="{{ route('province.index') }}" class="nav-link">
                                            <i class="fas fa-angle-double-right nav-icon"></i>
                                            <p>រាជធានី/ខេត្ត</p>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                @endif
                @if (Auth::user()->hasPermissionTo('hq_report'))
                    <li class="nav-item" id="hq-report">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-line"></i>
                            <p>
                                របាយការណ៍កណ្តាល
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item" id="department">
                                <a href="{{ route('department.index') }}" class="nav-link">
                                    <i class="fas fa-angle-double-right nav-icon"></i>
                                    <p>នាយកដ្ឋាន</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->hasPermissionTo('branch_report'))
                    <li class="nav-item" id="branch-report">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-line"></i>
                            <p>
                                របាយការណ៍សាខា
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item" id="department">
                                <a href="{{ route('department.index') }}" class="nav-link">
                                    <i class="fas fa-angle-double-right nav-icon"></i>
                                    <p>នាយកដ្ឋាន</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->hasPermissionTo('sub_branch_report'))
                    <li class="nav-item" id="sub-branch-report">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-line"></i>
                            <p>
                                របាយការណ៍អនុសាខា
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item" id="department">
                                <a href="{{ route('department.index') }}" class="nav-link">
                                    <i class="fas fa-angle-double-right nav-icon"></i>
                                    <p>នាយកដ្ឋាន</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
