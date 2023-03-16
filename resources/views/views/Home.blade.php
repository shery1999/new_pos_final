@extends('layout.master')

@section('content')
    <div class="row inbox-wrapper">

        <div class="container-fluid">
            @if (session()->has('msg'))
                @if (session()->has('msg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Transaction Successfull :</strong> To Print details click :
                        <a href="{{ url(Session::get('msg')) }}">
                            <button type="button" class="btn btn-info">Print</button>
                        </a>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                    </div>
                @endif
            @endif
            @if (session()->has('msgf'))
                @if (session()->has('msgf'))
                    <div class="col-lg-12 alert alert-danger" role="alert">
                        Data Not Inserted.
                    </div>
                @endif
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Cart</h4>
                            <div class="table-responsive">
                                <table class="table" id="pdfTab">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID</th>
                                            <th>Item Name</th>
                                            <th>Price</th>
                                            <th>Wight</th>
                                            <th>Description</th>
                                            <th>Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody id="clone" class="table_container">

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>ID</th>
                                            <th>Item Name</th>
                                            <th>Price</th>
                                            <th>Wight</th>
                                            <th>Description</th>
                                            <th>Quantity</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                @if ($errors->has('storage_id'))
                                    <div style="color: red;font-size: 1rem;" class="error">
                                        {{ 'Please Add From Avaliable Stone Table and Submit again' }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-4">
                                <h3>Discount %: </h3>
                                <h3>SubTotal:</h3>
                                <h3>Total Price : </h3>
                            </div>
                            <div class="col-3 ">
                                <input type="number" max="100" min="0" class="form-control" id="discount1"
                                    placeholder="Enter discount percentage">
                                <h3 id="subtotal">0</h3>
                                <h3 id="total_price">0</h3>
                            </div>
                            <div class="col-4">
                                <h3>-%</h3>
                                <h3>-Rs</h3>
                                <h3>-Rs</h3>
                            </div>
                        </div>
                        <form action="/sale/{{ Route::current()->parameter('id') }}/order" method="post"
                            {{-- onsubmit="this.submit();  --}} {{-- this.reset();  --}} {{-- return false;" --}}>
                            @csrf
                            <div class="form-group row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-6">
                                    <input required type="hidden" name="complete_order" id="complete_order">
                                    <input required type="hidden" name="order_discount" id="order_discount">
                                    <input required type="hidden" name="subtotal_price" id="subtotal_price">
                                    <input required type="hidden" name="total" id="total">
                                    <div class="col-lg-8">
                                        <textarea id="maxlength-textarea" class="form-control" id="defaultconfig-4" maxlength="100" name="item_Description"
                                            rows="8" placeholder="Enter Description"></textarea>
                                        @if ($errors->has('item_Description'))
                                            <div class="error">
                                                {{ $errors->first('item_Description') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto ">
                                </div>
                                <div class="col-lg-2 pb-3 ml-auto ">
                                    <button type="submit" class="btn btn-primary">Proceed</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Avaliable Items</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration" id="addpdfTab">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID</th>
                                            <th>Item Name</th>
                                            <th>Price</th>
                                            <th>Wight</th>
                                            <th>Description</th>
                                            <th>Quantity</th>
                                            <th>Add to Cart</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($Data as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $item['id'] }}</td>
                                                <td>{{ $item['name'] }}</td>
                                                <td>{{ $item['price'] }}</td>
                                                <td>{{ $item['weight'] }}</td>
                                                <td>{{ $item['description'] }}</td>
                                                <td>
                                                    <div class="counter">
                                                        <button
                                                            class=" btn mb-1 btn-primary counter-btn decrement-btn">-</button>
                                                        <span class="counter-value">1</span>
                                                        <button
                                                            class=" btn mb-1 btn-primary counter-btn increment-btn">+</button>
                                                    </div>
                                                </td>
                                                <td> <button type="button" class="use-button  btn mb-1 btn-primary">Add to
                                                        Cart<span class=" btn-icon-right"><i
                                                                class="fa fa-shopping-cart"></i></span>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>ID</th>
                                            <th>Item Name</th>
                                            <th>Price</th>
                                            <th>Wight</th>
                                            <th>Description</th>
                                            <th>Quantity</th>
                                            <th>Add to Cart</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

        <script>
            function calculateTotalPrice(items) {
                let totalPrice = 0;
                for (let i = 0; i < items.length; i++) {
                    const item = items[i];
                    const itemPrice = parseFloat(item.price.replace('Rs-', '').replace(',',
                        '')); // remove 'Rs-' and ',' from price string and convert to float
                    const itemQuantity = parseInt(item.quantity);
                    totalPrice += itemPrice * itemQuantity;
                }

                return totalPrice;
            }
            class Item {
                constructor(id, price, quantity) {
                    this.id = id;
                    this.price = price;
                    this.quantity = quantity;
                }
            }
            const itemList = [];
            let sno = 0;
            $(".use-button").click(function() {
                var row = $(this).closest("tr");
                var id = row.find("td")[1].textContent;
                var name = row.find("td")[2].textContent;
                var price = row.find("td")[3].textContent;
                var weight = row.find("td")[4].textContent;
                var description = row.find("td")[5].textContent;
                var quantityText = row.find("td")[6].textContent.trim(); // Get the text content of the 7th cell
                var quantity = parseFloat(quantityText); // Parse the text content as a floating-point number
                const regex = /\d+(\.\d+)?/;
                const match = quantityText.match(regex);
                let number = 0;
                if (match) {
                    number = parseFloat(match[0]);
                }
                const item = new Item(id, price, number);
                itemList.push(item);
                let orderComplete = JSON.stringify(itemList);
                document.getElementById("complete_order").value = orderComplete;
                const discount1 = document.getElementById("discount1").value;
                order_discount
                document.getElementById("order_discount").value = discount1;
                localStorage.setItem("discountPercentage", discount1);



                // total price calcution
                // const totalPrice = calculateTotalPrice(itemList);
                // document.getElementById("subtotal").innerHTML = totalPrice;
                // var total_price = totalPrice * (1 - (discount1 / 100));
                // document.getElementById("total_price").innerHTML = total_price

                // //assign values to from  
                // document.getElementById("subtotal_price").value = totalPrice
                // document.getElementById("total").value = total_price


                const totalPrice = calculateTotalPrice(itemList);
                document.getElementById("subtotal").innerHTML = totalPrice.toFixed(2);
                var total_price = totalPrice * (1 - (discount1 / 100));
                document.getElementById("total_price").innerHTML = total_price.toFixed(2);

                //assign values to from  
                document.getElementById("subtotal_price").value = totalPrice.toFixed(2);
                document.getElementById("total").value = total_price.toFixed(2);

                sno++;
                row.remove();
                row.hide();
                var newRow =
                    "<tr><td>" + sno +
                    "</td><td>" + id +
                    "</td><td>" + name +
                    "</td><td>" + price +
                    "</td><td>" + weight +
                    "</td><td>" + description +
                    "</td><td>" + number +
                    "</td><tr>";
                $("#pdfTab").append(newRow);
            });
            // Counter function
            $(document).ready(function() {
                $('.increment-btn').click(function() {
                    var counterValue = parseInt($(this).siblings('.counter-value').text());
                    $(this).siblings('.counter-value').text(counterValue + 1);
                });

                $('.decrement-btn').click(function() {
                    var counterValue = parseInt($(this).siblings('.counter-value').text());
                    if (counterValue > 1) {
                        $(this).siblings('.counter-value').text(counterValue - 1);
                    }
                });
            });

            const inputElement = document.getElementById('discount1');

            inputElement.addEventListener('change', () => {
                const discount1 = document.getElementById("discount1").value;

                const totalPrice = calculateTotalPrice(itemList);
                document.getElementById("subtotal").innerHTML = totalPrice;
                var total_price = totalPrice * (1 - (discount1 / 100));
                document.getElementById("total_price").innerHTML = total_price
                localStorage.setItem("discountPercentage", discount1);

                //assign values to from  
                document.getElementById("subtotal_price").value = totalPrice
                document.getElementById("total").value = total_price
                document.getElementById("order_discount").value = discount1;

            });



            function calculatePrice() {
                const price = document.getElementById("price1").value;
                const discount = document.getElementById("discount1").value;
                const discountedPrice = price - (price * (discount / 100));
                document.getElementById("calculated-price").innerHTML = `${discountedPrice.toFixed(2)}`;

                // Store discount percentage in local storage
                localStorage.setItem("discountPercentage", discount);
            }

            // Load discount percentage from local storage
            const discountPercentage = localStorage.getItem("discountPercentage");
            document.getElementById("discount1").value = discountPercentage;

            if (discountPercentage !== null) {
                document.getElementById("discount").value = discountPercentage;
            }

            // Calculate price on page load if price and discount are set
            const price = document.getElementById("price1").value;
            if (price !== "" && discountPercentage !== null) {
                calculatePrice();
            }
        </script>
    </div>
@endsection
