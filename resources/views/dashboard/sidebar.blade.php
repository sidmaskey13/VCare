<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          @if(Sentinel::check()->account == 1)
            @php
              $a=Sentinel::getUser()->id;
              $p=App\Doctor::where('user_id',$a)->first()->image;
            @endphp
            <img src="{{asset('images/galleryimage'.'/'.$p)}}" class="profile-pic" alt="User Image" >
            @endif
          @if(Sentinel::check()->account == 0)
            @php
              $a=Sentinel::getUser()->id;
              $p=App\Patient::where('user_id',$a)->first()->image;
            @endphp
              <img src="{{asset('images/galleryimage'.'/'.$p)}}" class="profile-pic" alt="User Image">
            @endif
        </div>
        <div class="pull-left info">
          {{-- <p>{{Auth::user()->name}}</p> --}}
          <!-- Status -->
          {{--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>--}}
            @if(Sentinel::check()->account == 1)
              <div>
                <b class=""> {{\App\Doctor::where('user_id',Sentinel::getUser()->id)->first()->name}} <br></b>(Doctor)
              </div>
            @endif
            @if(Sentinel::check()->account == 0)
              <div>
                <b class=""> {{\App\Patient::where('user_id',Sentinel::getUser()->id)->first()->name}} <br></b>(Patient)
              </div>
            @endif
        </div>
      </div>
        <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        @if(Sentinel::check()->account == 0)
            <li>
              <a href="{{route('patient.index')}}"> <span>My Profile</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
            </li>
          <li class="treeview">
            <a href="#"> <span>Appointment</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('appointment.create')}}"><span>Schedule Appointment</span></a></li>
              <li><a href="{{route('appointment.index')}}"><span>View Appointment</span></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"> <span>Report</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('report.create')}}"><span>Add Report</span></a></li>
              <li><a href="{{route('report.index')}}"><span>All Report</span></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"> <span>Emergency</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{URL::to('/online')}}"><span>Emergency</span></a></li>
              {{--<li><a href="{{route('report.index')}}"><span>All Report</span></a></li>--}}
            </ul>
          </li>
        @endif
        @if(Sentinel::check()->account == 1)
          <li>
            <a href="{{route('doctor.index')}}"><span>My Profile</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
          </li>
          <li class="treeview">
            <a href="#"> <span>Available Time</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('work.create')}}"><span>Add Work Time</span></a></li>
              <li><a href="{{route('work.index')}}"><span>View Work Time</span></a></li>
            </ul>
          </li>

          <li class="treeview">
            <a href="#"> <span>Appointment</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              @php
              $d_id=Sentinel::getUser()->id;
              @endphp
              <li><a href="{{URL::to('/myappointment/')}}"><span>Pending Appointment</span></a></li>
              <li><a href="{{route('approved.index')}}"><span>Approved Appointment</span></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"> <span>Emergency</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              @php
                $d_id=Sentinel::getUser()->id;
              @endphp
              <li><a href="{{URL::to('/emergency')}}"><span>Pending Emergency</span></a></li>
              {{--<li><a href="{{route('approved.index')}}"><span>Approved Appointment</span></a></li>--}}
            </ul>
          </li>
        @endif
        @if(Sentinel::check()->account == 2)


          <li class="treeview">
            <a href="#"> <span>All Users</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{url('/alldoctors')}}"><span>All Doctors</span></a></li>
              <li><a href="{{url('/allpatients')}}"><span>All Patients</span></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"> <span>Special Field</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('field.create')}}"><span>Add Field</span></a></li>
              <li><a href="{{route('field.index')}}"><span>View Field</span></a></li>
            </ul>
          </li>

        @endif
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>