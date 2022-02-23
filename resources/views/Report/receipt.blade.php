
        <div id="invoice">
            <div class="page_content">
                <center id="top">
                    <div class="logo">CurryFlex Sales</div>
                    <div class="info"></div>
                    <h2>MTATI SALES</h2>
                </center>

                <div class="mid">
                    <div class="info">
                        <h2>Contact us</h2>
                        <p>
                            Address : P.O.BOX 452 IRINGA Email : curry@gmail.com
                            Phone : 067584736
                        </p>
                    </div>
                </div>

                <div class="bot">
                    <div id="table">
                        <table>
                            <tr class="table-title">
                                <td class="item"><h2>Item</h2></td>
                                <td class="item"><h2>Qty</h2></td>
                                <td class="item"><h2>Unit price</h2></td>
                                <td class="item"><h2>Discount</h2></td>
                                <td class="item"><h2>Sub total</h2></td>
                            </tr>

                            @foreach($receipt as $receiptt)

                            <tr class="service">
                                <td class="tableitem">
                                    <p class="item-tex">{{$receiptt->product->productname}}</p>
                                </td>
                                <td class="tableitem">
                                    <p class="item-tex">{{$receiptt->quantity}}</p>
                                </td>
                                <td class="tableitem">
                                    <p class="item-tex">{{$receiptt->unit_price}}</p>
                                </td>
                                <td class="tableitem">
                                    <p class="item-tex">0</p>
                                </td>
                                <td class="tableitem">
                                    <p class="item-tex">{{$receiptt->amount}}</p>
                                </td>
                            </tr>

                            @endforeach
                            
                            <tr class="table-title">
                                <td class="item"></td>
                                <td class="item"></td>
                                <td class="item"></td>
                                <td class="item">
                                    <p class="item-tex">Tax</p>
                                </td>
                                <td class="item"><p class="item-tex">0</p></td>
                            </tr>

                            <tr class="table-title">
                                <td class="item"></td>
                                <td class="item"></td>
                                <td class="item"></td>
                                <td class="item">Total</td>
                                <td class="item"><h2>{{$receipt->sum('amount')}}</h2></td>
                            </tr>
                        </table>

                        <div class="legalcopy">
                            <p class="legal">
                                <strong>Thank you for visit us</strong><br />
                                The goods which are subjected to tax price
                                include
                            </p>
                        </div>

                        <div class="serial-number">
                            <div class="serial">
                                Serial : <span class="serial"> 84875 </span>
                                <span>03/02/2022 &nbsp; &nbsp; 00:05</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
             #invoice {
                 box-shadow: 0 0 1in -0.25in rgb(0, 0, 0.5);
                 padding: 2mm;
                 margin: 0 auto;
                 width: 58mm;
                 background-color: #ffff;
             }

             #invoice h1 {
                 font-size: 1.5em;
                 color: #222;
             }

             #invoice h2 {
                 font-size: 0.5em;
             }

             #invoice h3 {
                 font-size: 1.2em;
                 font-weight: 300;
                 line-height: 2em;
             }

             #invoice p {
                 font-size: 0.7em;
                 color: #666;
                 line-height: 1.2em;
             }

             #invoice #top,
             #invoice #mid,
             #invoice #bot {
                 border-bottom: 1px solid #eee;
             }
             #invoice #top {
                 min-height: 100px;
             }

             #invoice #mid {
                 min-height: 80px;
             }

             #invoice #bot {
                 min-height: 50px;
             }

             #invoice #top .logo {
                 height: 60px;
                 width: 60px;
                 background-image: url() no-repeat;
                 background-size: 60px 60px;
                 border-radius: 50px;
             }

             #invoice .info {
                 display: block;
                 margin-left: 0;
                 text-align: center;
             }

             #invoice table {
                 width: 100%;
                 border-collapse: collapse;
             }

             #invoice .table-title {
                 font-size: 0.5em0;
                 background: #eee;
             }

             #invoice .service {
                 border-bottom: 1px; solid #eee;
             }

             #invoice .item-tex{
               font-size: 0.5em;
             }

             #invoice .legalcopy{
              margin-top: 5mm;
              text-align: center;
             }

             .serial-number{
               margin-top: 5mm;
            margin-bottom: 2mm;
            text-align: center;
            font-size:12px;
             }

             .serial{
                font-size: 10px !important;
             }
        </style>

