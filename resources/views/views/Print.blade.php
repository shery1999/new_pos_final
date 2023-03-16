<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Syne+Tactile&display=swap"
        rel="stylesheet">
    <title>INVENT CORP</title>
    <style>
        body {
            background-color: rgb(229, 229, 229);
            font-family: 'Roboto', sans-serif;
        }

        .blue {
            color: rgb(1, 116, 177);
            font-weight: 500
                /* font-size: 2vw; */
        }

        .textsize {
            font-size: 2vw;
        }

        .textbold {
            font-weight: 700;
        }

        .weigthbold {
            font-weight: bold;
            font-size: 2.5vw;
        }

        p {
            font-size: 1.4vw;
            margin-top: 0;
            margin-bottom: 0rem;
        }

        .logoFont {
            font-size: 1.5vw;
        }

        .bgcol {
            background-color: rgb(1, 116, 177);
            color: rgb(229, 229, 229);
            border-bottom: 7px solid rgb(69, 69, 71);
        }

        .bgcolnew {
            background-color: rgb(1, 116, 177);
            color: rgb(229, 229, 229);
        }

        .bgcol h1 {
            font-size: 6vw;
        }

        .table {
            width: 100%;
            margin-bottom: 0rem;
            color: #212529;
        }

        .bfooter {
            background-color: rgb(69, 69, 71);
            color: white;
        }

        @media print {
            .table tr th {
                background-color: rgb(1, 116, 177) ! important;
                color: rgb(229, 229, 229);
            }

            .table th {
                background-color: rgb(1, 116, 177) ! important;
            }

            .table td,
            .table th {
                background-color: inherit !important;
            }

            .table-stripe {
                background-color: #dedede !important;
            }

            /* @page {
                size: auto;
                margin-top: 0mm;
                margin-bottom: 0mm;
            } */
            @media print {
                @page {
                    margin-top: 0;
                    margin-bottom: 0;
                }

                body {
                    padding-top: 5rem;
                    padding-bottom: 5rem;
                }
            }

            #logo_img {
                height: 5rem !important;
            }

            #logo_img {
                height: 5rem !important;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <!-- header -->
        <div class="row">
            <!-- first col start -->
            <div class="col-md-6 col-4">
                <div class="row mt-4 ">
                    <div class="col-1"></div>
                    <div class="col-3 float-right">
                        <img id="logo_img" src="{{ asset('assets\images\logo\logo.png') }}" style="height: 6rem">
                    </div>
                    <div class="col-7">
                        <h1 class="weigthbold"><span style="color:rgb(1, 116, 177);">GABEEN <br></span> FOUNDATION</h1>
                        {{-- <h3 class="blue logoFont">(SMC-PVT)LTD</h3> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-3">
                <div class="row mt-4">
                    <div class="col-3">
                        <i class="fa fa-map-marker" style="font-size:34px"></i>
                    </div>
                    <div class="col-9">
                        <p>Jano, Khwaza</p>
                        <p>Khela, Swat,</p>
                        <p>PK, Pakistan</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-3">
                <div class="row mt-4">
                    <div class="col-3">
                        <i class="fa fa-phone" style="font-size:24px"></i>
                    </div>
                    <div class="col-9">
                        <p style="inline-size:max-content">(+92)346-9452268</p>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-2 col-3"> --}}
            {{-- <div class="row mt-4">
                    <div class="col-3">
                        <i class="fa fa-envelope" style="font-size:24px"></i>
                    </div>
                    <div class="col-9">
                        <p>accounts@.app</p>
                        <p>www.owner.app</p>
                    </div>
                </div> --}}
            {{-- </div> --}}
        </div>
        <!-- invoice -->
        <div class="row bgcol">
            <div class="col-3">
                <h1 class="pl-4">INVOICE</h1>
            </div>
            <div class="col-6"></div>
            <div class="col-3 text-right">
                {{-- <h5 class="pt-2">INVOICE TOTAL</h5> --}}
                {{-- <h2>{{ $Data[0]->Data['price'] }}</h2> --}}
            </div>
        </div>
        <!-- invoice to  -->
        <div class="row">
            <div class="col-4 pt-3 pl-4">
                <h3><span style="color:rgb(1, 116, 177);"> INVOICE </span>TO </h3>
                {{-- <h2>{{ $Data[0]->Showroom['ownername'] }}</h2> --}}
                <div class="row textsize">
                    <div class="col-5 text-left blue textbold">
                        <p>NAME</p>
                        <p>PHONE :</p>
                        <p>CNIC:</p>
                        <p>ADRESS :</p>
                        <p> <br></p>
                        {{-- <p>EMAIL :{{ $Data[0]->Showroom['ownername'] }}</p> --}}
                        {{-- <p>SHIPPING TO :{{ $Data[0]->Showroom['ownername'] }}</p> --}}
                    </div>
                    <div class="col-7 text-left">
                        <p>{{ $data[0]->Order->Customers['name'] }}</p>
                        <p>{{ $data[0]->Order->Customers['phone_number'] }}</p>
                        <p>{{ $data[0]->Order->Customers['cnic'] }}</p>
                        <p>{{ $data[0]->Order->Customers['address'] }}</p>
                    </div>
                </div>
            </div>
            <div class="col-4"></div>
            <div class="col-4 text-right pt-5">
                <div style="display: -webkit-inline-box">
                    {{-- <h3> <span style="color:rgb(1, 116, 177);"> INVOICE# :</span>000{{ $Data[0]['lot_id'] }}</h3> --}}
                </div>
                <div style="display: -webkit-inline-box">
                    <h3><span style="color:rgb(1, 116, 177);"> DATE :</span></h3>
                    <h3 id="date">{{ $data[0]['created_at'] }}</h3>
                </div>
                <td>
                    <div class="visible-print text-center">
                        {{-- {{ $id_data = $Data[0]['lot_id'] }} --}}
                        {{-- {!! QrCode::size(150)->generate("orders/$id_data ") !!} --}}
                        {{-- {!! QrCode::size(200)->generate(Request::url()) !!} --}}



                    </div>
                </td>
                {{-- <h3><span style="color:rgb(1, 116, 177);"> DUE DATE :</span>Feb 25, 2022</h3> --}}
            </div>
            {{-- {{dd($data)}} --}}
            {{-- {{ dd($data[0]->Order->OrderLines) }} --}}
        </div>
        {{-- table --}}
        <table class="table table-striped table-bordered zero-configuration">
            <thead>
                <tr class="bgcolnew">
                    <th class="text-center" scope="col">Item Name </th>
                    <th class="text-center" scope="col">Item Weight</th>
                    <th class="text-center" scope="col">Item Quantity</th>
                    <th class="text-center" scope="col">Item Price</th>
                </tr>

                {{-- </tr> --}}
            </thead>
            <tbody>
                @foreach ($data[0]->Order->OrderLines as $key => $item)
                    <tr>
                        <td class="text-center">{{ $item->items['name'] }}</td>
                        <td class="text-center">{{ $item->items['weight'] }}</td>
                        <td class="text-center">{{ $item['quantity'] }}</td>
                        <td class="text-center">{{ $item['price'] }}</td>
                    </tr>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- payment and condition -->
        <div class="row">
            <div class="col-6 pt-2">
                {{-- <p class="blue pt pt-2">Payment</p>
                <p class="pt-3"> <span style=" color:rgb(1, 116, 177);font-weight: 500;">Company:</span> Cash Paid</p>
                <p><span style="color:rgb(1, 116, 177);font-weight: 500;">Bank: </span> A/C NO 5024 5879 5687</p>
                <p class="blue pt-3">We Accept</p>
                <p><span style="color:rgb(1, 116, 177);font-weight: 500">Card:</span> VISA, Master Card, American
                    Express</p>
                <p class="blue pt-4">Condition</p>
                <p>1. Loram ispum dolor sit amet condecteur adipiscing edit.</p>
                <p>2. Aenean eros ut cursus cursus In rhoncus lacus id rutrum gravida.</p>
                <p>3. Loram ispum dolor sit amet condecteur edit.</p>
                <p class="blue pt-5">THANKS FOR BUSINESS WITH US !</p> --}}
            </div>
            <div class="col-2"></div>
            <div class="col-4">
                <table class="table table-bordered table-striped">
                    <tbody>
                        {{-- <tr> --}}
                        {{-- {{ dd($data[0]->total_price) }} --}}

                        {{-- <td class=" text-right">SubTotal-</td>
                            <td class=" text-right">RS-{{ $data[0]->subtotal_price }}</td>
                        </tr>
                        <tr>
                            <td class=" text-right">Discount-</td>
                            <td class=" text-right">{{ $data[0]->discount }}%</td>
                        </tr>
                        <tr>
                            <th class="bgcolnew text-right">Total-</th>
                            <th class="bgcolnew text-right">RS-{{ $data[0]->total_price }}</th>
                        </tr> --}}
                    </tbody>
                </table>
                <div class="text-center mt-3">
                    <img src="../toppng.com-leonardo-da-vincis-signature-leonardo-da-vinci-signature-1428x830.png"
                        width="50%" alt="">
                    {{-- <img src="../toppng.com-leonardo-da-vincis-signature-leonardo-da-vinci-signature-1428x830.png" alt=""> --}}
                    <h4 class="blue">Hukam Dar</h4>
                    {{-- <h5>Accountant</h5> --}}
                </div>
            </div>
        </div>
        <!-- footer -->
        {{-- <div class="row bfooter mt-5 mr-3 ml-3">
            <div class="p-3">
                <p>Terms : Loram ispum dolor sit amet, condecteur adipiscing edit. Aenean eros ut cur. In rhoncus, lacus
                    id rutrum gravida, nibh eros. ispum dolor sit amet, condecteur adipiscing edit. Aenean eros ut cur.
                    In rhoncus, lacus id rutrum gravida,
                    nibh eros.</p>
            </div>
        </div> --}}
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>
    // addEventListener('popstate',()=>{location.reload()})
    addEventListener('popstate', console.log("hello"))
</script>
<script>
    n = new Date();
    y = n.getFullYear();
    m = n.getMonth() + 1;
    d = n.getDate();
    document.getElementById("date").innerHTML = m + "/" + d + "/" + y;
</script>
<script>
    window.print();
    window.addEventListener('popstate', function(e) {
        window.location.href = 'https://www.google.com/';
        var state = e.state;
        if (state !== null) {}
    });
</script>
<script>
    $(window).bind('onpopstate', function(e) {
        window.location
    });
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>

</html>
