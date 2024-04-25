@extends('template')
@section('content')
<div class="w-full h-full flex justify-center items-center">
<div class="w-fit p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-400 dark:border-gray-700">
    <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">Transaksi berhasil </h5>
    <p class="mb-5 text-white sm:text-lg ">Tunggu hingga pemilik mobil menyetujui permintaan peminjaman anda</p>
    <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4 rtl:space-x-reverse text-white">        
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <caption class="p-5 text-xl font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
           Detail Transaksi
        </caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product name
                </th>
                <th scope="col" class="px-6 py-3">
                    Color
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   Pemilik mobil
                </th>
                <td class="px-6 py-4">
                    {{ $ownerDetails->name }}
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  alamat pemilik
                </th>
                <td class="px-6 py-4">
                    {{ $ownerDetails->address }}
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  No hp pemilik
                </th>
                <td class="px-6 py-4">
                    {{ $ownerDetails->no_hp }}
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   mulai pinjam
                </th>
                <td class="px-6 py-4">
                    {{$detailtransaksi['mulai_pinjam']}}
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    selesai pinjam
                </th>
                <td class="px-6 py-4">
                    {{$detailtransaksi['selesai_pinjam']}}
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Tarif per hari
                </th>
                <td class="px-6 py-4">
                    {{$detailtransaksi['tarif_per_hari']}}
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Total tarif
                </th>
                <td class="px-6 py-4">
                    {{$detailtransaksi['total_tarif']}}
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   peminjam
                </th>
                <td class="px-6 py-4">
                    {{Auth::user()->name}}
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   Status
                </th>
                <td class="px-6 py-4">
               waiting
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td colspan="2" class="px-6 py-4 w-full flex justify-center items-center ">
                <a href="/home" class="bg-blue-500 rounded-md w-full h-10 text-white p-2 ">Kembali ke Home</a>
            </td>
            <td>

            </td>
            </tr>
        </tfoot>
    </table>
</div>

       
        
        
        
       
       
       
       
    </div>
</div>
</div>
@endsection
