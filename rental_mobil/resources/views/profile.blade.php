@extends('template')

@section('content')
@include('navbar')
<div class="w-full h-full flex flex-row justify-start items-start">

    <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="flex justify-end px-4 pt-4">
        <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
            <span class="sr-only">Open dropdown</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
            </svg>
        </button>
        <!-- Dropdown menu -->
        <div id="dropdown" class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2" aria-labelledby="dropdownButton">
                <li>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Export Data</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="flex flex-col items-center pb-10">
        <div class="w-24 h-24 flex justify-center items-center text-5xl font-bold mb-3 rounded-full shadow-lg bg-slate-400"  alt="Bonnie image">
            {{ucfirst(substr($dataProfile[0]->name, 0, 1))}}
        </div>
        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{$dataProfile[0]->name}}</h5>
        <div class="flex mt-4 md:mt-6 bg-slate-500 w-full font-bold">
            <table>
                <tr><td>Email</td><td>:</td><td>{{$dataProfile[0]->email}}</td></tr>
                <tr><td>Alamat</td><td>:</td><td>{{$dataProfile[0]->address}}</td></tr>
                <tr><td>NO. Hp</td><td>:</td><td>{{$dataProfile[0]->no_hp}}</td></tr>
                <tr><td>No. SIM</td><td>:</td><td>{{$dataProfile[0]->no_SIM}}</td></tr>
            </table>
        </div>
    </div>
</div>
<div class="bg-blue-200 w-1/3 h-full p-10">
    <p class="text-3xl font-semibold">
        riwayat pinjam mobil:
    </p>
    
@foreach($detailtransaksi as $detail)
<div class="max-w-sm p-6 bg-white border my-2 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">id transaksi : {{$detail->id_transaksi}}</h5>
    </a>
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
        @if($detail->status==='waiting')
        <span class="bg-indigo-100 text-indigo-800 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">
        Menunggu konfirmasi
        </span>
        @elseif($detail->status==='done')
        <span class="bg-blue-100 text-blue-800 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
        Selesai dikembalikan
        </span>
        @elseif($detail->status==='ongoing')
        <span class="bg-green-100 text-green-800 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
        Disetujui
        </span>
        @else
        <span class="bg-red-100 text-red-800 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
            Ditolak
            </span>
        @endif
        </p>
    <button data-modal-target="default-modal{{$detail->id_transaksi}}" data-modal-toggle="default-modal{{$detail->id_transaksi}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        lihat detail
        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
        </svg>
    </button>
    @if($detail->status==='ongoing')
    <form action="/konfirmasi" method="POST">
        @CSRF
        <input type="text" name="status" id="done" value="done" hidden>
        <input type="text" name="id_transaksi" id="ongoing" value="{{$detail->id_transaksi}}" hidden>
        <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
            selesai pinjam
        </button>
    </form>
    @endif

</div>

  <!-- Main modal -->
  <div id="default-modal{{$detail->id_transaksi}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-2xl max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                      Detail transaksi
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal{{$detail->id_transaksi}}">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="p-4 md:p-5 space-y-4 text-white">
                <table>
                    <tr><td>tanggal mulai pinjam</td><td>:</td><td>{{$detail->mulai_pinjam}}</td></tr>
                    <tr><td>tanggal mulai pinjam</td><td>:</td><td>{{$detail->selesai_pinjam}}</td></tr>
                    <tr><td>tarif per hari</td><td>:</td><td>{{$detail->tarif_per_hari}}</td></tr>
                    <tr><td>total tarif</td><td>:</td><td>{{$detail->total_tarif}}</td></tr>
                </table>
                  
              </div>
          </div>
      </div>
  </div>


@endforeach


</div>
<div class="bg-blue-300 w-1/4 h-full p-10">
    <p class="text-3xl font-semibold">
        menuggu konfirmasi:
    </p>
    
@foreach($daftarkonfirmasi as $konfirmasi)
<div class="max-w-sm p-6 bg-white border my-2 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">id transaksi : {{$konfirmasi->id_transaksi}}</h5>
    </a>
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
        @if($konfirmasi->status==='waiting')
        <span class="bg-indigo-100 text-indigo-800 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">
        Menunggu konfirmasi
        </span>
        @elseif($konfirmasi->status==='done')
        Selesai dikembalikan
        @elseif($konfirmasi->status==='ongoing')
        <span class="bg-green-100 text-green-800 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-green-300">
        Disetujui
        </span>
        @else
        DIbatalkan
        @endif
    </p>
    <button data-modal-target="default-modal{{$konfirmasi->id_transaksi}}" data-modal-toggle="default-modal{{$konfirmasi->id_transaksi}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
       konfirmasi
        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
        </svg>
    </button>
</div>

  <!-- Main modal -->
  <div id="default-modal{{$konfirmasi->id_transaksi}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-2xl max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                      Detail transaksi
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal{{$konfirmasi->id_transaksi}}">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="p-4 md:p-5 space-y-4 text-white">
                <table>
                    <tr><td>tanggal mulai pinjam</td><td>:</td><td>{{$konfirmasi->mulai_pinjam}}</td></tr>
                    <tr><td>tanggal mulai pinjam</td><td>:</td><td>{{$konfirmasi->selesai_pinjam}}</td></tr>
                    <tr><td>tarif per hari</td><td>:</td><td>{{$konfirmasi->tarif_per_hari}}</td></tr>
                    <tr><td>total tarif</td><td>:</td><td>{{$konfirmasi->total_tarif}}</td></tr>
                </table>
                  
              </div>
              <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                  <form action="/konfirmasi" method="POST">
                    @CSRF
                    <input type="text" name="status" id="ongoing" value="ongoing" hidden>
                    <input type="text" name="id_transaksi" id="ongoing" value="{{$konfirmasi->id_transaksi}}" hidden>
                      <button data-modal-hide="default-modal" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">setujui</button>
                    </form>
                    <form action="/konfirmasi" method="POST">
                        @CSRF
                        <input type="text" name="status" id="cancel" value="cancel" hidden>
                        <input type="text" name="id_transaksi" id="ongoing" value="{{$konfirmasi->id_transaksi}}" hidden>
                          <button data-modal-hide="default-modal" type="submit" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">tolak</button>
                        </form>
            </div>
          </div>
      </div>
  </div>


@endforeach


</div>
<div class="bg-blue-400 w-1/4 h-full p-10">
    <p class="text-3xl font-semibold">
        mobil yang disewa:
    </p>
    
@foreach($daftarmobildisewa as $disewa)
<div class="max-w-sm p-6 bg-white border my-2 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">id transaksi : {{$disewa->id_transaksi}}</h5>
    </a>
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
        @if($disewa->status==='waiting')
        <span class="bg-indigo-100 text-indigo-800 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">
        Menunggu disewa
        </span>
        @elseif($disewa->status==='done')
        Selesai dikembalikan
        @elseif($disewa->status==='ongoing')
        <span class="bg-green-100 text-green-800 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-green-300">
        Disetujui
        </span>
        @else
        DIbatalkan
        @endif
    </p>
</div>

  <!-- Main modal -->
  <div id="default-modal{{$disewa->id_transaksi}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-2xl max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                      Detail transaksi
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal{{$disewa->id_transaksi}}">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="p-4 md:p-5 space-y-4 text-white">
                <table>
                    <tr><td>tanggal mulai pinjam</td><td>:</td><td>{{$disewa->mulai_pinjam}}</td></tr>
                    <tr><td>tanggal mulai pinjam</td><td>:</td><td>{{$disewa->selesai_pinjam}}</td></tr>
                    <tr><td>tarif per hari</td><td>:</td><td>{{$disewa->tarif_per_hari}}</td></tr>
                    <tr><td>total tarif</td><td>:</td><td>{{$disewa->total_tarif}}</td></tr>
                </table>
                  
              </div>
          </div>
      </div>
  </div>


@endforeach


</div>

@endsection