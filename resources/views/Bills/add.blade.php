@extends('layouts.master')
@section('content')
    <div>
        <form action="{{ route('bill_store') }}" method="post">
            @csrf
            <div>
                <h4>Products</h4>
                <div>
                    @foreach($products as $product)
                        <div class="border p-2 mb-2 d-flex justify-content-between">
                            <div>
                                <strong>{{ $product->name }}</strong>
                                <br>
                                ₹{{ $product->price }}
                            </div>
                                <button type="button" class="btn btn-primary btn-sm" onclick="addProduct( {{ $product->id }}, '{{$product->name}}', {{$product->price}})">Add</button>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mt-4">
                <h4>Current Bill</h4>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody id="bill-items">

                    </tbody>
                </table>
                <h5>Subtotal: ₹<span id="subtotal">0</span></h5>
            </div>
        </form>
    </div>
    <script>
        let bill=[];
        function addProduct(id, name, price){
            const existing = bill.find(item => item.id == id);
            if(existing){
                existing.quantity++;
            }else{
                bill.push({
                    id: id,
                    name: name,
                    price: price,
                    quantity: 1,
                    total: total,
                });
            }
            renderBill();
        }

        function renderBill(){
            let html = '';
            let subtotal = 0;
            let total = 0;
            bill.forEach(item => {
                total = item.price * item.quantity;
                subtotal += total;
                html += `
                    <tr>
                        <td>${item.name}</td>
                        <td>
                            <input type="number" value="${item.quantity}">
                        </td>
                        <td>
                            <input type="number" value="${item.price}">
                        </td>
                        <td>${item.total}</td>
                    </tr>
                    `;
            });
            document.getElementById('bill-items').innerHTML = html;
            document.getElementById('subtotal').innerText = subtotal;
        }
    </script>
@endsection