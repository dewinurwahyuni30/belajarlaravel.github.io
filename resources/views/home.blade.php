@extends('layouts.mainlayout')

@section('title', 'home')

@section('content')

<div class="mt-5">

    <h1>Home Page</h1><br>
                <h2>Hallo,salam kenal </h2>
                <h2>Selamat Datang,{{Auth::user()->name}}</h2>
                <h2>Anda adalah {{Auth::user()->role->name}}</h2>
                
               
                <div class="d-flex flex-row-reverse bd-highlight">
                    <div  class="p-2 bd-highlight">
                       <img  style="position: relative; bottom: 230px;"  src="images/admin1.png" width="350px" alt="">
                    </div> 
                </div>
</div>   
                {{-- <table class="table">
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                    </tr>
                    @foreach($buah as $data)
                    <tr>,
                        <td>{{$loop->iteration}}</td>
                        <td>{{$data}}</td>
                    </tr>
                    @endforeach
                </table> --}}
@endsection
                {{-- <!-- @foreach($buah as $data)
                {{$data}}<br>
                @endforeach -->


                <!-- @for($i = 0; $i < 5 ; $i++)
                {{$i}}<br>
                @endfor -->

                <!-- @if($role == 'admin')
                <a href="">ke halaman admin</a>
                @elseif($role=='staff')
                <a href="">ke halaman gudang</a>
                @else
                <a href=""> ke halaman whatever</a>
                @endif -->

                <!-- @switch($role)
                    @case($role=='admin')
                    <a href="">ke halaman admin</a>
                    @break

                    @case($role=='staff')
                    <a href="">ke halaman gudang</a>
                    @break

                    @default
                    <a href="">ke halaman whatever</a>
                @endswitch --> --}}
   