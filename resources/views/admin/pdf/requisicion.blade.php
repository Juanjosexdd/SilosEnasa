<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ENASA | REQUISICIÓN {{$requisicion->correlativo}}</title>
    <link rel="stylesheet" href="adminlte.min.css">
    <link rel="stylesheet" href="estilosrequisicion.css">
    <style>
        html {
            font-family: Calibri, Arial, Helvetica, sans-serif;
            font-size: 11pt;
            background-color: white
        }

        a.comment-indicator:hover+div.comment {
            background: #ffd;
            position: absolute;
            display: block;
            border: 1px solid black;
            padding: 0.5em
        }

        a.comment-indicator {
            background: red;
            display: inline-block;
            border: 1px solid black;
            width: 0.5em;
            height: 0.5em
        }

        div.comment {
            display: none
        }

        table {
            border-collapse: collapse;
            page-break-after: always
        }

        .gridlines td {
            border: 1px dotted black
        }

        .gridlines th {
            border: 1px dotted black
        }

        .b {
            text-align: center
        }

        .e {
            text-align: center
        }

        .f {
            text-align: right
        }

        .inlineStr {
            text-align: left
        }

        .n {
            text-align: right
        }

        .s {
            text-align: left
        }

        td.style0 {
            vertical-align: bottom;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        th.style0 {
            vertical-align: bottom;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Calibri';
            font-size: 11pt;
            background-color: white
        }

        td.style1 {
            vertical-align: bottom;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 10pt;
            background-color: white
        }

        th.style1 {
            vertical-align: bottom;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 10pt;
            background-color: white
        }

        td.style2 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            font-weight: bold;
            font-style: italic;
            color: #000000;
            font-family: 'Bookman Old Style';
            font-size: 10pt;
            background-color: white
        }

        th.style2 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            font-weight: bold;
            font-style: italic;
            color: #000000;
            font-family: 'Bookman Old Style';
            font-size: 10pt;
            background-color: white
        }

        td.style3 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 14pt;
            background-color: white
        }

        th.style3 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 14pt;
            background-color: white
        }

        td.style4 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 14pt;
            background-color: white
        }

        th.style4 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 14pt;
            background-color: white
        }

        td.style5 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 14pt;
            background-color: white
        }

        th.style5 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 14pt;
            background-color: white
        }

        td.style6 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 14pt;
            background-color: white
        }

        th.style6 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 14pt;
            background-color: white
        }

        td.style7 {
            vertical-align: bottom;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 10pt;
            background-color: #FFFF00
        }

        th.style7 {
            vertical-align: bottom;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 10pt;
            background-color: #FFFF00
        }

        td.style8 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        th.style8 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        td.style9 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        th.style9 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        td.style10 {
            vertical-align: middle;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        th.style10 {
            vertical-align: middle;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        td.style11 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 10pt;
            background-color: white
        }

        th.style11 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 10pt;
            background-color: white
        }

        td.style12 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 10pt;
            background-color: white
        }

        th.style12 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 10pt;
            background-color: white
        }

        td.style13 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            font-style: italic;
            color: #000000;
            font-family: 'Bookman Old Style';
            font-size: 10pt;
            background-color: white
        }

        th.style13 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            font-style: italic;
            color: #000000;
            font-family: 'Bookman Old Style';
            font-size: 10pt;
            background-color: white
        }

        td.style14 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            font-style: italic;
            color: #000000;
            font-family: 'Bookman Old Style';
            font-size: 10pt;
            background-color: white
        }

        th.style14 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            font-style: italic;
            color: #000000;
            font-family: 'Bookman Old Style';
            font-size: 10pt;
            background-color: white
        }

        td.style15 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style15 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style16 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style16 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style17 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style17 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style18 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style18 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style19 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style19 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style20 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style20 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style21 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style21 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style22 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style22 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style23 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style23 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style24 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style24 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style25 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style25 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style26 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style26 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style27 {
            vertical-align: middle;
            text-align: left;
            padding-left: 0px;
            border-bottom: 1px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style27 {
            vertical-align: middle;
            text-align: left;
            padding-left: 0px;
            border-bottom: 1px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style28 {
            vertical-align: middle;
            text-align: left;
            padding-left: 0px;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style28 {
            vertical-align: middle;
            text-align: left;
            padding-left: 0px;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style29 {
            vertical-align: middle;
            text-align: left;
            padding-left: 0px;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style29 {
            vertical-align: middle;
            text-align: left;
            padding-left: 0px;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style30 {
            vertical-align: middle;
            text-align: left;
            padding-left: 0px;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: #FFFFFF
        }

        th.style30 {
            vertical-align: middle;
            text-align: left;
            padding-left: 0px;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: #FFFFFF
        }

        td.style31 {
            vertical-align: middle;
            text-align: left;
            padding-left: 0px;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style31 {
            vertical-align: middle;
            text-align: left;
            padding-left: 0px;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style32 {
            vertical-align: middle;
            text-align: left;
            padding-left: 0px;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #FF0000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style32 {
            vertical-align: middle;
            text-align: left;
            padding-left: 0px;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #FF0000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style33 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        th.style33 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        td.style34 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        th.style34 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        td.style35 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        th.style35 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        td.style36 {
            vertical-align: top;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 14pt;
            background-color: white
        }

        th.style36 {
            vertical-align: top;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 14pt;
            background-color: white
        }

        td.style37 {
            vertical-align: top;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 14pt;
            background-color: white
        }

        th.style37 {
            vertical-align: top;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 14pt;
            background-color: white
        }

        td.style38 {
            vertical-align: top;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 14pt;
            background-color: white
        }

        th.style38 {
            vertical-align: top;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 14pt;
            background-color: white
        }

        td.style39 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        th.style39 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        td.style40 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        th.style40 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        td.style41 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        th.style41 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        td.style42 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            font-weight: bold;
            color: #0000FF;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style42 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            font-weight: bold;
            color: #0000FF;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style43 {
            vertical-align: top;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 8pt;
            background-color: white
        }

        th.style43 {
            vertical-align: top;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 8pt;
            background-color: white
        }

        td.style44 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #0000FF;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style44 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #0000FF;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style45 {
            vertical-align: top;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 8pt;
            background-color: white
        }

        th.style45 {
            vertical-align: top;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 8pt;
            background-color: white
        }

        td.style46 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        th.style46 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        td.style47 {
            vertical-align: top;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        th.style47 {
            vertical-align: top;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        td.style48 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        th.style48 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        td.style49 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        th.style49 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        td.style50 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        th.style50 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        td.style51 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        th.style51 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        td.style52 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        th.style52 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        td.style53 {
            vertical-align: top;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 8pt;
            background-color: white
        }

        th.style53 {
            vertical-align: top;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 8pt;
            background-color: white
        }

        td.style54 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style54 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style55 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style55 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style56 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style56 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style57 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style57 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style58 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style58 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style59 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style59 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style60 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style60 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style61 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style61 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style62 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style62 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style63 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style63 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style64 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style64 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style65 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style65 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style66 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style66 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style67 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style67 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style68 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            font-style: italic;
            color: #000000;
            font-family: 'Bookman Old Style';
            font-size: 11pt;
            background-color: white
        }

        th.style68 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            font-style: italic;
            color: #000000;
            font-family: 'Bookman Old Style';
            font-size: 11pt;
            background-color: white
        }

        td.style69 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            font-weight: bold;
            font-style: italic;
            color: #000000;
            font-family: 'Bookman Old Style';
            font-size: 11pt;
            background-color: white
        }

        th.style69 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            font-weight: bold;
            font-style: italic;
            color: #000000;
            font-family: 'Bookman Old Style';
            font-size: 11pt;
            background-color: white
        }

        td.style70 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            font-style: italic;
            color: #000000;
            font-family: 'Bookman Old Style';
            font-size: 11pt;
            background-color: white
        }

        th.style70 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            font-style: italic;
            color: #000000;
            font-family: 'Bookman Old Style';
            font-size: 11pt;
            background-color: white
        }

        td.style71 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style71 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style72 {
            vertical-align: top;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style72 {
            vertical-align: top;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style73 {
            vertical-align: top;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style73 {
            vertical-align: top;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style74 {
            vertical-align: top;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style74 {
            vertical-align: top;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style75 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 1px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style75 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 1px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style76 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style76 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style77 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style77 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style78 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style78 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style79 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style79 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style80 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style80 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style81 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style81 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style82 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style82 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style83 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style83 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style84 {
            vertical-align: top;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 8pt;
            background-color: white
        }

        th.style84 {
            vertical-align: top;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 8pt;
            background-color: white
        }

        td.style85 {
            vertical-align: top;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 8pt;
            background-color: white
        }

        th.style85 {
            vertical-align: top;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 8pt;
            background-color: white
        }

        td.style86 {
            vertical-align: top;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 8pt;
            background-color: white
        }

        th.style86 {
            vertical-align: top;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 8pt;
            background-color: white
        }

        td.style87 {
            vertical-align: top;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 8pt;
            background-color: white
        }

        th.style87 {
            vertical-align: top;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 8pt;
            background-color: white
        }

        td.style88 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 1px solid #333333 !important;
            font-weight: bold;
            text-decoration: underline;
            font-style: italic;
            color: #000000;
            font-family: 'Arial';
            font-size: 18pt;
            background-color: white
        }

        th.style88 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 1px solid #333333 !important;
            font-weight: bold;
            text-decoration: underline;
            font-style: italic;
            color: #000000;
            font-family: 'Arial';
            font-size: 18pt;
            background-color: white
        }

        td.style89 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 1px solid #333333 !important;
            border-right: 1px solid #333333 !important;
            font-weight: bold;
            text-decoration: underline;
            font-style: italic;
            color: #000000;
            font-family: 'Arial';
            font-size: 18pt;
            background-color: white
        }

        th.style89 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 1px solid #333333 !important;
            border-right: 1px solid #333333 !important;
            font-weight: bold;
            text-decoration: underline;
            font-style: italic;
            color: #000000;
            font-family: 'Arial';
            font-size: 18pt;
            background-color: white
        }

        td.style90 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 1px solid #333333 !important;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            text-decoration: underline;
            font-style: italic;
            color: #000000;
            font-family: 'Arial';
            font-size: 18pt;
            background-color: white
        }

        th.style90 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 1px solid #333333 !important;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            text-decoration: underline;
            font-style: italic;
            color: #000000;
            font-family: 'Arial';
            font-size: 18pt;
            background-color: white
        }

        td.style91 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #0000FF;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style91 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #0000FF;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style92 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            font-weight: bold;
            color: #0000FF;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style92 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            font-weight: bold;
            color: #0000FF;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style93 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #0000FF;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style93 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #0000FF;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style94 {
            vertical-align: top;
            text-align: justify;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style94 {
            vertical-align: top;
            text-align: justify;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style95 {
            vertical-align: top;
            text-align: justify;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style95 {
            vertical-align: top;
            text-align: justify;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style96 {
            vertical-align: top;
            text-align: justify;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style96 {
            vertical-align: top;
            text-align: justify;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style97 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style97 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style98 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style98 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style99 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style99 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style100 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style100 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style101 {
            vertical-align: top;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 8pt;
            background-color: white
        }

        th.style101 {
            vertical-align: top;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 8pt;
            background-color: white
        }

        td.style102 {
            vertical-align: top;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 8pt;
            background-color: white
        }

        th.style102 {
            vertical-align: top;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 8pt;
            background-color: white
        }

        td.style103 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style103 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style104 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style104 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style105 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style105 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style106 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style106 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style107 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style107 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style108 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style108 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style109 {
            vertical-align: top;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 8pt;
            background-color: white
        }

        th.style109 {
            vertical-align: top;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 8pt;
            background-color: white
        }

        td.style110 {
            vertical-align: top;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 8pt;
            background-color: white
        }

        th.style110 {
            vertical-align: top;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 8pt;
            background-color: white
        }

        td.style111 {
            vertical-align: top;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 8pt;
            background-color: white
        }

        th.style111 {
            vertical-align: top;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 8pt;
            background-color: white
        }

        td.style112 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: 1px solid #333333 !important;
            font-weight: bold;
            text-decoration: underline;
            font-style: italic;
            color: #000000;
            font-family: 'Arial';
            font-size: 18pt;
            background-color: white
        }

        th.style112 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: 1px solid #333333 !important;
            font-weight: bold;
            text-decoration: underline;
            font-style: italic;
            color: #000000;
            font-family: 'Arial';
            font-size: 18pt;
            background-color: white
        }

        td.style113 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style113 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style114 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style114 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style115 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style115 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style116 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style116 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style117 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style117 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style118 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style118 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style119 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style119 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style120 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style120 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style121 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style121 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style122 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style122 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style123 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style123 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style124 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style124 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style125 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style125 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style126 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style126 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style127 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style127 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style128 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style128 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style129 {
            vertical-align: top;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        th.style129 {
            vertical-align: top;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        td.style130 {
            vertical-align: top;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        th.style130 {
            vertical-align: top;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        td.style131 {
            vertical-align: top;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        th.style131 {
            vertical-align: top;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        td.style132 {
            vertical-align: top;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        th.style132 {
            vertical-align: top;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        td.style133 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        th.style133 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        td.style134 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        th.style134 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #000000 !important;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        td.style135 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        th.style135 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        td.style136 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        th.style136 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        td.style137 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        th.style137 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        td.style138 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        th.style138 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        td.style139 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            font-style: italic;
            color: #000000;
            font-family: 'Arial';
            font-size: 16pt;
            background-color: #A5A5A5
        }

        th.style139 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            font-style: italic;
            color: #000000;
            font-family: 'Arial';
            font-size: 16pt;
            background-color: #A5A5A5
        }

        td.style140 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: none #000000;
            font-weight: bold;
            font-style: italic;
            color: #000000;
            font-family: 'Arial';
            font-size: 16pt;
            background-color: #A5A5A5
        }

        th.style140 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: none #000000;
            font-weight: bold;
            font-style: italic;
            color: #000000;
            font-family: 'Arial';
            font-size: 16pt;
            background-color: #A5A5A5
        }

        td.style141 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            font-style: italic;
            color: #000000;
            font-family: 'Arial';
            font-size: 16pt;
            background-color: #A5A5A5
        }

        th.style141 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            font-style: italic;
            color: #000000;
            font-family: 'Arial';
            font-size: 16pt;
            background-color: #A5A5A5
        }

        td.style142 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        th.style142 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        td.style143 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        th.style143 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: 2px solid #000000 !important;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        td.style144 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        th.style144 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        td.style145 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        th.style145 {
            vertical-align: middle;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        td.style146 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #0000FF;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style146 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #0000FF;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style147 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            font-weight: bold;
            color: #0000FF;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style147 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            font-weight: bold;
            color: #0000FF;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style148 {
            vertical-align: top;
            text-align: justify;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        th.style148 {
            vertical-align: top;
            text-align: justify;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        td.style149 {
            vertical-align: top;
            text-align: justify;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        th.style149 {
            vertical-align: top;
            text-align: justify;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: none #000000;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        td.style150 {
            vertical-align: top;
            text-align: justify;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        th.style150 {
            vertical-align: top;
            text-align: justify;
            border-bottom: 2px solid #000000 !important;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        td.style151 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        th.style151 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: none #000000;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        td.style152 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        th.style152 {
            vertical-align: bottom;
            text-align: center;
            border-bottom: none #000000;
            border-top: none #000000;
            border-left: none #000000;
            border-right: 2px solid #000000 !important;
            font-weight: bold;
            color: #000000;
            font-family: 'Arial';
            font-size: 12pt;
            background-color: white
        }

        td.style153 {
            vertical-align: middle;
            text-align: left;
            padding-left: 0px;
            border-bottom: 1px solid #000000 !important;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style153 {
            vertical-align: middle;
            text-align: left;
            padding-left: 0px;
            border-bottom: 1px solid #000000 !important;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        td.style154 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        th.style154 {
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #000000 !important;
            border-top: none #000000;
            border-left: 2px solid #000000 !important;
            border-right: 2px solid #000000 !important;
            color: #000000;
            font-family: 'Arial';
            font-size: 11pt;
            background-color: white
        }

        table.sheet0 col.col0 {
            width: 161.98888703pt
        }

        table.sheet0 col.col1 {
            width: 272.46666354pt
        }

        table.sheet0 col.col2 {
            width: 77.26666578pt
        }

        table.sheet0 col.col3 {
            width: 132.84444292pt
        }

        table.sheet0 col.col4 {
            width: 54.2222216pt
        }

        table.sheet0 tr {
            height: 15pt
        }

        table.sheet0 tr.row0 {
            height: 36pt
        }

        table.sheet0 tr.row1 {
            height: 10.5pt
        }

        table.sheet0 tr.row2 {
            height: 36pt
        }

        table.sheet0 tr.row3 {
            height: 59.25pt
        }

        table.sheet0 tr.row4 {
            height: 15pt
        }

        table.sheet0 tr.row5 {
            height: 46.5pt
        }

        table.sheet0 tr.row6 {
            height: 22.5pt
        }

        table.sheet0 tr.row7 {
            height: 22.5pt
        }

        table.sheet0 tr.row8 {
            height: 22.5pt
        }

        table.sheet0 tr.row9 {
            height: 22.5pt
        }

        table.sheet0 tr.row10 {
            height: 22.5pt
        }

        table.sheet0 tr.row11 {
            height: 22.5pt
        }

        table.sheet0 tr.row12 {
            height: 22.5pt
        }

        table.sheet0 tr.row13 {
            height: 22.5pt
        }

        table.sheet0 tr.row14 {
            height: 22.5pt
        }

        table.sheet0 tr.row15 {
            height: 18pt
        }

        table.sheet0 tr.row16 {
            height: 22.5pt
        }

        table.sheet0 tr.row17 {
            height: 22.5pt
        }

        table.sheet0 tr.row18 {
            height: 22.5pt
        }

        table.sheet0 tr.row19 {
            height: 22.5pt
        }

        table.sheet0 tr.row20 {
            height: 22.5pt
        }

        table.sheet0 tr.row21 {
            height: 22.5pt
        }

        table.sheet0 tr.row22 {
            height: 22.5pt
        }

        table.sheet0 tr.row23 {
            height: 22.5pt
        }

        table.sheet0 tr.row24 {
            height: 22.5pt
        }

        table.sheet0 tr.row25 {
            height: 22.5pt;
            display: none;
            visibility: hidden
        }

        table.sheet0 tr.row26 {
            height: 22.5pt;
            display: none;
            visibility: hidden
        }

        table.sheet0 tr.row27 {
            height: 22.5pt;
            display: none;
            visibility: hidden
        }

        table.sheet0 tr.row28 {
            height: 22.5pt;
            display: none;
            visibility: hidden
        }

        table.sheet0 tr.row29 {
            height: 22.5pt;
            display: none;
            visibility: hidden
        }

        table.sheet0 tr.row30 {
            height: 22.5pt;
            display: none;
            visibility: hidden
        }

        table.sheet0 tr.row31 {
            height: 22.5pt;
            display: none;
            visibility: hidden
        }

        table.sheet0 tr.row32 {
            height: 22.5pt;
            display: none;
            visibility: hidden
        }

        table.sheet0 tr.row33 {
            height: 22.5pt;
            display: none;
            visibility: hidden
        }

        table.sheet0 tr.row34 {
            height: 22.5pt;
            display: none;
            visibility: hidden
        }

        table.sheet0 tr.row35 {
            height: 22.5pt;
            display: none;
            visibility: hidden
        }

        table.sheet0 tr.row36 {
            height: 22.5pt;
            display: none;
            visibility: hidden
        }

        table.sheet0 tr.row37 {
            height: 22.5pt;
            display: none;
            visibility: hidden
        }

        table.sheet0 tr.row38 {
            height: 22.5pt;
            display: none;
            visibility: hidden
        }

        table.sheet0 tr.row39 {
            height: 22.5pt;
            display: none;
            visibility: hidden
        }

        table.sheet0 tr.row40 {
            height: 15pt
        }

        table.sheet0 tr.row41 {
            height: 54.75pt
        }

        table.sheet0 tr.row42 {
            height: 18pt
        }

        table.sheet0 tr.row43 {
            height: 18.75pt
        }

        table.sheet0 tr.row44 {
            height: 72pt
        }

        table.sheet0 tr.row45 {
            height: 15.75pt
        }

        table.sheet0 tr.row46 {
            height: 15pt
        }

        table.sheet0 tr.row47 {
            height: 15pt
        }


        @page {
            margin-left: 0in;
            margin-right: 0.19685039370079in;
            margin-top: 1.1811023622047in;
            margin-bottom: 0.98425196850394in;
        }

        body {
            margin-left: 0in;
            margin-right: 0.19685039370079in;
            margin-top: 1.1811023622047in;
            margin-bottom: 0.98425196850394in;
        }

        body {
            margin: 0;
            font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            font-size: 0.75rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            background-color: #ffffff;
        }

        .container {
            width: 100%;
            padding-right: 7.5px;
            padding-left: 7.5px;
            margin-right: auto;
            margin-left: auto;
        }

        .card {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #ffffff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, 50%);
            border-radius: 0.75rem;
        }

        .elevation-4 {
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22) !important;
        }

        .col-md-12 {
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
            max-width: 100%;
        }

        .col-sm-12 {
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
            max-width: 100%;
        }

        .card-body {
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1.25rem;
        }

        .p-5 {
            padding: 3rem !important;
        }

        .p-2 {
            padding: 0.5rem !important;
        }

        .row {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -7.5px;
            margin-left: -7.5px;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
        }

        .justify-content {
            justify-content: space-between;

        }

        .col-md-6 {
            -ms-flex: 0 0 50%;
            flex: 0 0 50%;
            max-width: 50%;
        }

        .font-weight-bold {
            font-weight: 700 !important;
        }

        .float-right {
            float: right !important;
        }

        .mt-2,
        .my-2 {
            margin-top: 0.5rem !important;
        }

        .rounded-lg {
            border-radius: 0.3rem !important;
        }

        .mb-2,
        .my-2 {
            margin-bottom: 0.5rem !important;
        }

        .mr-2,
        .mx-2 {
            margin-right: 0.5rem !important;
        }

        .pr-4,
        .px-4 {
            padding-right: 1.5rem !important;
        }

        .mr-4,
        .mx-4 {
            margin-right: 1.5rem !important;
        }

        .p-5 {
            padding: 3rem !important;
        }

        .pr-2,
        .px-2 {
            padding-right: 0.5rem !important;
        }

        .pl-4,
        .px-4 {
            padding-left: 1.5rem !important;
        }

        .text-center {
            text-align: center !important;
        }

        .text-secondary {
            color: #6c757d !important;
        }

        .m-1 {
            margin: 0.25rem !important;
        }

        .p-1 {
            padding: 0.25rem !important;
        }

        .table {
            border-collapse: collapse !important;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }

        .table-bordered thead th,
        .table-bordered thead td {
            border-bottom-width: 2px;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .text-nowrap {
            white-space: nowrap !important;
        }

        .m-4 {
            margin: 1.5rem !important;
        }

        th {
            text-align: inherit;
        }

        thead {
            display: table-header-group;
        }

        .table-responsive {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .table-responsive {
            overflow: auto;
        }

        .table-responsive>.table tr th,
        .table-responsive>.table tr td {
            white-space: normal !important;
        }

        .p-4 {
            padding: 1.5rem !important;
        }

        .px-5 {
            padding-right: 4rem !important;
        }

        .px-6 {
            padding-right: 8rem !important;
        }

        .d-flex {
            display: -ms-flexbox !important;
            display: flex !important;
        }

        .justify-content-between {
            -ms-flex-pack: justify !important;
            justify-content: space-between !important;
        }

        .pr-5,
        .px-5 {
            padding-right: 3rem !important;
        }

        .px-6 {
            padding-right: 9rem !important;
        }

        .pr-6,
            {
            padding-right: 7.8rem !important;
        }

        .mr-6,
        .mx-6 {
            margin-right: 8rem !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card elevation-4 col-md-12 col-sm-12" style="border-radius: 0.95rem">
            <div class="card-body p-5">
                <div class="row">
                    <div class="justify-content">
                        <img src="vendor/adminlte/dist/img/banner2.png" alt="ENASA" class="img-fluid card-tools image img-center image-responsive rounded" width="100%" ;>
                    </div>
                </div>
                <br>
                <table border="0" cellpadding="0" cellspacing="0" id="sheet0" class="sheet0">
                    <col class="col0">
                    <col class="col1">
                    <col class="col2">
                    <col class="col3">
                    <col class="col4">
                    <tbody>
                        <tr class="row0">
                            <td class="column0 style88 s style90" colspan="4">REQUISICIÓN DE BIENES, MATERIALES O SERVICIOS</td>
                            <td class="column4">&nbsp;</td>
                        </tr>
                        <tr class="row1">
                            <td class="column0 style91 null style93" colspan="4"></td>
                            <td class="column4">&nbsp;</td>
                        </tr>
                        <tr class="row2">
                            <td class="column0 style63 s">UNIDAD SOLICITANTE:</td>
                            <td class="column1 style75 s">ELABORADO POR:</td>
                            <td class="column2 style63 s">FECHA DE REQUISICION: </td>
                            <td class="column3 style64 s">N° DE CONTROL:</td>
                            <td class="column4">&nbsp;</td>
                        </tr>
                        <tr class="row3">
                            @if($requisicion->solicitud_id)
                                <td class="column0 style65 null">
                                    {{$requisicion->solicitud->user->departamento->nombre}}</td>
                                @else
                                <td class="column0 style65 null">
                                    {{$requisicion->empleado->departamento->nombre}}</td>
                                @endif
                            <td class="column1 style65 null"> {{$requisicion->user->display_user}}</td>
                            <td class="column2 style66 null">{{$requisicion->created_at}}</td>
                            <td class="column3 style67 s">RBMS-{{ $requisicion->correlativo }}</td>
                            <td class="column4">&nbsp;</td>
                        </tr>
                        <tr class="row4">
                            <td class="column0 style68 null"></td>
                            <td class="column1 style69 null"></td>
                            <td class="column2 style69 null"></td>
                            <td class="column3 style70 null"></td>
                            <td class="column4">&nbsp;</td>
                        </tr>
                        <tr class="row5">
                            <td class="column0 style57 s">ÍTEM</td>
                            <td class="column1 style58 s">DESCRIPCIÓN</td>
                            <td class="column2 style71 s">UNIDAD DE MEDIDA</td>
                            <td class="column3 style59 s">CANTIDAD</td>
                            <td class="column4">&nbsp;</td>
                        </tr>
                        @foreach ($detalles as $detalle)
                        <tr class="row6">
                            <td class="column0 style19 n">{{ $detalle->id }}</td>
                            <td class="column1 style27 null">{{$detalle->producto}}</td>
                            <td class="column2 style20 null">{{ $detalle->cantidad }}</td>
                            <td class="column3 style15 null">{{ $detalle->cantidad }}</td>
                            <td class="column4">&nbsp;</td>
                        </tr>
                        @endforeach

                        
                        <tr class="row40">
                            <td class="column0 style72 s">REQUERIDO PARA: {{$requisicion->observacion}}</td>
                            <td class="column1 style73 null"></td>
                            <td class="column2 style73 null"></td>
                            <td class="column3 style74 null"></td>
                            <td class="column4">&nbsp;</td>
                        </tr>
                        <tr class="row41">
                            <td class="column0 style94 null style96" colspan="4"></td>
                            <td class="column4">&nbsp;</td>
                        </tr>
                        <tr class="row42">
                            <td class="column0 style59 s">REVISADO POR:</td>
                            <td class="column1 style60 s">RECIBIDO POR:</td>
                            <td class="column2 style97 s style98" colspan="2">APROBADO POR:</td>
                            <td class="column4">&nbsp;</td>
                        </tr>
                        <tr class="row43">
                            <td class="column0 style55 null"></td>
                            <td class="column1 style61 s">COORDINACIÓN DE COMPRAS</td>
                            <td class="column2 style99 s style100" colspan="2">OFICINA DE GESTIÓN ADMINISTRATIVA</td>
                            <td class="column4">&nbsp;</td>
                        </tr>
                        <tr class="row44">
                            <td class="column0 style56 null"></td>
                            <td class="column1 style56 s">JESÚS CARDOZO</td>
                            <td class="column2 style82 s style83" colspan="2">LCDO. DENMAR GODOY</td>
                            <td class="column4">&nbsp;</td>
                        </tr>
                        <tr class="row45">
                            <td class="column0 style53 s">FIRMA/SELLO</td>
                            <td class="column1 style53 s">FIRMA/SELLO</td>
                            <td class="column2 style84 s style85" colspan="2">FIRMA/SELLO</td>
                            <td class="column4">&nbsp;</td>
                        </tr>
                        <tr class="row46">
                            <td class="column0 style101 s style102" rowspan="2">FECHA: </td>
                            <td class="column1 style101 s style102" rowspan="2">FECHA: </td>
                            <td class="column2 style86 s style85" colspan="2" rowspan="2">FECHA: </td>
                            <td class="column4">&nbsp;</td>
                        </tr>
                        <tr class="row47">
                            <td class="column4">&nbsp;</td>
                        </tr>
                    </tbody>
                </table>

            </div>

            <br>
        </div>
    </div>
</body>

</html>