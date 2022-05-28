@php

use App\LayananBK;

$konseling_pribadi = LayananBK::where('dibuat_oleh_id',Auth::user()->id)->where('jenis','Konseling Pribadi')->where('status','Sudah Ditanggapi')->get();
$bk_karir = LayananBK::where('dibuat_oleh_id',Auth::user()->id)->where('jenis','Bimbingan Konseling Karir')->where('status','Sudah Ditanggapi')->get();
$bk_kelompok = LayananBK::where('dibuat_oleh_id',Auth::user()->id)->where('jenis','Bimbingan Konseling Kelompok')->where('status','Sudah Ditanggapi')->get();
$konseling_kelompok = LayananBK::where('dibuat_oleh_id',Auth::user()->id)->where('jenis','Konseling Kelompok')->where('status','Sudah Ditanggapi')->get();

@endphp
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
                                    class="mdi mdi-account"></i><span class="hide-menu"> Konseling Pribadi @if(count($konseling_pribadi) > 0) <button class="btn btn-sm btn-info btn-rounded ml-3">{{$konseling_pribadi->count()}}</button> @endif
                                </span></a></li>
                        <li class="sidebar-item"><a href="{{route('siswa.bimbingan.karir')}}" class="sidebar-link"><i
                                    class="mdi mdi-worker"></i><span class="hide-menu"> Bimbingan Konseling Karir @if(count($bk_karir) > 0) <button class="btn btn-sm btn-info btn-rounded ml-3">{{$bk_karir->count()}}</button> @endif
                                </span></a></li>
                        <li class="sidebar-item"><a href="{{route('siswa.bimbingan.kelompok')}}" class="sidebar-link"><i
                            class="mdi mdi-account-multiple"></i><span class="hide-menu"> Konseling Kelompok @if(count($konseling_kelompok) > 0) <button class="btn btn-sm btn-info btn-rounded ml-3">{{$konseling_kelompok->count()}}</button> @endif
                        </span></a></li>
                        <li class="sidebar-item"><a href="{{route('siswa.bimbingan.konseling.kelompok')}}" class="sidebar-link"><i
                                    class="mdi mdi-note-plus"></i><span class="hide-menu"> Bimbingan Konseling Kelompok @if(count($bk_kelompok) > 0) <button class="btn btn-sm btn-info btn-rounded ml-3">{{$bk_kelompok->count()}}</button> @endif
                                </span></a></li>
                    </ul>
                </li>
    
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>