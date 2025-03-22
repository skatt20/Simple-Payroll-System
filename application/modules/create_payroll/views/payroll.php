<html>

<head>
    <style type="text/css">
        /**{font-size: 10px;border:1px border black;}*/
        thead:before,
        thead:after {
            display: none;
        }

        tbody:before,
        tbody:after {
            display: none;
        }

        body {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        @page {
            size: letter !important;
            /*or width x height 150mm 50mm*/
        }

        /*           div#timesheet  {
                -webkit-transform: rotate(270deg);
                -moz-transform: rotate(270deg);
                -o-transform: rotate(270deg);
                -ms-transform: rotate(270deg);
                transform: rotate(270deg);
            }*/

        form {
            margin-right: -5px;
            margin-left: -5px;
        }

        .title {
            font-size: 25px !important;
            font-weight: 900;
            color: #192092;
            text-align: center;
        }

        .subtitle {
            font-size: 20px !important;
            font-weight: 600;
            font-family: gilroy-regular;
            text-align: center;
        }

        .signature-pad {
            position: absolute;
            left: 0;
            top: 0;
            width: 250px;
            height: 195px;
            background-color: white;
        }

        .signwrapper {
            position: relative;
            width: 252px;
            height: 200px;
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: 1px solid black;
            float: left;
        }

        i.fa.fa-exclamation-circle {
            display: none;
        }

        .text-danger {
            color: #dc3545 !important;
            display: inline-block;
        }

        .submit {
            float: right;
            background-color: red;
        }

        .buttonSignature {
            display: inline-block;
            margin-top: 5%;
        }

        /* Enrollment Agreement */
        .address1 {
            float: left;
            width: 50%;
            text-align: center;
        }

        .address2 {
            float: right;
            width: 50%;
            text-align: center;
        }

        table,
        td,
        th {
            border: 1px solid black;
            padding: 1%;
        }

        th {
            display: table-cell;
            vertical-align: inherit;
            font-weight: bold;
            text-align: -internal-center;
            background-color: gray;
            color: black;
        }

        ul {
            list-style-type: square;
            list-style-position: inside;
            margin: 0;
            padding: 0;
        }

        .inputline {
            background: transparent;
            border: none;
            border-bottom: 1px solid #000000;
        }

        input[type="checkbox" i] {
            background-color: initial;
            cursor: default;
            appearance: auto;
            box-sizing: border-box;
            margin: 3px 3px 3px 4px;
            padding: initial;
            border: initial;
        }

        .row {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -7.5px;
            margin-left: -7.5px;
        }

        span,
        p,
        li,
        label {
            font-size: 14px !important;
        }

        .logo {
            margin-left: auto !important;
            margin-right: auto !important;
            /*display: block !important;*/
        }

        .column {
            display: inline-block;
            vertical-align: top;
            /* Align columns from top */
            box-sizing: border-box;
            /* Include padding and border in width */
            padding: 0 10px;
            /* Add space between columns */
            width: 33.33%;
        }
    </style>
</head>

<body>
    <!--1st Page -->
    <div style="width: 99.5%; position: relative; margin-top: 20px; page-break-after: always;">
        <p class="title"> Buyer Created Tax Invoice </p>
        <br>
        <div>
            <span style="float: left;"> <b>Sales Representative: <?php echo (!empty($pdfname) ? $pdfname : '-'); ?> </b></span>
            <span style="float: right;">
                <b>
                    <?php echo (!empty($month) ? $month : '-'); ?>/<?php echo (!empty($year) ? $year : '-'); ?>/<?php echo (!empty($week) ? $week : '-'); ?>
                </b>
            </span>
        </div>
        <br>
        <br>

        <div>
            <div class="column" style="width: 33.33%;">
                <div><u><b>Produced on :</b></u></div>
                <div><?php echo (!empty($month) ? $month : '-'); ?>/<?php echo (!empty($year) ? $year : '-'); ?>/<?php echo (!empty($week) ? $week : '-'); ?></div>
                <div>Sumit Monga</div>
                <div>1C/39 Mackelvie street,</div>
                <div>grey lynn, 1021, Auckland</div>
            </div>

            <div class="column" style="width: 33.33%;">
                <center>
                    <div><u><b>Produced by :</b></u></div>
                    <div>Onlineinsure payroll system</div>
                    <div>Sample Location</div>
                    <div>1021 Auckland New Zealand</div>
                    <div>+6493789676 - test number</div>
                    <div>weblink sample</div>
                </center>
            </div>

            <div class="column" style="width: 33.33%;">
                <div><u><b>Statement Week :</b></u> <?php echo rand(100000, 999999); ?></div>
                <div><u><b>Statement Date :</b></u> <?php echo (!empty($month) ? $month : '-'); ?>/<?php echo (!empty($year) ? $year : '-'); ?>/<?php echo (!empty($week) ? $week : '-'); ?></div>
                <div><u><b>Payment Type :</b></u> Direct Credit</div>
                <div><u><b>Termination Date :</b></u> </div>
                <div><u><b>IRD :</b></u> <?php echo rand(100000000, 999999999); ?></div>
            </div>
        </div>

        <table border="0" cellspacing="0" width="100%">
            <tbody>
                <tr>
                    <td>Date</td>
                    <td>Description</td>
                    <td>Credit</td>
                </tr>

                <tr>
                    <td><?php echo (!empty($month) ? $month : '-'); ?>/<?php echo (!empty($year) ? $year : '-'); ?>/<?php echo (!empty($week) ? $week : '-'); ?></td>
                    <td>Commission</td>
                    <td>$ <?php echo (!empty($clientCommissions[0]) ? $clientCommissions[0] : '-'); ?></td> <!-- the commision here should % of the table below -->
                </tr>

                <?php for ($i = 1; $i < count($clientCommissions); $i++) : ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>$ <?php echo (!empty($clientCommissions[$i]) ? $clientCommissions[$i] : '-'); ?></td>
                    </tr>
                <?php endfor; ?>
                <tr>
                    <td><?php echo (!empty($month) ? $month : '-'); ?>/<?php echo (!empty($year) ? $year : '-'); ?>/<?php echo (!empty($week) ? $week : '-'); ?></td>
                    <td>Bonuses</td>
                    <td>$ <?php echo (!empty($bonuses) ? $bonuses : '-'); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>$ <?php echo (!empty($totalAmount) ? $totalAmount : '-'); ?></td>
                </tr>
            </tbody>
        </table>

        <!-- Update the second table to display sales representative data -->
        <!-- this table is from sales_rep_profile table -->
        <table border="0" cellspacing="0" width="100%">
            <tbody>
                <tr>
                    <td>Sales Representative</td>
                    <td>Description</td>
                    <td>Credit</td>
                </tr>

                <?php
                $totalCommission = array_sum($clientCommissions); // Calculate the total commission from the first table
                ?>

                <?php foreach ($salesRepData as $rep) : ?>
                    <?php if ($rep['sales_rep_name'] == $pdfname) : ?>
                        <tr>
                            <td><?php echo $rep['sales_rep_name']; ?></td>
                            <td>Commission - $ <?php echo number_format($totalCommission, 2); ?> <b>%<?php echo $rep['sales_rep_com_per']; ?></b></td>
                            <td>
                                <?php
                                $commissionPercentage = $rep['sales_rep_com_per']; // Assuming sales_rep_com_per is in percentage (e.g., 60 for 60%)
                                $commissionAmount = $totalCommission * $commissionPercentage / 100;
                                echo '$ ' . number_format($commissionAmount, 2);
                                ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>


                <?php foreach ($salesRepData as $rep) : ?>
                    <?php if ($rep['sales_rep_name'] == $pdfname) : ?>
                        <tr>
                            <td></td>
                            <td>Tax - <?php
                                        $commissionPercentage = $rep['sales_rep_com_per']; // Assuming sales_rep_com_per is in percentage (e.g., 60 for 60%)
                                        $commissionAmount = $totalCommission * $commissionPercentage / 100;
                                        echo '$ ' . number_format($commissionAmount, 2);
                                        ?> <b>% <?php echo $rep['sales_rep_tax_rate']; ?></b></td>
                            <td>
                                <?php
                                $commissionPercentage = $rep['sales_rep_com_per']; // Assuming sales_rep_com_per is in percentage (e.g., 60 for 60%)
                                $commissionAmount = $totalCommission * $commissionPercentage / 100;
                                $taxRate = $rep['sales_rep_tax_rate']; // Assuming sales_rep_tax_rate is in percentage (e.g., 5 for 5%)
                                $taxAmount = $commissionAmount * ($taxRate / 100); // Calculate the tax amount based on the commission amount and tax rate
                                $totalAmount = $commissionAmount - $taxAmount; // Calculate the total amount after deducting tax
                                echo '$ ' . number_format($taxAmount, 2); // Display the tax amount
                                ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>

                <?php foreach ($salesRepData as $rep) : ?>
                    <?php if ($rep['sales_rep_name'] == $pdfname) : ?>
                        <tr>
                            <td></td>
                            <td><b>Payment Amount</b></td>
                            <td>
                                <?php
                                $commissionPercentage = $rep['sales_rep_com_per']; // Assuming sales_rep_com_per is in percentage (e.g., 60 for 60%)
                                $commissionAmount = $totalCommission * $commissionPercentage / 100;
                                $taxRate = $rep['sales_rep_tax_rate']; // Assuming sales_rep_tax_rate is in percentage (e.g., 5 for 5%)
                                $taxAmount = $commissionAmount * ($taxRate / 100); // Calculate the tax amount based on the commission amount and tax rate
                                $totalAmount = $commissionAmount - $taxAmount; // Calculate the total amount after deducting tax
                                echo '$ ' . number_format($totalAmount, 2);
                                ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>



                <?php foreach ($salesRepData as $rep) : ?>
                    <?php if ($rep['sales_rep_name'] == $pdfname) : ?>
                        <tr>
                            <td></td>
                            <td>Bonus - $ <?php echo $rep['sales_rep_bonuses']; ?> + $ <?php echo (!empty($bonuses) ? $bonuses : '-'); ?></td>
                            <td>
                                <?php
                                $bonusAmount = $rep['sales_rep_bonuses']; // Bonus amount from sales_rep_bonuses
                                $additionalBonus = (!empty($bonuses) ? $bonuses : 0); // Additional bonus from form input
                                $totalBonus = $bonusAmount + $additionalBonus; // Calculate total bonus
                                echo '$ ' . number_format($totalBonus, 2); // Display total bonus
                                ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>

                <tr>
                    <td></td>
                    <td>Total</td>
                    <td>
                        <b>
                            <?php
                            $commissionPercentage = $rep['sales_rep_com_per']; // Assuming sales_rep_com_per is in percentage (e.g., 60 for 60%)
                            $commissionAmount = $totalCommission * $commissionPercentage / 100;
                            $taxRate = $rep['sales_rep_tax_rate']; // Assuming sales_rep_tax_rate is in percentage (e.g., 5 for 5%)
                            $taxAmount = $commissionAmount * ($taxRate / 100); // Calculate the tax amount based on the commission amount and tax rate
                            $totalAmount = $commissionAmount - $taxAmount; // Calculate the total amount after deducting tax

                            $bonusAmount = $rep['sales_rep_bonuses']; // Bonus amount from sales_rep_bonuses
                            $additionalBonus = (!empty($bonuses) ? $bonuses : 0); // Additional bonus from form input
                            $totalBonus = $bonusAmount + $additionalBonus; // Calculate total bonus

                            $totalPayment = $totalAmount + $totalBonus; // Calculate the total payment (sum of total amount and total bonus)
                            echo '$ ' . number_format($totalPayment, 2); // Display the total payment
                            ?>

                        </b>
                    </td>
                </tr>



            </tbody>
        </table>















    </div>

    <!--2nd Page -->
    <div style="width: 99.5%; position: relative; margin-top: 20px; page-break-after: always;">
        <p class="title">Detail Commission Statement</p>
        <br>
        <div>
            <span style="float: left;"> <b>Sales Representative: <?php echo (!empty($pdfname) ? $pdfname : '-'); ?> </b></span>
            <span style="float: right;">
                <b>
                    <?php echo (!empty($month) ? $month : '-'); ?>/<?php echo (!empty($year) ? $year : '-'); ?>/<?php echo (!empty($week) ? $week : '-'); ?>
                </b>
            </span>
        </div>


        <br>
        <div>
            <span style="float: left;"> <b>Production</b></span>
        </div>
        <br>
        <br>

        <div>
            <div class="column" style="width: 33.33%;">
                <div><u><b>Client Name</b></u></div>
                <?php foreach ($clientNames as $clientName) : ?>
                    <div> <?php echo (!empty($clientName) ? $clientName : '-'); ?> </div>
                <?php endforeach; ?>
            </div>

            <div class="column" style="width: 33.33%;">
                <div><u><b>Comission</b></u></div>
                <?php foreach ($clientCommissions as $clientCommission) : ?>
                    <div> <?php echo (!empty($clientCommission) ? $clientCommission : '-'); ?> </div>
                <?php endforeach; ?>
            </div>

            <div class="column" style="width: 33.33%;">
                <div><u><b>Balance</b></u></div>
                <?php foreach ($clientCommissions as $clientCommission) : ?>
                    <div> <?php echo (!empty($clientCommission) ? $clientCommission : '-'); ?> </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div>
            <div class="column" style="width: 33.33%;">
                <div><b>Total</b></div>
            </div>

            <div class="column" style="width: 33.33%;">
                <div><u><b><?php echo (!empty($totalCommission) ? $totalCommission : '-'); ?></b></u></div>
            </div>

            <div class="column" style="width: 33.33%;">
                <div><u><b><?php echo (!empty($totalCommission) ? $totalCommission : '-'); ?></b></u></div>
            </div>
        </div>



    </div>



</body>

</html>