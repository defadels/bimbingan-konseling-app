<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{route('siswa.dashboard')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                            class="hide-menu">Dashboard</span></a></li>
                
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span
                            class="hide-menu">Bimbingan & Konseling </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{route('siswa.bimbingan.pribadi')}}" class="sidebar-link"><i
                                    class="mdi mdi-account"></i><span class="hide-menu"> Konseling Pribadi
                                </span></a></li>
                        <li class="sidebar-item"><a href="{{route('siswa.bimbingan.kelompok')}}" class="sidebar-link"><i
                                    class="mdi mdi-account-multiple"></i><span class="hide-menu"> Konseling Kelompok
                                </span></a></li>
                        <li class="sidebar-item"><a href="{{route('siswa.bimbingan.karir')}}" class="sidebar-link"><i
                                    class="mdi mdi-worker"></i><span class="hide-menu"> Bimbingan Konseling Karir
                                </span></a></li>
                        <li class="sidebar-item"><a href="{{route('siswa.bimbingan.konseling.kelompok')}}" class="sidebar-link"><i
                                    class="mdi mdi-note-plus"></i><span class="hide-menu"> Bimbingan Konseling Kelompok
                                </span></a></li>
                    </ul>
                </li>
    
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>