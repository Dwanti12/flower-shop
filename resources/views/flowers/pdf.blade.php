<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Data Bunga</title>
    <style>
        /* ===== RESET & BASE ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', 'Helvetica', sans-serif;
            font-size: 11px;
            line-height: 1.5;
            color: #2d3436;
            padding: 20px;
        }

        /* ===== HEADER ===== */
        .header {
            text-align: center;
            border-bottom: 3px double #2d3436;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .header .company-name {
            font-size: 20px;
            font-weight: 700;
            letter-spacing: 3px;
            color: #1a1a2e;
            text-transform: uppercase;
        }

        .header .company-sub {
            font-size: 11px;
            color: #6c757d;
            letter-spacing: 2px;
            margin-top: 3px;
        }

        .header .report-title {
            font-size: 16px;
            font-weight: 600;
            color: #1a1a2e;
            margin-top: 12px;
            letter-spacing: 1px;
        }

        .header .report-meta {
            font-size: 10px;
            color: #6c757d;
            margin-top: 5px;
        }

        .header .divider {
            width: 60px;
            height: 2px;
            background: #2d3436;
            margin: 8px auto 0;
        }

        /* ===== TABLE ===== */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            font-size: 10.5px;
        }

        table thead th {
            background: #2d3436;
            color: #ffffff;
            padding: 8px 10px;
            text-align: left;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 9.5px;
            letter-spacing: 0.5px;
            border: 1px solid #2d3436;
        }

        table tbody td {
            padding: 7px 10px;
            border: 1px solid #dfe6e9;
            vertical-align: middle;
        }

        table tbody tr:nth-child(even) {
            background: #f8f9fa;
        }

        table tbody tr:hover {
            background: #e9ecef;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .font-bold {
            font-weight: 600;
        }

        .text-muted {
            color: #6c757d;
        }

        /* ===== TABLE FOOTER ===== */
        .table-footer {
            margin-top: 10px;
            text-align: right;
            font-size: 10px;
            color: #6c757d;
        }

        /* ===== FOOTER ===== */
        .footer {
            margin-top: 25px;
            padding-top: 15px;
            border-top: 1px solid #dfe6e9;
            text-align: center;
            font-size: 9.5px;
            color: #6c757d;
        }

        .footer .footer-line {
            letter-spacing: 1px;
        }

        /* ===== STAMP / SIGNATURE ===== */
        .signature {
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
            font-size: 10px;
        }

        .signature .sign-box {
            text-align: center;
            width: 45%;
        }

        .signature .sign-line {
            border-top: 1px solid #2d3436;
            width: 80%;
            margin: 30px auto 5px;
        }

        /* ===== PRINT OPTIMIZATION ===== */
        @page {
            margin: 15px 20px;
        }

        @media print {
            body {
                padding: 0;
            }
            .no-print {
                display: none;
            }
        }

        /* ===== UTILITY ===== */
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        .pull-left {
            float: left;
        }

        .pull-right {
            float: right;
        }

        .mb-5 {
            margin-bottom: 5px;
        }

        .mt-10 {
            margin-top: 10px;
        }

        .text-uppercase {
            text-transform: uppercase;
        }

        /* ===== WATERMARK ===== */
        .watermark {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-30deg);
            font-size: 80px;
            opacity: 0.03;
            pointer-events: none;
            z-index: 0;
            font-weight: 700;
            color: #2d3436;
            letter-spacing: 10px;
        }

        .content {
            position: relative;
            z-index: 1;
        }
    </style>
</head>
<body>
    <!-- WATERMARK -->
    <div class="watermark">FLOWER SHOP</div>

    <div class="content">
        <!-- ===== HEADER ===== -->
        <div class="header">
            <div class="company-name">Flower Shop</div>
            <div class="company-sub">SISTEM MANAJEMEN TOKO BUNGA</div>
            <div class="divider"></div>
            <div class="report-title">LAPORAN DATA BUNGA</div>
            <div class="report-meta">
                Dicetak pada: {{ date('d F Y H:i:s') }}
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table>
            <thead>
                <tr>
                    <th style="width: 5%; text-align: center;">No</th>
                    <th style="width: 15%;">Kode Bunga</th>
                    <th style="width: 20%;">Nama Bunga</th>
                    <th style="width: 15%;">Kategori</th>
                    <th style="width: 18%; text-align: right;">Harga</th>
                    <th style="width: 10%; text-align: center;">Stok</th>
                    <th style="width: 17%;">Tanggal Masuk</th>
                </tr>
            </thead>
            <tbody>
                @forelse($flowers as $index => $flower)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td><span class="font-bold">{{ $flower->kode_bunga }}</span></td>
                    <td>{{ $flower->nama_bunga }}</td>
                    <td>{{ $flower->kategori }}</td>
                    <td class="text-right">Rp {{ number_format($flower->harga, 0, ',', '.') }}</td>
                    <td class="text-center">{{ $flower->stok }}</td>
                    <td>{{ $flower->tanggal_masuk->format('d/m/Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center" style="padding: 30px 0; color: #6c757d;">
                        Tidak ada data bunga
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- ===== TABLE FOOTER ===== -->
        <div class="table-footer">
            <span class="font-bold">Total Data:</span> {{ $flowers->count() }} record
        </div>

       <!-- ===== SIGNATURE ===== -->
<div class="signature" style="text-align: right;">
    <div class="sign-box" style="display: inline-block;">
        <div class="sign-line"></div>
        <div class="text-muted" style="font-size: 9px;">Mengetahui,</div>
        <div class="font-bold" style="font-size: 11px; margin-top: 3px;">Pemilik Toko</div>
        <div style="font-size: 9px; color: #6c757d; margin-top: 2px;">( _________________ )</div>
    </div>
</div>

        <!-- ===== FOOTER ===== -->
        <div class="footer">
            <div class="footer-line">
                Laporan ini dicetak secara otomatis dari sistem
            </div>
            <div style="margin-top: 3px;">
                &copy; {{ date('Y') }} Flower Shop - All Rights Reserved
            </div>
            <div style="margin-top: 3px; font-size: 8px; color: #b2bec3;">
                Document generated on {{ date('Y-m-d H:i:s') }} | Page 1/1
            </div>
        </div>
    </div>
</body>
</html>