<style>
        body {
            background: #eef0f4;
        }

        #previewDoc {
            background: #fff;
            width: 21cm;
            min-height: 29.7cm;
            padding: 40px 50px;
            margin: auto;
            border: 1px solid #ddd;
            box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.08);
            font-size: 14px;
            line-height: 1.6;
        }

        #previewDoc strong {
            font-weight: 600;
        }

        .title {
            font-size: 20px;
            font-weight: bold;
            text-transform: uppercase;
            text-align: center;
        }

        .sidebar {
            height: 100vh;
            overflow-y: auto;
            border-left: 3px solid #ddd;
            background: #fafafa;
        }

        #previewDoc,
        #previewDocPage2 {
            background-image: url('{{ asset('master.jpg') }}');
            background-color: white; /* fallback */
            background-position: top center;
            background-repeat: no-repeat;
            background-size: 100% auto;
            position: relative;
            display: block;
            min-height: 29.7cm;
        }

        .pdf-page {
        width: 21cm;
        min-height: 29.7cm;
        page-break-after: always;
        }

        .pdf-page:last-child {
            page-break-after: auto;
        }
    </style>
