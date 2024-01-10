@extends('layouts.main_index')
@section('content')
<div class="container-xl mt-3">
    <div class="table-responsive">
        <table class="table table-stripped">
            <tbody>
                <tr>
                    <td>ID</td>       
                    <td>{{ $credit->id }}</td>       
                </tr>

                <tr>
                    <td>Ism Familiya</td>       
                    <td>{{ $credit->name }}</td>       
                </tr>

                <tr>
                    <td>Telefon</td>       
                    <td>{{ $credit->phone }}</td>       
                </tr>

                <tr>
                    <td>Mahsulot turi</td>
                    <td>
                        @if ($credit->product)
                            {{ $credit->product->product_name ?? 'Mahsulot kiritilmagan' }}
                        @else
                            Mahsulot kiritilmagan
                        @endif
                    </td>
                </tr>

                <tr>
                    <td>Mahsulot narxi</td>       
                    <td>
                        @if ($credit->product_price)
                            {{ $credit->product_price ?? 'Mahsulot narxi kiritilmagan' }}
                        @else
                            Mahsulot narxi kiritilmagan
                        @endif   
                    </td>       
                </tr>

                <tr>
                    <td>Mahsulot miqdori</td>
                    <td>{{ $credit->product_amount }} dona yoki kg</td>
                </tr>

                <tr>
                    <td>Boshqa summa</td>       
                    <td>{{ $credit->other_price }} so'm</td>       
                </tr>

                <tr>
                    <td>Jami Qarzdorlik</td>       
                    <td>{{ $credit->total_price }} so'm</td>       
                </tr>

                <tr>
                    <td>Izoh</td>
                    <td>{{ $credit->comment }}</td>       
                </tr>

                <tr>
                    <td>Qarz berilgan sana</td>
                    <td>
                        @if ($credit->given_date)
                            {{ $credit->given_date ?? 'Qarz berilgan sana qo`shilgan vaqt bilan bir xil' }}
                        @else
                            Qarz berilgan sana qo`shilgan vaqt bilan bir xil
                        @endif    
                    </td>       
                </tr>
                <tr>
                    <td>Qarzdorlik qo'shilgan sana</td>
                    <td>{{ $credit->created_at }}</td>       
                </tr>
        </tbody>
        </table>
    </div>
</div>
@endsection